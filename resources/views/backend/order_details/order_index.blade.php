@extends('backend.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">Order List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('order_create')}}">Add New Order</a></h3>
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(70,99,202,255)">Ser No</th>
                    <th style="color:rgba(70,99,202,255)">Receiver Name</th>
                    <th style="color:rgba(70,99,202,255)">Status</th> 
                    <th style="color:rgba(70,99,202,255)">Address</th> 
                    <th style="color:rgba(70,99,202,255)">Mobile No</th>
                    <th style="color:rgba(70,99,202,255)">Additional Info</th>
                    <th style="color:rgba(70,99,202,255)">Product</th>
                    <th style="color:rgba(70,99,202,255)">Quantity</th> 
                    <th style="color:rgba(70,99,202,255)">Price</th>  
                    <th style="color:rgba(70,99,202,255)">Prescription Image</th> 
                    <th style="color:rgba(70,99,202,255)">Delivery System</th> 
                    <th style="color:rgba(70,99,202,255)">User Name</th>                              
                   <th style="color:rgba(70,99,202,255)">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($orders as $order)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$order->name?? ''}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->address}}</td>               
                    <td>{{$order->mobile_no}}</td>
                    <td>{{$order->additional_info}}</td>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>  
                    <td>
                      @if(file_exists(storage_path().'/app/public/prescriptions/'.$order->prescription_image) &&(!is_null($order->prescription_image)))
                      <img src="{{asset('storage/prescriptions/'. $order->prescription_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>
                    <td>{{$order->delivery_system}}</td> 
                    <td>{{$order->user->name}}</td> 
                         
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('order_edit',$order->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('order_delete',$order->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                    {{ $orders->links() }} 
        </div>
    </div>
</div>
    
@endsection