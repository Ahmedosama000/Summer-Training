<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get All Products
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required' , 
            'description' => 'required',
            'price'=>'required',
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $Product = Product::find($id);
        $Product->update($request->all());
        return $Product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Product::destroy($id);
    }
}
