<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Object;

use App\ObjectCategories;

use App\Values;

use App\Description;

use App\Photos;

use App\Videos;

use Illuminate\Http\Request;

use \Auth;

use Carbon\Carbon;

use \Storage;

class ObjectsController extends Controller
{
    //
    //
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        $category = ObjectCategories::find(1);
        if (is_null($category)){
            return redirect('/category/create');
        }

		$objects = Object::get();
		return view('objects.index', compact('objects'));

    }

    public function show($id){

    	$object = Object::findOrFail($id);

        $categories = ObjectCategories::all();

        $values = Values::where("object_id", "=", $id)->get();
        // return $values;

        $description = Description::where('object_id', '=', $id)
                                        -> where('category_id', '=', null)
                                        ->get();
        $descriptions = Description::where('object_id', '=', $id)
                                        -> where('category_id', '!=', null)
                                        ->get();        

        $photo = Photos::where('object_id', '=', $id)
                            -> where('category_id', '=', null)
                            ->get();
        $photos = Photos::where('object_id', '=', $id)
                            -> where('category_id', '!=', null)
                            ->get();
       
        $video = Videos::where('object_id', '=', $id)
                            -> where('category_id', '=', null)
                            ->get();
        $videos = Videos::where('object_id', '=', $id)
                            -> where('category_id', '!=', null)
                            ->get();

    	return view('objects.show' , compact('object', 'categories', 'values', 'description', 'descriptions','photo', 'photos', 'video', 'videos'));
    }

    public function create(){

        $categories = ObjectCategories::all();
        $count = count($categories);

        return view('objects.create', compact('count', 'categories'));
    }

    public function store(Requests\ObjectRequest $request){

        $object = array_except($request->all(), ["category_list", "content"]);
        if ($request->hasFile('marker')){
            $marker = $request->file('marker');
            $markerName = $marker->getClientOriginalName();
            $markerExt = $marker->getClientOriginalExtension();
            $markerExt = strtolower($markerExt);
            if(($markerExt == "jpg")||($markerExt == "png")||($markerExt == "jpeg")){
                $destinationPath = config('app.fileDestinationPath').'/'.$markerName;
                $check = storage_path('app').'/'.$destinationPath;
                if (file_exists($check)){
                    return redirect()->back()->withErrors('File marker dengan nama yang sama sudah ada')->withInput();
                }
                $uploaded = Storage::put($destinationPath, file_get_contents($marker->getRealPath()));
                $object['marker_name'] = $markerName;
                $object['marker_path'] = $destinationPath;
                $object['marker_updated_at'] = Carbon::now();
            } else {
                return redirect()->back()->withErrors('File marker harus dalam bentuk gambar')->withInput();
            }
            
        } else {
            return redirect()->back()->withErrors('Anda harus memilih marker')->withInput();
        }

        $newObject = Object::create($object);
        
        $categories = ObjectCategories::all();
        $categoryValues = array_get($request->all(), "category_list");
        $categoryValues = explode("-", $categoryValues);
        for($i=0; $i < count($categories); $i++){
            $values = [];
            $values["values"] = $categoryValues[$i];
            $values["object_id"] = $newObject["id"];
            $values["category_id"] = $categories[$i]->id;
            Values::create($values);
        }

        $description = [];
        $description["object_id"] = $newObject["id"];
        $description["content"] =  array_get($request->all(), "content");
        $description["category_id"] = null;
        $request->session()->flash('alert-success', 'Objek berhasil ditambahkan');
        $newDesc = Description::create($description);

        return redirect('objects');
    }

    public function edit($id){

        $object = Object::findOrFail($id);

        $categories = ObjectCategories::all();

        $values = Values::where("object_id", "=", $id)->get();
        $count = count($values);
        // return count($value);
        // $value = $value["values"];
        // $values = explode("-", $value);

        $descriptions = Description::where('object_id', '=', $id)
                        ->where('category_id', '=', null)
                        ->get();

        return view('objects.edit', compact('object', 'count', 'categories', 'values', 'descriptions'));
    }

    public function update($id, Requests\EditObjectRequest $request){
        
        $object = array_except($request->all(), ["category_list", "content"]);
        
        $oldObj = Object::findOrFail($id);
        $object_id = $object["object_id"];
        if($object_id == null){
                return redirect()->back()->withErrors('Object_id harus terisi')->withInput();
        }
        if($oldObj["object_id"] != $object_id){
            $check = Object::where('object_id', '=', $object_id)
                            ->exists();
            if ($check){
                return redirect()->back()->withErrors('Objek dengan object_id ini sudah terdaftar')->withInput();
            }
        }

        
        if ($request->hasFile('marker')){
            $marker = $request->file('marker');
            $markerName = $marker->getClientOriginalName();
            $markerExt = $marker->getClientOriginalExtension();
            $markerExt = strtolower($markerExt);
            if(($markerExt == "jpg")||($markerExt == "png")||($markerExt == "jpeg")){
                $destinationPath = config('app.fileDestinationPath').'/'.$markerName;
                $check = storage_path('app').'/'.$destinationPath;
                if (file_exists($check)){
                    return redirect()->back()->withErrors('File marker dengan nama yang sama sudah ada')->withInput();
                }
                $oldMarker = Object::findOrFail($id);
                $oldMarkerPath = $oldMarker["marker_path"];
                $deleted = Storage::delete($oldMarkerPath);
                $uploaded = Storage::put($destinationPath, file_get_contents($marker->getRealPath()));
                $object['marker_name'] = $markerName;
                $object['marker_path'] = $destinationPath;
                $object['marker_updated_at'] = Carbon::now();
            } else {
                return redirect()->back()->withErrors('File marker harus dalam bentuk gambar')->withInput();   
            }
        }

        $newObject = Object::findOrFail($id);
        $newObject->update($object);
        
        $categories = ObjectCategories::all();
        $categoryValues = array_get($request->all(), "category_list");
        $categoryValues = explode("-", $categoryValues);
        for($i=0; $i < count($categories); $i++){
            $values = [];
            $values["values"] = $categoryValues[$i];
            $values["object_id"] = $id;
            $values["category_id"] = $categories[$i]->id;
            $newValue = Values::where('object_id', '=', $values["object_id"])
                            ->where('category_id', '=', $values["category_id"])
                            ->update($values);
        }

        $description = [];
        $description["object_id"] = $id;
        $description["content"] =  array_get($request->all(), "content");
        $description["category_id"] = null;
        $request->session()->flash('alert-success', 'Objek berhasil diubah');
        $newDesc = Description::where('object_id', '=', $id)
                                ->where('category_id', '=', null)
                                ->update($description);

        return redirect('objects');
    }

    public function destroy($id){
        $object = Object::findOrFail($id);
        
        $photos = Photos::where('object_id', '=' , $id)->get();
        foreach ($photos as $photo){
            $deleted = Storage::delete($photo["photo_path"]);
        }

        $videos = Videos::where('object_id', '=', $id)->get();
        foreach ($videos as $video){
            $deleted = Storage::delete($video["video_path"]);
        }
        
        $oldMarkerPath = $object["marker_path"];
        $deleted = Storage::delete($oldMarkerPath);

        $object->delete();
        return redirect('objects');
    }

}
