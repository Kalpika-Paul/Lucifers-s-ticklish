@extends('Frontend.master')

@section('content')
    
	<!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class ="col-md-3" ></div>

                <div class="col-md-6">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Shipping address</h3>
                        </div>

                        <form action = "{{route('Frontend.shiping_details')}}" method = "POST">
                            
                            @csrf

                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder=" Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip" placeholder="ZIP Code">
                        </div>
                       
                      <input type="button" class="btn btn-info " value="Next" style="float: right">

               </form>
                    </div>
                    <!-- /Billing Details -->

                    
                    
                </div>

             <div class ="col-md-3" ></div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection