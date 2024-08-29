@extends('backend.master')

@section('content')
<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Slider<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('slider_index')}}">Slider list</a></h3>
        
    <form action="{{route('slider_update',$slider->id)}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text "value="{{$slider->slider_name}}" name="slider_name" placeholder="slider name">
            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="text "value="{{$slider->slider_description}}" name="slider_description" placeholder="slider description">
            </div>
            <div class="form-group mt-2">
                <input type="file" name="slider_image" value="{{$slider->slider_image}}"class="form-control" >
              </div>
              <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    
@endsection