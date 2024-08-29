@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Vendor<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('vendor_index')}}">Vendor list</a></h3>
        
    <form action="{{route('vendor_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="vendor_name" value="{{old('vendor_name')}}"  placeholder="vendor name">

                @error('vendor_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text " name="store_name" value="{{old('store_name')}}" placeholder="store name">

              @error('store_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

          </div>
            <div class="form-group mt-2">
                <input type="file" name="store_image" class="form-control" >

                @error('store_image')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="form-group mt-2">
                <input type="text" name="store_website_link" class="form-control" value="{{old('store_website_link')}}"  placeholder="store website link">

                @error('store_website_link')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

              <div class="form-group mt-2">
                <input type="text" name="location" id="location" class="form-control" value="{{old('location')}}"  >

                @error('location')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

              <div class="form-group mt-2">
                <input type="text" name="latitude" id="latitude" class="form-control" value="{{old('latitude')}}" placeholder="latitude" >

                @error('latitude')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

              <div class="form-group mt-2">
                <input type="text" name="longitude" id="longitude" class="form-control" value="{{old('longitude')}}" placeholder="longitude" >

                @error('longitude')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeLvqI79HYxxdOfnicKS-TBg4A92B7jww&libraries=places"></script>

<script>
  $(document).ready(function(){
    var autocomplete;
    var to = 'location';

    autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)),{
      types:['geocode'],
    });

    google.maps.event.addListener(autocomplete,'place_changed',function(){

     var near_place = autocomplete.getPlace();
     jQuery("#latitude").val(near_place.geometry.location.lat());
     jQuery("#longitude").val(near_place.geometry.location.lng());

    });
  })
</script>


    
@endsection


