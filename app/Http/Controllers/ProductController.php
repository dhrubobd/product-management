<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Sorting and searching
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
        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);
        // Store the uploaded image
        $imageName = time() . '.' . $request->image->extension();
        $imagePath = 'images/' . $imageName;
        $request->image->move(public_path('images'), $imageName);
        $insert = Product::create([
            'product_id'=>$request->input('product_id'),
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'stock'=>$request->input('stock'),
            'image'=>$imagePath
        ]);
         if($insert != null){
            $products  = Product::all();
            return view('products.index',['products'=>$products]);
        } 
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
        $product = Product::findOrFail($id);
        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        if($request->hasFile('image')){

            //Deleting old image
            if (File::exists(public_path($request->old_image))) {
                File::delete(public_path($request->old_image));
            }
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            ]);
            // Store the uploaded image
            $imageName = time() . '.' . $request->image->extension();
            $imagePath = 'images/' . $imageName;
            $request->image->move(public_path('images'), $imageName);
            $request->request->add(['image' => $imagePath]);
        }else{
            $request->request->add(['image' => $request->old_image]);
        }
        //dd($request->all());
        Product::find($request->id)->update($request->input());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Check if the image exists and delete it
        if (File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        // Delete the product record from the database
        $product->delete();

        return back()->with('success', 'Product and associated image deleted successfully.');
    }
}
