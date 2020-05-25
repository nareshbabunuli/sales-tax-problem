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
            <div class="card-header">
                <h3 class="card-title">Product</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-sm-4">
                    <a href="{{ route('products.create')}}" class=" btn btn-primary">Create Product</a>

                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1)
                    @foreach($products as $product)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{ route('products.edit',$product->id)}}"
                                   class="btn btn-primary"><span><i
                                            class="fa fa-edit"></i></span></a>
                                <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-sm"><span><i
                                            class="fa fa-trash"></i></span></button>
                            </td>
                            {{--<form action="{{ route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><span><i
                                            class="fa fa-trash"></i></span></button>
                            </form>--}}
                            <div class="modal fade" id="modal-sm">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Product Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('products.destroy', $product->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <p>Are you sure ?</p>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <!-- /.card-body -->
        </div>

@endsection
