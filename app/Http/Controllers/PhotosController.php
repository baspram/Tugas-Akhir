<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

use App\Photos;

use \Auth;

use \Storage;

use App\ObjectCategories;

class PhotosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        

        return view('photos.index');
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
        return view('photos.create', compact('object_id', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = [];
        $photo["object_id"] = array_get($request->all(), "object_id");
        
        $photo["category_id"] = array_get($request->all(), "category_id");
        if($photo["category_id"] === ""){
            $photo["category_id"] = null;
        }

        $check = Photos::where('object_id', '=', $photo["object_id"])
                        ->where('category_id' , '=', $photo["category_id"])
                        ->exists();

        if(!$check){
            if ($request->hasFile('file')){  
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageExt = strtolower($imageExt);
            if (($imageExt == "jpg") || ($imageExt == "jpeg") || ($imageExt == "png")){
                $destinationPath = config('app.fileDestinationPath').'/'.$imageName;
                $check = storage_path('app').'/'.$destinationPath;
                if (file_exists($check)){
                    return redirect()->back()->withErrors('Foto dengan nama ini sudah ada')->withInput();
                }
                $uploaded = Storage::put($destinationPath, file_get_contents($image->getRealPath()));
                $photo['photo_name'] = $imageName;
                $photo['photo_path'] = $destinationPath;
                } else {
                    return redirect()->back()->withErrors('Harus ada foto yang diunggah')->withInput();
                }
                $request->session()->flash('alert-success', 'Foto baru berhasil ditambahkan');
                Photos::create($photo);
            } else {
                return redirect()->back()->withErrors('File harus berupa gambar')->withInput();
            }
        } else {
            return redirect()->back()->withErrors('Foto dengan kategori ini sudah ada')->withInput();
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
        $photo = Photos::findOrFail($id);
        $categories = ObjectCategories::all();
        return view('photos.edit', compact('photo', 'categories'));
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
        $newPhoto = Photos::findOrFail($id);
        $photo = [];
        $photo["object_id"] = $newPhoto["object_id"];
        $photo["category_id"] = $newPhoto["category_id"];
        if($photo["category_id"] === ""){
            $photo["category_id"] = null;
        }

        if ($request->hasFile('file')){  
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageExt = strtolower($imageExt);
            if (($imageExt == "jpg") || ($imageExt == "jpeg") || ($imageExt == "png")){
                $destinationPath = config('app.fileDestinationPath').'/'.$imageName;
                $check = storage_path('app').'/'.$destinationPath;
                if (file_exists($check)){
                    return redirect()->back()->withErrors('Foto dengan nama yang sama sudah ada')->withInput();
                }
                $oldFile = Photos::findOrFail($id);
                $oldFilePath = $oldFile["photo_path"];
                $deleted = Storage::delete($oldFilePath);
                $uploaded = Storage::put($destinationPath, file_get_contents($image->getRealPath()));
                $photo['photo_name'] = $imageName;
                $photo['photo_path'] = $destinationPath;    
            } else {
                return redirect()->back()->withErrors('File harus berupa gambar')->withInput();
            }
            
        } else {
            return redirect()->back()->withErrors('Harus ada foto yang diunggah')->withInput();
        }
        $request->session()->flash('alert-success', 'Foto berhasil diubah');
        $newPhoto->update($photo);
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
        $photo = Photos::findOrFail($id);
        $deleted = Storage::delete($photo["photo_path"]);
        $photo->delete();

        return redirect('objects');
    }
}
