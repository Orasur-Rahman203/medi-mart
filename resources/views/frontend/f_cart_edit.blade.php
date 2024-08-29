@extends('frontend.master')

@section('content')
    
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section>
    <div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Cart</h3>
        
    <form action="{{route('item_update',$carts->id)}}" method="post" class="mt-4" >
        @csrf
            <div class="form-group mt-2">          
                <label for="">Change your medicine quantity</label>
                <input class="form-control"  type="number" name="quantity" value="{{$carts->quantity}}">
                <input class="form-control"  type="hidden" name="unit_price" value="{{$carts->unit_price}}" >
            </div>
            <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    </section>

</main>



@endsection