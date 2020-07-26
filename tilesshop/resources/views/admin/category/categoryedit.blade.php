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

<form method="post" action="{{route('categoryupdate',['id'=>$categories->id])}}" style="margin-right: 400px; margin-left: 400px; margin-top: 50px;">
 @csrf

 <div class="form-group">
                       <label for="name">Name</label>
                       <input name="name" required value="{{$categories->name}}" class="form-control" id="name" type="text" >
                   </div>

                   
                   
 
 <input type="submit" name="update" value="update" class="btn btn-primary" >
</form>

@endsection