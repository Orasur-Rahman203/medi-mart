@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">Category List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('category_create')}}">Add New Category</a></h3>
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(70,99,202,255)" >Ser No</th>
                    <th style="color:rgba(70,99,202,255)" >Category Name</th> 
                    <th style="color:rgba(70,99,202,255)" >Category Image</th>  
                    <th style="color:rgba(70,99,202,255)" >Medicine item</th> 
                    <th style="color:rgba(70,99,202,255)">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($categories as $category)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>
                      @if(file_exists(storage_path().'/app/public/categories/'.$category->category_image) &&(!is_null($category->category_image)))
                      <img src="{{asset('storage/categories/'. $category->category_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>

                    <td>
                      @foreach ($category->medicines as $medicine)
                      <li>{{$medicine->medicine_name}}</li>  
                      @endforeach
                  </td>

                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('category_edit',$category->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('category_delete',$category->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                   {{ $categories->links() }} 
        </div>
    </div>
</div>
    
@endsection