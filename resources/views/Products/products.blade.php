@extends('layouts.app')
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->

<div class="container">
    <h2>Product Table</h2>
    <p>Here shows the product table</p>            
    <div class="table-responsive"> <!-- Added responsive wrapper -->
        <table class="table table-striped table-sm"> <!-- Added table-sm class -->
            <thead>
                <tr>
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}  
                    </div>
                    @endif
                    <th>ID</th>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Brand</th>
                    <th>Unit</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Status Icon</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category ? $product->category->name : 'No Category' }}</td>
                    <td>{{$product->subcategory ? $product->subcategory->name : 'No Sub-Category' }}</td>
                    <td>{{$product->brand ? $product->brand->name :'No Brand'}}</td>
                    <td>{{$product->unit ? $product->unit->name :'No Unit'}}</td>
                    <td>{{$product->size->size}}</td>
                    <td>{{$product->color ? $product->color->color : 'No Color' }}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price ? $product->price : 'No Price' }}</td>

                    <td class="text-center">
                        @if($product->status == 1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($product->status == 1)
                        <a href="{{ route('product.product_Status', $product->id) }}" class="btn btn-success">
                            <i class="glyphicon glyphicon-thumbs-up"></i>
                        </a>
                        @else
                        <a href="{{ route('product.product_Status', $product->id) }}" class="btn btn-danger">
                            <i class="glyphicon glyphicon-thumbs-down"></i>
                        </a>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td class="text-center">
                        <form method='POST' action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

				

			@endsection