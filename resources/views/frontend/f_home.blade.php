@extends('frontend.master')

@section('content')
    

<main class="main">   
    <section class="home-slider position-relative pt-50">  
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach ($sliders as $slider)
            <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h2 class="animated fw-900">{{$slider->slider_name}}</h2>
                           
                               <p class="animated">{{$slider->slider_description}}</p>
                                <a class="animated btn btn-brush btn-brush-3" href=""> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{asset('storage/sliders/'. $slider->slider_image)}}" alt="">
                            </div>
                        </div>
                    </div>                            
                </div>
         
            </div>
            @endforeach               
        </div>

        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>







    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Save Time</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/feature-3.png" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/feature-4.png" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/feature-5.png" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{asset('ui/frontend')}}/assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">

                </div>
                <div class="carausel-6-columns" id="carausel-6-columns">

                    @foreach ($categories as $category)
                    
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="{{route('frontend_shop',$category->id)}}"><img src="{{asset('storage/categories/'. $category->category_image)}}" alt=""></a>
                        </figure>
                        <h5><a href="{{route('frontend_shop',$category->id)}}">{{$category->category_name}}</a></h5>
                    </div>
                    @endforeach
                   
                   
                </div>
            </div>
        </div>
    </section>
    


 
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{asset('ui/frontend')}}/assets/imgs/banner/banner.jpg" alt="" style="width: 100%; height:300px">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand" >Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
 
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Medicines</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach ($medicines as $medicine)
                        <div class="product-cart-wrap small hover-up">   
                     
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{route('frontend_product',$medicine->id)}}">
                                    <img  style="height: 200px" class="default-img" src="{{asset('storage/medicines/'. $medicine->medicine_image)}}" alt="">                                  
                                </a>
                            </div>
                      
                         
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">{{$medicine->medicine_name}}</a></h2>
                            <span>{{$medicine->medicine_description}}</span>
                            <div class="rating-result" title="90%">
                            <span></span>
                            </div>
                            <div class="product-price">
                                <span>${{$medicine->medicine_price}}</span>                  
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--End product-cart-wrap-2-->
                   
                </div>
            </div>
        </div>
    </section>
   
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Company</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">

                    @foreach ($companies as $company)
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{asset('storage/companies/'. $company->company_image)}}" style="height: 200px" alt="">
                    </div>
                    @endforeach
                   
                   
                </div>
            </div>
        </div>
    </section>
    
</main>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    var jq = $.noConflict();
jq(document).ready(function($) {

 
        jq("#medicine_name").select2({
            ajax: {
                url:'{{ URL("/get") }}',
                type: 'get',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchItem: params.term,
                        page: params.page ,
                    };
                },
                processResults: function(data, params) {
                    return {
                        results: data.slice(0),
                    };
                },
                cache: true,
            },
            placeholder: 'Search for medicine...........',
            templateResult: templateResult,
            templateSelection: templateSelection
        });
    });

    function templateResult(data) {
        if (data.loading) {
            return data.text;
        }
        return data.medicine_name;
    }

    function templateSelection(data) {
        return data.medicine_name;
    }
</script> -->

@endsection
