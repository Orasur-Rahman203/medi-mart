@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">Vendor List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('vendor_create')}}">Add New Vendor</a></h3>
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(70,99,202,255)" >Ser No</th>

                    <th style="color:rgba(70,99,202,255)">Vendor Name</th> 

                    <th style="color:rgba(70,99,202,255)">Store Name</th> 

                    <th style="color:rgba(70,99,202,255)">Store Image</th> 

                    <th style="color:rgba(70,99,202,255)">Store Website Link</th> 

                    <th style="color:rgba(70,99,202,255)">Location</th>

                    <th style="color:rgba(70,99,202,255)">Latitude</th> 

                    <th style="color:rgba(70,99,202,255)">Longitude</th>   

                    <th style="color:rgba(70,99,202,255)">Actions</th> 

                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($vendors as $vendor)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$vendor->vendor_name}}</td>
                    <td>{{$vendor->store_name}}</td>
                    <td>
                      @if(file_exists(storage_path().'/app/public/vendors/'.$vendor->store_image) &&(!is_null($vendor->store_image)))
                      <img src="{{asset('storage/vendors/'. $vendor->store_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>
                    <td>{{$vendor->store_website_link}}</td>
                    <td>{{$vendor->location}}</td> 
                    <td>{{$vendor->latitude}}</td> 
                    <td>{{$vendor->longitude}}</td> 
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('vendor_edit',$vendor->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('vendor_delete',$vendor->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                  {{ $vendors->links() }} 
        </div>
    </div>
</div>
    
@endsection