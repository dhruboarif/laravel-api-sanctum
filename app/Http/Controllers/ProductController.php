<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return Product::all();
      }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'slug'=>'required',
            'price'=>'required'

        ]);
       return Product::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $product=Product::find($id);
        $product->update($request->all());
        return $product;

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        return Product::destroy($id);
    }

    public function search($name)
    {
        //
        return Product::where('name','like','%'.$name.'%')->get();
    }
}
