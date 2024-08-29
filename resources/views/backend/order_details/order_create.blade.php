@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
      <div class="card-body m-4 ">
        <h3 style="color:rgba(55,180,236,255)">Create Order<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('order_index')}}">Order list</a></h3>
        
        <form action="{{route('order_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
          <div class="form-group mt-2">
            <input class="form-control" type="text " name="name" placeholder="Name">

            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mt-2">
            <input class="form-control" type="text " name="status" placeholder="status">

            @error('status')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mt-2">
            <input class="form-control" type="text " name="address"  placeholder="address">

            @error('address')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mt-2">
            <input type="text" name="mobile_no" class="form-control"  placeholder="mobile no">

            @error('mobile_no')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mt-2">
            <input class="form-control" type="text " name="additional_info" placeholder="Additional Info">

            @error('additional_info')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
       

          <div class="form-group mt-2">
                <select class="form-select" name="product_name" >
                  <option value="">Select Product Name</option>
                  @foreach ($medicines as $medicine)
                  <option value="{{$medicine->id}}" >{{$medicine->medicine_name}}</option>
                  @endforeach        
                </select>

                @error('product_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

          <div class="form-group mt-2">
            <input class="form-control" type="number " name="quantity" placeholder="Quantity ">

            @error('quantity')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mt-2">
            <input class="form-control" type="text " name="price" placeholder="price ">

            @error('price')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mt-2">
              <label for="">Prescription Image</label>
              <input type="file" name="prescription_image" class="form-control"   >
          </div>

          <div class="form-group mt-2">
            
            <select name="delivery_system" class="form-select">
            <option value="">Delivery System</option>
              <option value="Running">Running</option>
              <option value="Completed">Completed</option>
            </select>
            @error('delivery_system')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mt-2">
            <select class="form-select" name="user_id" >
              <option value="">Select user name</option>
                @foreach ($users as $user)
              <option value="{{$user->id}}" >{{$user->name}}</option>
                @endforeach        
            </select>

            @error('user_id')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
            <button type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
      </div>
    </div>
</div>
    
@endsection