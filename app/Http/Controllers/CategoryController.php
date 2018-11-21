<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ObjectCategories;


class CategoryController extends Controller
{
    public function index(){

        return redirect('/');
		$category = ObjectCategories::all();
		$count = $category->count;
		$string = $category->categories;
		$categories = explode("-", $string);
		return view('categories.index', compact('categories', 'count'));
    }

    public function create(){
      return view('categories.create');
    }

    public function store(Request $request){
    	$get = $request->all();
    	$category = [];
    	$count = $get['category_count'];
        $categories = explode("-", $get['category_list']);

        for($i = 0; $i < $count ; $i++){
            $new['category'] = $categories[$i];
            $request->session()->flash('alert-success', 'Kategori berhasil ditambahkan');
            ObjectCategories::create($new);
        }
    	return redirect('category');

    }
}
