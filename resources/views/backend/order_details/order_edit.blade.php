@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Order<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('order_index')}}">Update list</a></h3>
        
    <form action="{{route('order_update',$orders->id)}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <!-- <div class="form-group mt-2">
              <label for="">Receiver Name</label>
              <input class="form-control" type="text " name="name" value="{{$orders->name}}">
            </div> -->
            <div class="form-group mt-2">
              <label for="">Delivery Status</label>
              <select class="form-select" name="status" >
              <option value="Pending">{{$orders->status}}</option> 
              <option value="Processing" >Processing</option>     
            </select>
            </div>

            <div class="form-group mt-2">
            <label for="">Delivery Address</label>
              <input class="form-control" type="text " name="address" value="{{$orders->address}}">
            </div>

            <div class="form-group mt-2">
              <label for="">Receiver Phone no</label>
              <input type="text" name="mobile_no" class="form-control" value="{{$orders->mobile_no}}">
            </div>

            <div class="form-group mt-2">
              <label for="">Addition Info</label>
              <input type="text" name="additional_info" class="form-control" value="{{$orders->additional_info}}">
            </div>

            <div class="form-group mt-2">
              <label for="">Product Name</label>
              <input type="text" name="product_name" class="form-control" value="{{$orders->product_name}}">
            </div>

            <div class="form-group mt-2">
              <label for="">Quantity</label>
              <input type="text" name="quantity" class="form-control" value="{{$orders->quantity}}">
            </div>

            <div class="form-group mt-2">
              <label for="">Price</label>
              <input type="text" name="price" class="form-control" value="{{$orders->price}}">
            </div>

            <div class="form-group mt-2">
              <label for="">Prescription Image</label>
              <input type="file" name="prescription_image" value="{{$orders->prescription_image}}" class="form-control"   >
          </div>

          <div class="form-group mt-2">
            <input class="form-control" type="text " name="delivery_system"  value="{{$orders->delivery_system}}"placeholder="Delivery System ">

            @error('delivery_system')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
            
            <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    
@endsection