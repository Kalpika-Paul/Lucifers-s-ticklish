<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('admin-assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LARAVEL SHOP</span>
    </a>
    <!-- Sidebar -->

    <div class="sidebar">
       <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                <a href="{{route('dashboard')}}"
                        class="nav-link">
                        <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                        {{-- <i class="nav-icon fas fa-users"></i> --}}
                        <p>
                            Dashboard
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                        </p>
                    </a>
                </li>
                        
            <li class="nav-item">
               <a href="#"
                    class="nav-link  ">
                    <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                    
                    <p>
                        Product
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}"
                                class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subcategory.index')}}"
                                class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>subcategory</p>
                            </a>
                        </li>
                     </ul>
                    </li>

                <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                            <p>
                                Brand
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="{{route("brand.index")}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Brand</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                            <p>
                                Unit
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="{{route("unit.index")}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Unit</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                       
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                            <p>
                                Sizes
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="{{route("size.index")}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sizes Infos</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                            <p>
                                Colors
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="{{route("color.index")}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Colors Infos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                         
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                            <p>
                                All Products Info
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="{{route("product.index")}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Info</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                            <p>
                                Customer Orders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="{{route('admin.allorders')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Info</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                       

                  </ul>
                 
             </li>
        </nav>
                
{{-- 
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item {{ request()->routeIs(['admin.category1', 'admin.subcategory1']) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs(['admin.category1', 'admin.subcategory1']) ? 'active' : '' }}">
                                <i class="nav-icon far fa-chart-bar" aria-hidden="true"></i>
                                <p>
                                    Product1 <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.category1') }}" class="nav-link {{ request()->routeIs('admin.category1') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>category1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.subcategory1') }}" class="nav-link {{ request()->routeIs('admin.subcategory1') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>subcategory2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav> --}}

    





    </div>
    <!-- /.sidebar -->

   
    <!-- /.sidebar -->
 </aside>