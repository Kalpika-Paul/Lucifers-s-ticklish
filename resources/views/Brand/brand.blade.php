@extends('layouts.app')

@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Brand</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('brand.create') }}" class="btn btn-primary">New Brand</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->

<div class="container">
    <h2>Brand Table</h2>
    <p>Here shows the brand table</p>            
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
                    <th>Brand Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Status Icon</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->description }}</td>
                    <td class="text-center">
                        @if($brand->status == 1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($brand->status == 1)
                        <a href="{{ route('brand_Status', $brand->id) }}" class="btn btn-success">
                            <i class="glyphicon glyphicon-thumbs-up"></i>
                        </a>
                        @else
                        <a href="{{ route('brand_Status', $brand->id) }}" class="btn btn-danger">
                            <i class="glyphicon glyphicon-thumbs-down"></i>
                        </a>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td class="text-center">
                        <form method="POST" action="{{ route('brand.destroy', $brand->id) }}">
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
