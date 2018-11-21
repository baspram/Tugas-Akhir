<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use \Storage;

use App\Videos;

use App\ObjectCategories;

class VideosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        return view('videos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        $object_id =  $id;
        $categories = ObjectCategories::all();
        return view('videos.create', compact('object_id', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = [];
        $video["object_id"] = array_get($request->all(), "object_id");
        $video["category_id"] = array_get($request->all(), "category_id");
        if($video["category_id"] === ""){
            $video["category_id"] = null;
        }
        $check = Videos::where('object_id', '=', $video["object_id"])
                        ->where('category_id' , '=', $video["category_id"])
                        ->exists();

        if(!$check){
            if ($request->hasFile('file')){  
                $image = $request->file('file');
                $imageName = $image->getClientOriginalName();
                $imageExt = $image->getClientOriginalExtension();
                $imageExt = strtolower($imageExt);
                if (($imageExt == "mp4")||($imageExt == "avi")||($imageExt == "mpeg")){
                    $destinationPath = config('app.fileDestinationPath').'/'.$imageName;
                    $check = storage_path('app').'/'.$destinationPath;
                    if (file_exists($check)){
                        return redirect()->back()->withErrors('Video dengan nama yang sama sudah ada')->withInput();
                    }
                    $uploaded = Storage::put($destinationPath, file_get_contents($image->getRealPath()));
                    $video['video_name'] = $imageName;
                    $video['video_path'] = $destinationPath;
                } else {
                    return redirect()->back()->withErrors('File yang diunggah harus berupa video')->withInput();
                }
            } else {
                return redirect()->back()->withErrors('Anda harus mengunggah file video')->withInput();
            }
            $request->session()->flash('alert-success', 'Video baru berhasil ditambahkan');
            Videos::create($video);
        } else {
            return redirect()->back()->withErrors('Video dengan kategori ini sudah ada')->withInput();
        }

        
        return redirect('objects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Videos::findOrFail($id);
        $categories = ObjectCategories::all();
        return view('videos.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newVideo = Videos::findOrFail($id);
        $video = [];
        $video["object_id"] = $newVideo["object_id"];
        $video["category_id"] = $newVideo["category_id"];
        if($video["category_id"] === ""){
            $video["category_id"] = null;
        }
        if ($request->hasFile('file')){  
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageExt = strtolower($imageExt);
            if (($imageExt == "mp4")||($imageExt == "avi")||($imageExt == "mpeg")){
                $destinationPath = config('app.fileDestinationPath').'/'.$imageName;
                $check = storage_path('app').'/'.$destinationPath;
                if (file_exists($check)){
                    return redirect()->back()->withErrors('Video dengan nama yang sama sudah ada')->withInput();
                }
                $oldFile = Videos::findOrFail($id);
                $oldFilePath = $oldFile["video_path"];
                $deleted = Storage::delete($oldFilePath);
                $uploaded = Storage::put($destinationPath, file_get_contents($image->getRealPath()));
                $video['video_name'] = $imageName;
                $video['video_path'] = $destinationPath;
            } else {
                return redirect()->back()->withErrors('Anda harus mengunggah file video')->withInput();
            }
        }else {
            return redirect()->back()->withErrors('Harus ada video yang diunggah')->withInput();
        }
        $request->session()->flash('alert-success', 'Video berhasil diubah');
        $newVideo->update($video);
        return redirect('objects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Videos::findOrFail($id);
        $deleted = Storage::delete($video["video_path"]);
        $video->delete();

        return redirect('objects');
    }
}
