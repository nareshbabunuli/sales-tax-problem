<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'product_category' => 'required'
        ]);
        $product = new Products([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'product_category' => $request->get('product_category'),
            'description' => $request->get('description'),
        ]);
        $product->save();
        return redirect('products/')->with('success', 'Product Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = ProductCategory::all();
        return view('products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'product_category'
        ]);
        $product = Products::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->product_category = $request->get('product_category');
        $product->description = $request->get('description');
        $product->save();
        return redirect('products/' . $id . '/edit')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Sucessfully');
    }
}
