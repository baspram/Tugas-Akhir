<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Description;

use App\ObjectCategories;

class DescriptionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('descriptions.index');
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
        return view('descriptions.create', compact('object_id', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $description = $request->all();

        if($description["category_id"] === ""){
            $description["category_id"] = null;
        }

        $check = Description::where('object_id', '=', $description["object_id"])
                        ->where('category_id' , '=', $description["category_id"])
                        ->exists();
        
        if(ctype_space($description["content"]) || $description["content"] === ""){
            return redirect()->back()->withErrors('Tidak bisa menambahkan deskripsi kosong')->withInput();
        }

        if(!$check){
            $request->session()->flash('alert-success', 'Deskripsi baru berhasil ditambahkan');
            Description::create($description);
        } else {
            return redirect()->back()->withErrors('Deskripsi dengan kategori ini sudah ada')->withInput();
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
        

        return view('descriptions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $description = Description::findOrFail($id);
        $categories = ObjectCategories::all();
        $object_id = $description["object_id"];
        return view('descriptions.edit', compact('description', 'object_id', 'categories'));
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
        $description = $request->all();

        if($description["category_id"] === ""){
            $description["category_id"] = null;
        }


        if(ctype_space($description["content"]) || $description["content"] === ""){
            return redirect()->back()->withErrors('Tidak bisa menambahkan deskripsi kosong')->withInput();
        }

        // $oldDesc = Description::findOrFail($id);
        $request->session()->flash('alert-success', 'Deskripsi berhasil diubah');
        $newDesc = Description::findOrFail($id)
                    ->update($description);

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
        $delete = Description::findOrFail($id)->delete();
        return redirect('objects');
    }
}
