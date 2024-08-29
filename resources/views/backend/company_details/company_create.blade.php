@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Company<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('company_index')}}">Company list</a></h3>
        
    <form action="{{route('company_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="company_name" value="{{old('company_name')}}" placeholder="company name">

                @error('company_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group mt-2">
                <input type="file" name="company_image" class="form-control" value="{{old('company_image')}}" >

                @error('company_image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection