@extends('backend.master')

@section('content')

<main>
    <div class="row grid gap-4 m-3">
        <div class="card col col-3 " >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
          
            <div class="card-body">
                <h5 class="card-title">User list: {{$users}} </h5> 
            </div>
        </div>

        <div class="card col col-3" >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Category list: {{$categories}} </h5> 
            </div>
        </div>

        <div class="card col col-3" >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Medicine list: {{$medicines}} </h5> 
            </div>
        </div>

        <div class="card col col-3" >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Company list: {{$companies}} </h5> 
            </div>
        </div>

        <div class="card col col-3" >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Vendor list: {{$vendors}} </h5> 
            </div>
        </div>
 
        <div class="card col col-3" >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Cart list: {{$carts}} </h5> 
            </div>
        </div>

        <div class="card col col-3" >
            <img src="{{asset('ui/backend')}}/assets/img/users.png" class="card-img-top p-3" alt="...">
            <div class="card-body">
                <h5 class="card-title">Order list: {{$orders}} </h5> 
            </div>
        </div>
    </div>

</main>



@endsection