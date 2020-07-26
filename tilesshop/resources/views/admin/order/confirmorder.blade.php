@extends('admin.master')

@section('content')

<body style="background-color: #;">

@if($errors->any())
<div class="alert alert-danger">
 <ul>
   @foreach($errors->all() as $error)
   <li>{{$errors}}</li>
   @endforeach
 </ul>
</div>
@endif

   <br> <br> <br> <br>

    <center>
        Order ID: {{$orders->id}}<br>
        Order Number: {{$orders->order_number}}<br>
        User Id: {{$orders->user_id}}<br>
        Grand Total: {{$orders->grand_total}}<br>
       First Name: {{$orders->first_name}}<br>
       Items: {{$orders->item_count}}<br>
        Address: {{$orders->address}}<br>
       

         <form action="{{route('confirmorderroute',['id'=>$orders->id])}}" method="POST" role="form" enctype="multipart/form-data">
   @method('post')
 @csrf


 
 <input type="submit" name="update" value="Confirm" class="btn btn-primary" >
</form>

       

    </center>



                </div>

            </div>
        </div>
    </div>

@endsection
