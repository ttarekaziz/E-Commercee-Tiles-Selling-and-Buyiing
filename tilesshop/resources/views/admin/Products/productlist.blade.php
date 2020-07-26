@extends('admin.master')

@section('content')

 
    <a href="{{route('productcreateroute')}}" class="btn btn-success">Create New Product</a>

  


<p>this is product list</p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Category Name</th>
        <th scope="col">Length</th>
        <th scope="col">Width</th>
        <th scope="col">Price</th>
      
        <th scope="col">Image</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($all_products as $key=>$single_data)
        <tr>
            <th scope="row">{{$key+1}}</th>
            
            <td>{{$single_data->name}}</td>
            <td>{{$single_data->category->name}}</td>
            <td>{{$single_data->length}}</td>
            <td>{{$single_data->width}}</td>
            <td>{{$single_data->price}}</td>
          
            <td>
                <img style="width: 100px;" src="{{url('/uploads/product/'.$single_data->product_image)}}" alt="kodeeo">
            </td>
            <td>
                <a href="{{route('producteditroute', ['id'=>$single_data->id])}}" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-success">View</a>
                <a href="{{route('productdelete', ['id'=>$single_data->id])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
