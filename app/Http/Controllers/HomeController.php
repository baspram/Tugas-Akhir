<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\ObjectCategories;
use App\Map;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = ObjectCategories::all();
        $maps = Map::all();
        return view('home', compact('category', 'maps'));
    }

    public function home(){
        return redirect('/');
    }
}
