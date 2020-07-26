@extends('admin.master')
@section('content')
 <h1 style="text-align: center; margin-top: 100px auto; background-color: #80ced6; padding: 15px;">Update Category Information</h1>
@if($errors->any())
<div class="alert alert-danger">
 <ul>
   @foreach($errors->all() as $error)
   <li>{{$errors}}</li>
   @endforeach
 </ul>
</div>
@endif




  <form action="{{route('productupdate',['id'=>$products->id])}}" method="POST" role="form" enctype="multipart/form-data" style="margin-right: 400px; margin-left: 400px; margin-top: 50px;">
   @method('put')
 @csrf

 <div class="form-group">
                        <label for="name">Enter Product Name</label>
                       <input name="product_name" required value="{{$products->name}}" class="form-control" id="name" type="text" >
                   </div>
                   <div class="form-group">
                       <label for="product_price">Enter Product Price</label>
                       <input name="product_price" required value="{{$products->price}}" class="form-control" id="product_price" type="string" >
                   </div>

                   <div class="form-group">
                       <label for="product_description">Description:</label> 
                      <input type="text" name="product_description" required value="{{$products->description}}" class="form-control" id="product_description">
                   </div>

                   <div class="form-group">
            <label for="p_category">Select Category:</label>
            <select name="product_category" id="p_category" class="form-control">

                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>


               <div class="form-group">
            <label for="">Upload Image:</label>
            <input type="file" name="product_image" class="form-control">
            </div>
                   
                   
 
 <input type="submit" name="update" value="update" class="btn btn-primary" >
</form>

@endsection