@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">Slider List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('slider_create')}}">Add New Slider</a></h3>
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(70,99,202,255)" >Ser No</th>
                    <th style="color:rgba(70,99,202,255)" >Slider Name</th> 
                    <th style="color:rgba(70,99,202,255)">Slider Image</th>  
                    <th style="color:rgba(70,99,202,255)" >Slider Description</th> 
                    <th style="color:rgba(70,99,202,255)">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($sliders as $slider)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$slider->slider_name}}</td>
                    <td>{{$slider->slider_description}}</td>
                    <td>
                      @if(file_exists(storage_path().'/app/public/sliders/'.$slider->slider_image) &&(!is_null($slider->slider_image)))
                      <img src="{{asset('storage/sliders/'. $slider->slider_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>

                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('slider_edit',$slider->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('slider_delete',$slider->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                   {{ $sliders->links() }} 
        </div>
    </div>
</div>
    
@endsection