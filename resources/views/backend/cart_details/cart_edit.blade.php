@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Cart<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('cart_index')}}">Cart list</a></h3>
        
    <form action="{{route('cart_update',$carts->id)}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="quantity" value="{{$carts->quantity}}">
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text " name="unit_price" value="{{$carts->unit_price}}">
          </div>
              <div class="form-group mt-2">
                <input type="text" name="total_price" class="form-control" value="{{$carts->total_price}}">
              </div>
              <div class="form-group mt-2">
                <input type="file" name="prescription_image" value="{{$carts->prescription_image}}"class="form-control" >
            </div>
              <div class="form-group mt-2">
                <select class="form-select" name="user_id" >
                  <option value="">Select user name</option>
                  @foreach ($users as $user)
                  <option value="{{$user->id}}" >{{$user->name}}</option>
                  @endforeach        
                </select>
              </div>
              <div class="form-group mt-2">
                <select class="form-select" name="medicine_id" >
                  <option value="">Select Medicine name</option>
                  @foreach ($medicines as $medicine)
                  <option value="{{$medicine->id}}" >{{$medicine->medicine_name}}</option>
                  @endforeach        
                </select>
              </div>
              <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    
@endsection