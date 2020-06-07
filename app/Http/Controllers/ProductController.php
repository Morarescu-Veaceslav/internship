<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Auth;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'  => 'required|max:255',
            'title' => 'required',
            'email' => 'required',
            'price' => 'required',
            'id_user' => 'required',
        ));

        $products = new Products;
        $products->name  = $request->name;
        $products->title = $request->title;
        $products->email  = $request->email;
        $products->price = $request->price;
        $products->id_user = $request->id_user;

        $products->save();

        Session::flash('success', 'Ati salvat cu succes produsul!');

        return redirect()->route('home', $products->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit')->withProduct($product);
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
        $this->validate($request, array(
            'name' => 'required|max:255',
            'title' => 'required', 
            'price' => 'required',
            'id_user' => 'required'
        ));

        $product = Products::find($id);

        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->id_user = $request->input('id_user');

        $product->save();

        Session::flash('success', 'Ati modificat datele cu succes!');

        return redirect()->route('home', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        Session::flash('success', 'Ati sters produsul cu succes.');
        return redirect()->route('home');
    }
}
