<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Products;
use App\Receipts;
use App\Settings;
use Illuminate\Http\Request;
use Psy\Util\Str;

class ReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipts::all();
        return view('receipts.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Settings::all();
        $products = Products::all();
        $product_categories = ProductCategory::all();
        return view('receipts.create', compact(['settings', 'products', 'product_categories']));
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
            'receipt_name' => 'required',
            'shop_name' => 'required',
        ]);
        $pro_list = [
            '1' => ['name' => $request->get('product_name1'), 'product_quantity' => $request->get('product_quantity1'), 'sales_tax' => $request->get('sales_tax1'), 'price' => $request->get('total_price1')],
            '2' => ['name' => $request->get('product_name2'), 'product_quantity' => $request->get('product_quantity2'), 'sales_tax' => $request->get('sales_tax2'), 'price' => $request->get('total_price2')],
            '3' => ['name' => $request->get('product_name3'), 'product_quantity' => $request->get('product_quantity3'), 'sales_tax' => $request->get('sales_tax3'), 'price' => $request->get('total_price3')],
            '4' => ['name' => $request->get('product_name4'), 'product_quantity' => $request->get('product_quantity4'), 'sales_tax' => $request->get('sales_tax4'), 'price' => $request->get('total_price4')]

        ];
        $json_pro = json_encode($pro_list);
        $receipt_data = new Receipts([
            'receipt_name' => $request->get('receipt_name'),
            'shop_name' => $request->get('shop_name'),
            'total_sales_tax' => $request->get('sales_tax_total'),
            'total_price' => $request->get('total_Price'),
            'products' => $json_pro
        ]);
        $receipt_data->save();
        return redirect('receipts/')->with('success', 'Receipt Added SucessFully');
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
        $receipts = Receipts::find($id);
        $products = Products::all();
        $settings = Settings::all();
        $symbol = Settings::find($receipts->shop_name);
        $product_categories = ProductCategory::all();
        $prod_receipts = json_decode($receipts->products, true);
        return view('receipts.edit', compact(['receipts', 'products', 'settings', 'product_categories', 'prod_receipts', 'symbol']));
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
            'receipt_name' => 'required',
            'shop_name' => 'required',
        ]);
        $receipt = Receipts::find($id);
        $list = [
            '1' => ['name' => $request->get('product_name1'), 'product_quantity' => $request->get('product_quantity1'), 'sales_tax' => $request->get('sales_tax1'), 'price' => $request->get('total_price1')],
            '2' => ['name' => $request->get('product_name2'), 'product_quantity' => $request->get('product_quantity2'), 'sales_tax' => $request->get('sales_tax2'), 'price' => $request->get('total_price2')],
            '3' => ['name' => $request->get('product_name3'), 'product_quantity' => $request->get('product_quantity3'), 'sales_tax' => $request->get('sales_tax3'), 'price' => $request->get('total_price3')],
            '4' => ['name' => $request->get('product_name4'), 'product_quantity' => $request->get('product_quantity4'), 'sales_tax' => $request->get('sales_tax4'), 'price' => $request->get('total_price4')]

        ];
        $json_pro = json_encode($list);
        $receipt->receipt_name = $request->get('receipt_name');
        $receipt->shop_name = $request->get('shop_name');
        $receipt->total_sales_tax = $request->get('sales_tax_total');
        $receipt->total_price = $request->get('total_Price');
        $receipt->products = $json_pro;
        $receipt->save();
        return redirect('receipts/' . $id . '/edit')->with('success', 'Successfully Updated Receipt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt = Receipts::find($id);
        $receipt->delete();
        return redirect()->route('receipts.index')->with('success', 'Sucessfully Deleted Reciept');
    }

}
