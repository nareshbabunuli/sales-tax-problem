<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('product_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_categories.create');

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
            'category_name' => 'required',
            'enable_sales_tax' => 'required',
        ]);
        $product_category = new ProductCategory([
            'category_name' => $request->get('category_name'),
            'enable_sales_tax' => $request->get('enable_sales_tax'),
            'enable_custom_duty' => $request->get('enable_custom_duty')
        ]);
        $product_category->save();
        return redirect('product_categories/')->with('success', 'Product Category Added');
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
        $product_category = ProductCategory::find($id);
        return view('product_categories.edit', compact('product_category'));
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
            'category_name' => 'required',
            'enable_sales_tax' => 'required',
        ]);
        $product_category = ProductCategory::find($id);
        $product_category->category_name = $request->get('category_name');
        $product_category->enable_sales_tax = $request->get('enable_sales_tax');
        $product_category->save();
        $location = 'product_categories/' . $id . '/edit';
        return redirect($location)->with('success', 'Product Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_category = ProductCategory::find($id);
        $product_category->delete();
        return redirect()->route('product_categories.index')->with('success', 'Deleted Product Category Successfully');
    }
}
