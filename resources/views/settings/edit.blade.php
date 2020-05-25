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
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post"
                                  action="{{ route('settings.update', $setting->id) }}"
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
                                            <label for="currency_name">Currency Name</label>
                                            <input type="text" name="currency_name" class="form-control"
                                                   id="currency_name"
                                                   value="{{$setting->currency_name}}"
                                                   placeholder="Enter Currency Name"
                                                   required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="currency_symbol">Currency Symbol</label>
                                            <input type="text" name="currency_symbol" class="form-control"
                                                   id="currency_symbol"
                                                   value="{{$setting->currency_symbol}}"
                                                   placeholder="Enter Currency Symbol"
                                                   required>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="shop_name">Shop Name</label>
                                            <input type="text" name="shop_name" class="form-control"
                                                   id="shop_name"
                                                   value="{{$setting->shop_name}}" placeholder="Enter Shop Name"
                                                   required>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
