@extends('Frontend.master')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            @foreach($categories as $category)
            <div class="col-md-4 col-xs-6">
                
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{$category->name}}<br>Collections</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
           
            </div> 
            @endforeach
           
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                           
                            @foreach ($categories as $category)
							<li><a href="{{route('Frontend.pages.product_by_cat',$category->id)}}">{{$category->name}}</a></li>
						    @endforeach

                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach($products as $product)
                                <!-- product -->
                                <div class="product"><a href="{{route('Frontend.pages.view_details',$product->id)}}">
                                    <div class="product-img">
                                        <img src="{{asset('./img/product01.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div></a>

                                    <div class="product-body">
                                        <a href="{{route('Frontend.pages.view_details',$product->id)}}"><p class="product-category">{{ $product->category ? $product->category->name : 'Uncategorized' }}</p></a>
                                        <h3 class="product-name"><a href="{{route('Frontend.pages.view_details',$product->id)}}">{{$product->name}}</h3></a>
                                        <a href="{{route('Frontend.pages.view_details',$product->id)}}"><h4 class="product-price">{{$product->price}}<del class="product-old-price">$990.00</del></h4></a>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>

                                    <form action="{{ route('Frontend.pages.add_to_cart') }}" method="POST">
                                        @csrf
                                        @method ('POST')
                                        <div class="add-to-cart">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </form>

                                </div>
                                @endforeach

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->




{{-- ekrhgjewthgwkrthgnerhcvhethrtheihrkhrlhjrhihrkgwrhtgvlirhlethtrhwhgwrigtwrkhvwiohgwelkcjeljfq;riohc;ro;wogiercf;qieg --}}
<!-- HOT DEAL SECTION -->

<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->



<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                            @foreach ($categories as $category)
                            <li><a href="{{route('Frontend.pages.product_by_cat', $category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                @foreach($topProducts as $topProduct)
                                <!-- product -->
                                <div class="product">

                                  <div class="product-img" style="width: 100%; height: auto;">
    <a href="{{route('Frontend.pages.view_details', $topProduct->id)}}">
        <img src="{{asset('img/product01.png')}}" alt="" style="width: 100%; height: auto;">
        <div class="product-label">
            <span class="sale">-30%</span>
            <span class="new">NEW</span>
        </div>
    </a>
</div>

                                    <div class="product-body">
                                        <a href="{{route('Frontend.pages.view_details', $topProduct->id)}}">
                                            <p class="product-category">{{ $topProduct->category ? $topProduct->category->name : 'Uncategorized' }}</p>
                                        </a>
                                        <h3 class="product-name">
                                            <a href="{{route('Frontend.pages.view_details', $topProduct->id)}}">{{$topProduct->name}}</a>
                                        </h3>
                                        <a href="{{route('Frontend.pages.view_details', $topProduct->id)}}">
                                            <h4 class="product-price">{{$topProduct->price}}<del class="product-old-price">$990.00</del></h4>
                                        </a>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>

                                    </div>

                                    <form action="{{ route('Frontend.pages.add_to_cart') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="add-to-cart">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="id" value="{{ $topProduct->id }}">
                                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </form>
                                    
                                </div>
                                <!-- /product -->
                                @endforeach
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
              

                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
                        
                        

                      
                    </div>

                    <div>
                       

                       

                       
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Top selling</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src={{asset('./img/product04.png')}} alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$topProduct->category}}</p>
                                <h3 class="product-name"><a href="#">{{$topProduct->category->name}}</a></h3>
                                <h4 class="product-price">{{$topProduct->price}} <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                        <!-- /product widget -->

                       

                        --}}
                    </div>

                    <div>
                       

                       

                      
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            

               
                        
                     
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection