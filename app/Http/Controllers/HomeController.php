<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Auth;
use App\Favorite;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(5);
        return view('home')->withProducts($products);
        
    }

    public function getindex(){
        $products = Products::orderBy('id', 'desc')->paginate(5);
        return view('welcome')->withProducts($products);
    }

    public function getwelcome(){
        return view('index');
    }


    
}
