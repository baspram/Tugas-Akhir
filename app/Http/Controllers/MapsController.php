<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Map;

use App\ObjectCategories;

use Carbon\Carbon;

use \Storage;

use \File;

class MapsController extends Controller
{
    //
    //
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        $category = ObjectCategories::find(1);

        if ( is_null($category)){
            return redirect('/category/create');
        }

    	$maps = Map::get();
        
        if ( is_null($maps)){
            return redirect('/maps/create');
        }
    	return view('maps.index', compact('maps'));
    }

    public function create(){
    	return view('maps.create');
    }

    public function edit($id){

    	$map = Map::findOrFail($id);
    	return view('maps.edit', compact('map'));
    }

    public function store(Requests\MapRequest $request){
        $map = [];
    	if($request->hasFile('tilesFile')){
            $tiles = $request->file('tilesFile');
            $tilesName = $tiles->getClientOriginalName();
            $tilesExt = $tiles->getClientOriginalExtension();
            $tilesExt = strtolower($tilesExt);
            if ($tilesExt == "zip"){
                $destinationPath = config('app.mapDestinationPath').'/'.$tilesName;
                if (file_exists($destinationPath)){
                    Storage::delete($destinationPath);
                }
                $uploaded = Storage::disk('upload_public')->put($tilesName, file_get_contents($tiles->getRealPath()));
                $map['tilesFileName'] = $tilesName;
                $map['tilesFilePath'] = $destinationPath;
            } else {
                return redirect()->back()->withErrors('File tiles harus dalam format zip')->withInput();
            }
        }

        if ($request->hasFile('osmFile')){
            $osm = $request->File('osmFile');
            $osmName = $osm->getClientOriginalName();
            $osmExt = $osm->getClientOriginalExtension();
            $osmExt = strtolower($osmExt);
            if ($osmExt == "osm"){
                $destinationPath = config('app.mapDestinationPath').'/'.$osmName;
                if (file_exists($destinationPath)){
                    Storage::delete($destinationPath);
                }
                $uploaded = Storage::disk('upload_public')->put($osmName, file_get_contents($osm->getRealPath()));
                $map['osmFileName'] = $osmName;
                $map['osmFilePath'] = $destinationPath;
            } else {
                return redirect()->back()->withErrors('File osm harus dalam format osm')->withInput();   
            }
        }
        $request->session()->flash('alert-success', 'Peta berhasil ditambahkan');
        Map::create($map);
    	return redirect('maps');
    }

    public function update($id, Requests\MapRequest $request){
    	$oldMap = Map::findOrFail($id);
    	$map = [];
        if($request->hasFile('tilesFile')){
            $tiles = $request->file('tilesFile');
            $tilesName = $tiles->getClientOriginalName();
            $tilesExt = $tiles->getClientOriginalExtension();
            $tilesExt = strtolower($tilesExt);
            if ($tilesExt == "zip"){
                $destinationPath = public_path().'/'.$tilesName;
                Storage::disk('upload_public')->delete($oldMap['tilesFileName']);
                $uploaded = Storage::disk('upload_public')->put($tilesName, file_get_contents($tiles->getRealPath()));
                $map['tilesFileName'] = $tilesName;
                $map['tilesFilePath'] = $destinationPath;
            } else {
                return redirect()->back()->withErrors('File tiles harus dalam format zip')->withInput();
            }
        } else {
            $map['tilesFileName'] = $oldMap['tilesFileName'];
            $map['tilesFilePath'] = $oldMap['tilesFilePath'];
        }

        if ($request->hasFile('osmFile')){
            $osm = $request->File('osmFile');
            $osmName = $osm->getClientOriginalName();
            $osmExt = $osm->getClientOriginalExtension();
            $osmExt = strtolower($osmExt);
            if ($osmExt == "osm"){
                $destinationPath = public_path().'/'.$osmName;
                Storage::disk('upload_public')->delete($oldMap['osmFileName']);
                $uploaded = Storage::disk('upload_public')->put($osmName, file_get_contents($osm->getRealPath()));
                $map['osmFileName'] = $osmName;
                $map['osmFilePath'] = $destinationPath;
            } else {
                return redirect()->back()->withErrors('File osm harus dalam format osm')->withInput();
            }
        } else {
            $map['osmFileName'] = $oldMap['osmFileName'];
            $map['osmFilePath'] = $oldMap['osmFilePath'];
        }
    	
    	// $oldMap = Map::findOrFail($id);
        $request->session()->flash('alert-success', 'Peta berhasil diubah');// 
    	$oldMap->update($map);

    	return redirect('maps');
    }
}
