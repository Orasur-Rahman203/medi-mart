
<header class="header-area header-style-1 header-height-2">
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('frontend_home')}}"><img src="{{asset('ui/frontend')}}/assets/imgs/logo/medi.png" style="height: 80px" alt="logo"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form action="{{route('search')}}"> 
                            <!-- <select class="form-select" id="medicineName" >
                            </select>  
                                                           -->
                            <input type="text" id="medicineName" name="query" placeholder="Search a medicine...........">

 
                        </form>
                    </div>
                <div>
            <ul class="d-flex align-items-center">
                <div class="header-action-right">
                    <div class="header-action-2">                        
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="">
                                <img alt="Surfside Media" src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/bell.png" style="position: relative;display: inline-block;">  
                                <span style="position: absolute;top: -5px;right: -5px;background-color: #f15412;color: white;width: 18px;height: 18px;border-radius: 50%;text-align: center;font-size: 12px;line-height: 18px;">

                                @isset($myOrderItems)
                                {{ $myOrderItems ?? 0 }}
                                @endisset
                                </span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <div class="shopping-cart-button" style="color:#FF6D0A"> Your 
                                        @isset($myOrderItems)
                                        {{ $myOrderItems ?? 0 }}
                                        @endisset
                                        Order Successfull!
                                    </div> 
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="header-action-right ms-3">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('cart_items')}}">
                                <img alt="Surfside Media" src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count blue">
                                    @isset($myItems)
                                    {{ $myItems ?? 0 }}
                                    @endisset
                                </span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2"> 
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-button">
                                            <a href="{{route('cart_items')}}" class="outline">View cart</a>
                                            <a href="{{route('frontend_checkout')}}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{  auth()->user()->name }}</span>
                            </a><!-- End Profile Iamge Icon -->
                        
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li>
                                    <a href="{{route('logout')}}"><h5 class="ps-2">Sign Out</h5></a>    
                                </li>
                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->
                </div>
            </ul>
        </div>
     </div>
    </div>

    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{asset('ui/frontend')}}/assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="{{route('frontend_home')}}">Home </a></li>
                                <li><a href="{{route('frontend_about')}}">About</a></li>
                                <li class="position-static"><a href="#">Our Collections <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        <li class="sub-mega-menu    sub-mega-menu-width-22">      
                                            <ul>   
                                                @foreach ($categories as $category)
                                                <li><a href="{{route('frontend_shop',$category->id)}}">{{$category->category_name}} 
                                                </a></</li>
                                                @endforeach 
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="product-details.html"><img src="{{asset('ui/frontend')}}/assets/imgs/banner/pain belt.jpg" alt="Surfside Media"></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>Don't miss<br> Trending</h3>
                                                    <div class="menu-banner-price" >
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>35%</span>off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>                               
                                <li>
                                    <a href="{{route('frontend_contact')}}">Contact</a>
                                </li>
                                <li>
                                    <a href="{{route('frontend_myAccount')}}">My Account</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="#">Dashboard</a></li>
                                        <li><a href="#">Products</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="#">Orders</a></li> 
                                    </ul> -->
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> 
                <!-- <div class="hotline d-none d-lg-block">
                    <p>
                        <i class="fi-rs-smartphone"></i><span>Toll Free</span> (+9) 5352-012-235 
                    </p>
                </div> -->
            </div>
        </div>
    </div>
</header>
