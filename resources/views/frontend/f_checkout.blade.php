@extends('frontend.master')

@section('content')

<div class="container p-5">

    <form action="{{route('order_store')}}" method="POST">
        @csrf 
        <div class="row">
            <div class="col-md-6">
                <div class="mb-25">
                    <h4>Billing Details</h4>
                </div>
                <div class="form-group">
                    <input type="text" required="" name="name" Placeholder="Name *">
                    <input type="hidden" required="" name="user_id" value="{{auth()->user()->id}}">
                </div>
                <div class="form-group">
                    <input type="text" name="address" required="" placeholder="Address *">
                </div>
                <div class="form-group">
                    <input required="" type="text" name="mobile_no" placeholder="Phone *">
                </div>
                <div class="mb-20">
                    <h5>Additional information</h5>
                </div>
                <div class="form-group mb-30">
                    <textarea rows="5" name="additional_info" placeholder="Order notes"></textarea>
                </div>   
            </div>

            <div class="col-md-6">
                <div class="order_review">
                    <div class="mb-20">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total=0
                                @endphp
                                @foreach ($cartItems as $item)
                                @php
                            
                                $total +=$item->total_price;
                                @endphp
                                <tr>

                                <td class="image product-thumbnail">
                      @if(file_exists(storage_path().'/app/public/prescriptions/'.$item->prescription_image) &&(!is_null($item->prescription_image)))
                      <img src="{{asset('storage/prescriptions/'. $item->prescription_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/medicines/'. $item->medicine->medicine_image)}}" alt="#">
                      @endif
                    </td>


                               
                                    <td>
                                        <h5><a href="product-details.html"> {{$item->medicine->medicine_name}}</a>
                                        <input type="hidden" required="" name="product_name" value="{{$item->medicine->medicine_name}}">
                                        </h5> <span class="product-qty">x {{$item->quantity}}</span>
                                        <input type="hidden" required="" name="quantity" value="{{$item->quantity}}">
                                    </td>
                                    <td>Rs.{{$item->total_price}}</td>
                                </tr>
                                @endforeach                 
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal" colspan="2">${{$total}}</td>
                                </tr>
                            
                                <tr>
                                    <th>Total</th>
                                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">Rs.{{$total}}</span>
                                    <input type="hidden" required="" name="price" value="{{$total}}">
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    <div class="payment_method">
                        <div class="mb-25">
                            <h5>Payment</h5>
                        </div>
                        <div class="delivery_system">
                            <div class="row">
                                <div class="custome-radio col">
                                    <input class="form-check-input" type="radio" name="delivery_system" id="exampleRadios3"  >
                                    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                </div>
                                <div class="custome-radio col">
                                    <input class="form-check-input" type="radio" name="delivery_system" id="exampleRadios2"  >
                                    <label class="form-check-label" for="exampleRadios2" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Card Payment </label>                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                                </div>
                                <div class="col">
                                    <button id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata=""
                                    order="If you already have the transaction generated for current order"
                                    endpoint="/pay-via-ajax"> Pay Now
                                    </button>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection

