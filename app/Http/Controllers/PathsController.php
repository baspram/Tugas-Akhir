<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Path;

use Carbon\Carbon;

class PathsController extends Controller
{
    //
    //
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
    	$paths = Path::get();
    	return view('paths.index', compact('paths'));
    }

    public function create(){
    	return view('paths.create');
    }

    public function store(Requests\PathRequest $request){

    	$path = $request->all();
    	Path::create($path);
    	return redirect('paths');

    }

    public function edit($id){
    	$path = Path::findOrFail($id);
    	return view('paths.edit', compact('path'));
    }

    public function update($id, Requests\PathRequest $request){
    	$path = Path::findOrFail($id);
    	$path->update($new);

    	return redirect('paths');
    }

    public function destroy($id){
        $path = Path::findOrFail($id)->delete();
        return redirect('paths');
    }
}
