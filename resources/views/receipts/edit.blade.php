@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="card col-sm-12">
            <!-- /.card-header -->
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Product Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" method="post"
                                  action="{{ route('receipts.update', $receipts->id) }}"
                                  id="quickForm">
                                @method('PATCH')
                                @csrf
                                <div class="card-body">
                                    <div class="card-footer">
                                        <h5>Basic Information</h5>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="receipt_name">Receipt name</label>
                                            <input type="text" name="receipt_name" class="form-control"
                                                   id="receipt_name" value="{{$receipts->receipt_name}}"
                                                   placeholder="Enter Receipt Name">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="shop_name">Shop Name</label>
                                            <select name="shop_name" class="form-control" onchange="set_config()"
                                                    id="shop_name">
                                                <option selected disabled>Select Shop Name</option>
                                                @foreach($settings as $setting)
                                                    @if($receipts->shop_name)
                                                        <option value="{{$setting->id}}"
                                                                selected>{{$setting->shop_name}}</option>
                                                    @else
                                                        <option
                                                            value="{{$setting->id}}">{{$setting->shop_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-3"><h5>Product Name</h5></div>
                                                <div class="col-sm-3"><h5>Product Quantity</h5></div>
                                                <div class="col-sm-3"><h5>Sales Tax</h5></div>
                                                <div class="col-sm-3"><h5>Sub Product Price</h5></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="product_name1"></label>
                                                <select name="product_name1" onchange="setproduct1()"
                                                        id="product_name1"
                                                        class="form-control ">
                                                    <option selected="selected">Select a Product</option>
                                                    @foreach($products as $product)
                                                        @if($prod_receipts[1]['name'] == $product->id)
                                                            <option value="{{$product->id}}"
                                                                    selected>{{$product->name}}</option>
                                                        @else
                                                            <option value="{{$product->id}}"
                                                            >{{$product->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="product_quantity1"></label>
                                                <input type="number" name="product_quantity1"
                                                       onchange="quantity_change1()" class="form-control"
                                                       id="product_quantity1"
                                                       value="{{$prod_receipts[1]['product_quantity']}}"
                                                       placeholder="Enter Product Quantity">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="sales_tax1"></label>
                                                <input type="text" name="sales_tax1" class="form-control"
                                                       id="sales_tax1" value="{{$prod_receipts[1]['sales_tax']}}"
                                                       placeholder="Enter % value">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="total_price1"></label>
                                                <input type="text" name="total_price1" onchange="total1()"
                                                       class="form-control"
                                                       id="total_price1" value="{{$prod_receipts[1]['price']}}"
                                                       placeholder="Enter Total Price" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="product_name2"></label>
                                                <select name="product_name2" onchange="setproduct2()"
                                                        id="product_name2"
                                                        class="form-control ">
                                                    <option selected="selected">Select a Product</option>
                                                    @foreach($products as $product)
                                                        @if($prod_receipts[2]['name'] == $product->id)
                                                            <option value="{{$product->id}}"
                                                                    selected>{{$product->name}}</option>
                                                        @else
                                                            <option value="{{$product->id}}"
                                                            >{{$product->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="product_quantity"></label>
                                                <input type="number" name="product_quantity2" class="form-control"
                                                       onchange="quantity_change2()" id="product_quantity2"
                                                       value="{{$prod_receipts[2]['product_quantity']}}"
                                                       placeholder="Enter Product Quantity">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="sales_tax2"></label>
                                                <input type="text" name="sales_tax2" class="form-control"
                                                       id="sales_tax2" value="{{$prod_receipts[2]['sales_tax']}}"
                                                       placeholder="Enter % value">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="total_price2"></label>
                                                <input type="text" name="total_price2" onchange="total2()"
                                                       class="form-control"
                                                       id="total_price2" value="{{$prod_receipts[2]['price']}}"
                                                       placeholder="Enter Total Price" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="product_name3"></label>
                                                <select name="product_name3" onchange="setproduct3()"
                                                        id="product_name3"
                                                        class="form-control ">
                                                    <option selected="selected">Select a Product</option>
                                                    @foreach($products as $product)
                                                        @if($prod_receipts[3]['name'] == $product->id)
                                                            <option value="{{$product->id}}"
                                                                    selected>{{$product->name}}</option>
                                                        @else
                                                            <option value="{{$product->id}}"
                                                            >{{$product->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="product_quantity3"></label>
                                                <input type="number" onchange="quantity_change3()"
                                                       name="product_quantity3" class="form-control"
                                                       id="product_quantity3"
                                                       value="{{$prod_receipts[3]['product_quantity']}}"
                                                       placeholder="Enter Product Quantity">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="sales_tax3"></label>
                                                <input type="text" name="sales_tax3" class="form-control"
                                                       id="sales_tax3" value="{{$prod_receipts[3]['sales_tax']}}"
                                                       placeholder="Enter % value">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="total_price3"></label>
                                                <input type="text" name="total_price3" onchange="total3()"
                                                       class="form-control"
                                                       id="total_price3" value="{{$prod_receipts[3]['price']}}"
                                                       placeholder="Enter Total Price" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="product_name4"></label>
                                                <select name="product_name4" onchange="setproduct4()"
                                                        id="product_name4"
                                                        class="form-control ">
                                                    <option selected="selected">Select a Product</option>
                                                    @foreach($products as $product)
                                                        @if($prod_receipts[4]['name'] == $product->id)
                                                            <option value="{{$product->id}}"
                                                                    selected>{{$product->name}}</option>
                                                        @else
                                                            <option value="{{$product->id}}"
                                                            >{{$product->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="product_quantity4"></label>
                                                <input type="number" name="product_quantity4"
                                                       onchange="quantity_change4()" class="form-control"
                                                       id="product_quantity4"
                                                       value="{{$prod_receipts[4]['product_quantity']}}"
                                                       placeholder="Enter Product Quantity">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="sales_tax4"></label>
                                                <input type="text" name="sales_tax4" class="form-control"
                                                       id="sales_tax4" value="{{$prod_receipts[4]['sales_tax']}}"
                                                       placeholder="Enter % value">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="total_price4"></label>
                                                <input type="text" name="total_price4" onchange="total4()"
                                                       class="form-control"
                                                       id="total_price4" value="{{$prod_receipts[4]['price']}}"
                                                       placeholder="Enter Total Price" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fa-pull-right">
                                        <div class="row form-group">
                                            Sales tax :
                                            <p id="currency_symbol1">{{$symbol->currency_symbol}}</p>
                                            <div class=""><p id="sales-tax-total"> {{$receipts->total_sales_tax}}</p>
                                            </div>
                                            <input type="hidden" name="sales_tax_total" class="form-control"
                                                   value="{{$receipts->total_sales_tax}}" id="sales_tax_total"></div>

                                        <div class="row form-group">
                                            Total Price :
                                            <p id="currency_symbol2">{{$symbol->currency_symbol}}</p>
                                            <div class=""><p id="total-Price">&nbsp;{{$receipts->total_price}}</p></div>
                                            <input type="hidden" name="total_Price" class="form-control"
                                                   value="{{$receipts->total_price}}" id="total_Price"></div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save Receipt</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- /.card-body -->
        </div>

        @endsection
        @push('scripts')
            <script>
                var pro_data = <?php echo $products;?>;
                var set_data = <?php echo $settings;?>;
                var pro_cat = <?php echo $product_categories;?>;


                function getDetailsByName(data, code) {
                    return data.filter(
                        function (data) {
                            return data.id == code
                        }
                    );
                }


                function set_config() {
                    var x = document.getElementById("shop_name").value;
                    var symbol = getDetailsByName(set_data, x);
                    document.getElementById('currency_symbol1').innerHTML = symbol[0].currency_symbol;
                    document.getElementById('currency_symbol2').innerHTML = symbol[0].currency_symbol;
                    document.getElementById('currency_symbol_3').innerHTML = symbol[0].currency_symbol;
                }


                function setproduct1() {
                    var sp1 = document.getElementById('product_name1');
                    var spq1 = document.getElementById('product_quantity1');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp1.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat1.value = 0;
                            st1.value = spq1.value * pp[0].price;
                        } else {
                            sat1.value = (spq1.value * (pp[0].price * (0.05))).toFixed(2);
                            st1.value = (parseFloat(spq1.value * pp[0].price) + parseFloat(sat1.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat1.value = (spq1.value * (pp[0].price * 0.10)).toFixed(2);
                            st1.value = (parseFloat(spq1.value * pp[0].price) + parseFloat(sat1.value)).toFixed(2);
                        } else {
                            sat1.value = (spq1.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st1.value = (parseFloat(spq1.value * pp[0].price) + parseFloat(sat1.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }

                function quantity_change1() {
                    var sp1 = document.getElementById('product_name1');
                    var spq1 = document.getElementById('product_quantity1');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp1.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat1.value = 0;
                            st1.value = spq1.value * pp[0].price;
                        } else {
                            sat1.value = (spq1.value * (pp[0].price * (0.05))).toFixed(2);
                            st1.value = (parseFloat(spq1.value * pp[0].price) + parseFloat(sat1.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat1.value = (spq1.value * (pp[0].price * 0.10)).toFixed(2);
                            st1.value = (parseFloat(spq1.value * pp[0].price) + parseFloat(sat1.value)).toFixed(2);
                        } else {
                            sat1.value = (spq1.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st1.value = (parseFloat(spq1.value * pp[0].price) + parseFloat(sat1.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }

                function setproduct2() {
                    var sp2 = document.getElementById('product_name2');
                    var spq2 = document.getElementById('product_quantity2');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp2.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat2.value = 0;
                            st2.value = spq2.value * pp[0].price;
                        } else {
                            sat2.value = (spq2.value * (pp[0].price * (0.05))).toFixed(2);
                            st2.value = (parseFloat(spq2.value * pp[0].price) + parseFloat(sat2.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat2.value = (spq2.value * (pp[0].price * 0.10)).toFixed(2);
                            st2.value = (parseFloat(spq2.value * pp[0].price) + parseFloat(sat2.value)).toFixed(2);
                        } else {
                            sat2.value = (spq2.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st2.value = (parseFloat(spq2.value * pp[0].price) + parseFloat(sat2.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }

                function quantity_change2() {
                    var sp2 = document.getElementById('product_name2');
                    var spq2 = document.getElementById('product_quantity2');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp2.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat2.value = 0;
                            st2.value = spq2.value * pp[0].price;
                        } else {
                            sat2.value = (spq2.value * (pp[0].price * (0.05))).toFixed(2);
                            st2.value = (parseFloat(spq2.value * pp[0].price) + parseFloat(sat2.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat2.value = (spq2.value * (pp[0].price * 0.10)).toFixed(2);
                            st2.value = (parseFloat(spq2.value * pp[0].price) + parseFloat(sat2.value)).toFixed(2);
                        } else {
                            sat2.value = (spq2.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st2.value = (parseFloat(spq2.value * pp[0].price) + parseFloat(sat2.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }

                function setproduct3() {
                    var sp3 = document.getElementById('product_name3');
                    var spq3 = document.getElementById('product_quantity3');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp3.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat3.value = 0;
                            st3.value = spq3.value * pp[0].price;
                        } else {
                            sat3.value = (spq3.value * (pp[0].price * (0.05))).toFixed(2);
                            st3.value = (parseFloat(spq3.value * pp[0].price) + parseFloat(sat3.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat3.value = (spq3.value * (pp[0].price * 0.10)).toFixed(2);
                            st3.value = (parseFloat(spq3.value * pp[0].price) + parseFloat(sat3.value)).toFixed(2);
                        } else {
                            sat3.value = (spq3.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st3.value = (parseFloat(spq3.value * pp[0].price) + parseFloat(sat3.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }

                function quantity_change3() {
                    var sp3 = document.getElementById('product_name3');
                    var spq3 = document.getElementById('product_quantity3');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp3.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat3.value = 0;
                            st3.value = spq3.value * pp[0].price;
                        } else {
                            sat3.value = (spq3.value * (pp[0].price * (0.05))).toFixed(2);
                            st3.value = (parseFloat(spq3.value * pp[0].price) + parseFloat(sat3.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat3.value = (spq3.value * (pp[0].price * 0.10)).toFixed(2);
                            st3.value = (parseFloat(spq3.value * pp[0].price) + parseFloat(sat3.value)).toFixed(2);
                        } else {
                            sat3.value = (spq3.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st3.value = (parseFloat(spq3.value * pp[0].price) + parseFloat(sat3.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }

                function setproduct4() {
                    var sp4 = document.getElementById('product_name4');
                    var spq4 = document.getElementById('product_quantity4');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp4.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat4.value = 0;
                            st4.value = spq4.value * pp[0].price;
                        } else {
                            sat4.value = (spq4.value * (pp[0].price * (0.05))).toFixed(2);
                            st4.value = (parseFloat(spq4.value * pp[0].price) + parseFloat(sat4.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat4.value = (spq4.value * (pp[0].price * 0.10)).toFixed(2);
                            st4.value = (parseFloat(spq4.value * pp[0].price) + parseFloat(sat4.value)).toFixed(2);
                        } else {
                            sat4.value = (spq4.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st4.value = (parseFloat(spq4.value * pp[0].price) + parseFloat(sat4.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }

                }

                function quantity_change4() {
                    var sp4 = document.getElementById('product_name4');
                    var spq4 = document.getElementById('product_quantity4');
                    var st1 = document.getElementById('total_price1');
                    var st2 = document.getElementById('total_price2');
                    var st3 = document.getElementById('total_price3');
                    var st4 = document.getElementById('total_price4');
                    var sat1 = document.getElementById('sales_tax1');
                    var sat2 = document.getElementById('sales_tax2');
                    var sat3 = document.getElementById('sales_tax3');
                    var sat4 = document.getElementById('sales_tax4');

                    var pp = getDetailsByName(pro_data, sp4.value);
                    var pc = getDetailsByName(pro_cat, pp[0].product_category);


                    if (pc[0].enable_sales_tax === '0') {
                        if ((pp[0].name.includes('imported') === false)) {
                            sat4.value = 0;
                            st4.value = spq4.value * pp[0].price;
                        } else {
                            sat4.value = (spq4.value * (pp[0].price * (0.05))).toFixed(2);
                            st4.value = (parseFloat(spq4.value * pp[0].price) + parseFloat(sat4.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + (parseFloat(sat2.value) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    } else {
                        if (pp[0].name.includes('imported') === false) {
                            sat4.value = (spq4.value * (pp[0].price * 0.10)).toFixed(2);
                            st4.value = (parseFloat(spq4.value * pp[0].price) + parseFloat(sat4.value)).toFixed(2);
                        } else {
                            sat4.value = (spq4.value * ((pp[0].price * 0.10) + (pp[0].price * 0.05))).toFixed(2);
                            st4.value = (parseFloat(spq4.value * pp[0].price) + parseFloat(sat4.value)).toFixed(2);
                        }
                        document.getElementById('total_Price').value = (((parseFloat(st1.value)) || 0) + ((parseFloat(st2.value)) || 0) + ((parseFloat(st3.value)) || 0) + ((parseFloat(st4.value)) || 0)).toFixed(2);
                        document.getElementById('total-Price').innerHTML = document.getElementById('total_Price').value;
                        document.getElementById('sales_tax_total').value = ((parseFloat(sat1.value) || 0) + ((parseFloat(sat2.value)) || 0) + ((parseFloat(sat3.value)) || 0) + ((parseFloat(sat4.value)) || 0)).toFixed(2);
                        document.getElementById('sales-tax-total').innerHTML = document.getElementById('sales_tax_total').value;
                    }
                }
            </script>
    @endpush

