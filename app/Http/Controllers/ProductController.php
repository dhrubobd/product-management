<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->sort=="pricea"){
            $products  = Product::orderBy('price','asc')->get();
        }else if($request->sort=="priced"){
            $products  = Product::orderBy('price','desc')->get();
        }else if($request->sort=="namea"){
            $products  = Product::orderBy('name','asc')->get();
        }else if($request->sort=="named"){
            $products  = Product::orderBy('name','desc')->get();
        }else if($request->search!=null){
            $products = Product::where('name','LIKE',"%$request->search%")
            ->orWhere('price','LIKE',"%$request->search%")
            ->orWhere('product_id','LIKE',"%$request->search%")
            ->orWhere('description','LIKE',"%$request->search%")
            ->get();
        }else{
            $products  = Product::all();
        }
        return view('products/index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
