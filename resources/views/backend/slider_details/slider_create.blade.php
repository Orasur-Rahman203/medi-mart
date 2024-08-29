@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Slider<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('slider_index')}}">Slider list</a></h3>
        
    <form action="{{route('slider_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="slider_name" value="{{old('slider_name')}}" placeholder="slider name">

                @error('slider_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="slider_description" value="{{old('slider_description')}}" placeholder="slider description">

                @error('slider_description')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group mt-2">
                <input type="file" name="slider_image" class="form-control" value="{{old('slider_image')}}" >

                @error('slider_image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection