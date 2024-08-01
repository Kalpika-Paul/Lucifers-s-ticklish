<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa-solid fa-bangladeshi-taka-sign"></i>BDT</a></li>
              
              @php
               $customer_id = Session:: get('id');
                   
                @endphp

            @if ( $customer_id!= Null)
               <li><a href="{{route('Frontend.pages.customer_logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
            @else
                <li><a href="{{route('Frontend.pages.logincheck')}}"><i class="fa fa-user-o"></i> Login</a></li>
                    
            @endif
                    
                  
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('Frontend.pages.search')}}" method="GET" >
                            <select class="input-select" name="category">
                                <option value="ALL" {{request('category') == "ALL" ? 'selected' : ''}}>All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
    
                            </select>
                            <input class="input" name="product" placeholder="Search here" value="{{request('product')}}">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        @php
                          $cart_array = cardArray();
                        @endphp
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>

                                <div class="qty"><?= count($cart_array) ?></div>
                                
                            </a>

                            <div class="cart-dropdown">
                                <div class="cart-list">
                                  
                                    @foreach($cart_array as $v_add_cart)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('./img/product01.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$v_add_cart['name']}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$v_add_cart['quantity']}}</span>&#2547;{{$v_add_cart['price']}}</h4>
                                        </div> 
                                        <a href="{{ route('Frontend.pages.delete_cart', ['id' => $v_add_cart['id']]) }}">
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </a>
                                        
                                    </div>
                                    @endforeach


                                </div>
                                <div class="cart-summary">
                                    <small><?= count($cart_array) ?>Item(s) selected</small>
                                    <h5>SUBTOTAL:&#2547; {{ Cart::getTotal()}}</h5>
                                </div>
                                <div class="cart-btns">
                                       
                                 @php
                                 $customer_id = Session:: get('id');
                  
                                 @endphp

                                 @if($customer_id != Null)
                                    {{-- <a href="{{route('Frontend.pages.logincheck')}}">View Cart</a> --}}
                                  <a href="{{route('Frontend.checkout')}}"  style = "background-color: #006400; width:100%; ">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                @else
                                <a href="{{route('Frontend.pages.logincheck')}}" style = "background-color: #006400; width:100%;">Checkout <i class="fa fa-arrow-circle-right"></i></a>
@endif
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->