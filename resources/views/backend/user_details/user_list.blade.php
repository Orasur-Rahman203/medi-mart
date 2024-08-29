@extends('backend.master')

@section('content')

  <div class="container">
    <div class="card">    
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">User List  <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('order_create')}}">Medicine list</a></h3>
          <table class="table" >
              <thead >
                <tr>
                  <th style="color:rgba(70,99,202,255)">Ser No</th>
                  <th style="color:rgba(70,99,202,255)">Name</th>
                  <th style="color:rgba(70,99,202,255)">Email</th>
                    <!-- <th style="color:rgba(70,99,202,255)">Order</th>                 -->
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1  
                @endphp
                @foreach ($users as $user)           
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>                   
                    <!-- <td>{{$user->password?? ''}}</td> -->                
                </tr>   
                @endforeach
              </tbody>
          </table>       
        </div>
      </div> 
    </div>
    
@endsection