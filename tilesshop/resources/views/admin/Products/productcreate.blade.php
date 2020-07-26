@extends('admin.master')

@section('content')

    <h3>Product create form</h3>

    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('productcreateroute2')}}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="p_name">Enter Product Name</label>
            <input type="text" name="product_name" placeholder="Enter Product Name" id="p_name" class="form-control"
                   >

        </div>

        <div class="form-group">
            <label for="p_price">Enter Product Price</label>
            <input id="p_price" name="product_price" type="number" class="form-control"
                   placeholder="enter product price">
        </div>

        <div class="form-group">
            <label for="length">Enter Tiles Length (ft)</label>
            <input id="length" name="length" type="number" class="form-control"
                   
        </div>

        <div class="form-group">
            <label for="width">Enter Tiles Width (ft)</label>
            <input id="width" name="width" type="number" class="form-control"
                  >
        </div>



      
        <div class="form-group">
            <label for="p_description">Description:</label>
            <textarea class="form-control" name="product_description" id="p_description"
                      placeholder="Enter Product Description"></textarea>
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
            <input name="product_image" type="file" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
