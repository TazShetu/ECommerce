@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if(count($errors) > 0)
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
                <hr>
            @endif
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Edit the Product</div>
                    <div class="card-body">
                        <form action="{{route('products.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="15" rows="10" class="form-control">{{$product->description}}</textarea>
                            </div>


                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection