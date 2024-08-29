@extends('frontend.master')

@section('content')
    
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-product-fillter">

                        @foreach ($categories as $category)
                        @foreach ($category->medicines as $medicine)
                      
                            @php
                            $counts=$category->medicines->count();
                            @endphp

                        @endforeach
                        @endforeach
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{$counts}}</strong> items for you!</p>
                        </div>
                    </div>
 
                    <div class="row product-grid-3">
                    @foreach ($categories as $category)
                    @foreach ($category->medicines as $medicine)
                   
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('frontend_product',$medicine->id)}}">
                                            <img class="default-img" src="{{asset('storage/medicines/'. $medicine->medicine_image)}}" alt="">
                                      
                                        </a>
                                    </div>
                                
                            
                                </div>  
                              
                                <div     class="product-content-wrap mt-5">                                 
                                    <h2><a href="product-details.html">{{$medicine->medicine_name}}</a></h2>
                                    <span>Company: {{$medicine->company->company_name}}</span><br>
                                    <span>Shop: {{$medicine->vendor->vendor_name}}</span>
                                    <div class="rating-result" title="90%">
                                        <span></span>
                                    </div>
                                    <div class="product-price">
                                        <span>Rs.{{$medicine->medicine_price}}</span>
                                     
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="{{route('frontend_product',$medicine->id)}}"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                                                      
                            </div>
                        </div>                    
                        @endforeach   
                    @endforeach
                </div>
                    <!--pagination-->



  
                  
                </div>
       
            </div>
        </div>
    </section>
</main>



@endsection