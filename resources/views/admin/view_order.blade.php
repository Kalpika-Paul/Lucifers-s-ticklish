@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col text-right">
            <a role="button" class="btn btn-info" href="#">Invoice</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2><i class="halflings-icon align-justify"></i> Customer Information</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Mobile No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$orders->Customer->name}}</td>
                                <td>{{$orders->Customer->phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2><i class="halflings-icon align-justify"></i> Shipping Details</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Shipping Address</th>
                                <th>Mobile No</th>
                                <th>Email Address</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$orders->shipping->name}}</td>
                                <td>{{$orders->shipping->address}}</td>
                                <td>{{$orders->shipping->phone}}</td>
                                <td>{{$orders->shipping->email}}</td>
                                <td>{{$orders->payment->payment_method}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2><i class="halflings-icon align-justify"></i> Order Details</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_by_id as $order_by)
                                
                          
                            <tr>
                                <td>{{$order_by->order_id}}</td>
                                <td>{{$order_by->product_name}}</td>
                                <td>&#2547; {{$order_by->product_price}}</td>
                                <td>{{$order_by->product_sales_qty}}</td>
                                <td>&#2547; {{$order_by->product_price*$order_by->product_sales_qty}}</td>
                            </tr>
                              @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right" style="font-size: 20px; font-weight: 521; color: red">Total Amount to Pay</td>
                                <td><strong style="font-size: 20px; color: #007cff;">&#2547; {{$orders->total}}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
