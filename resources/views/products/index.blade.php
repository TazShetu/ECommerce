@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <a href="{{route('products.create')}}" class="btn btn-primary">Create New Product</a>
                <hr>
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th>D</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{asset($product->image)}}" alt="Error Image" height="50px">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-info btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('products.destroy', ['id' => $product->id])}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
                {{----}}
                <hr>
                {{--<div class="text-center">--}}
                    {{$products->links('vendor.pagination.bootstrap-4')}}
                {{--</div>--}}
                {{----}}
            </div>
        </div>
    </div>




@endsection