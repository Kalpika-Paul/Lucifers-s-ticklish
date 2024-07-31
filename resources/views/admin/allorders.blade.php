@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="container">
        <h2>Orders Table</h2>
        <p>Here shows the Orders table</p>            
        <table class="table table-striped">
          <thead>
            <tr>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}  
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span><script>
                  document.querySelector('.close').addEventListener('click', function () {
                  document.getElementById('myAlert').style.display = 'none';
                  });
            </script>
                      </button>
                </div>
            
                @endif
                
                <th >Order ID</th>
                <th>Customer Name</th>
                <th>Order Total</th>
                <th>Order Date and Time</th>
                
               

            </tr>
          </thead>

           @foreach ($orders as $order)
          <tr>
              <td>{{$order->id}}</td>
              <td>{{ $order->customer->name ?? 'No customer assigned' }}</td>
              <td>{{$order->total}}</td>
              <td>{{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y h:i A') }}</td>
              {{-- <td>{{$category->status}}</td> --}}

             <td class = "center">

             
              

             </td>

       <td class = "row">
       <div class ="span1"></div>
       <div class = "span2">

    
    
       </td>
              

              
          </tr>
      @endforeach
  </thead>
  
  
</table>								
      </div>
     
    
@endsection