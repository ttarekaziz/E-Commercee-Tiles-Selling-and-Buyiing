@extends('admin.master')

@section('content')


<h3>Pending Order List</h3>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Order Number</th>
        <th scope="col">User Id</th>
        <th scope="col">Status</th>
        <th scope="col">Grand Total</th>
        <th scope="col">Items</th>
      
        <th scope="col">Payment Status</th>
        <th scope="col">First Name</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($all_orders as $key=>$single_data)
        <tr>
            <th scope="row">{{$key+1}}</th>
            
            <td>{{$single_data->order_number}}</td>
            <td>{{$single_data->user_id}}</td>
            <td>{{$single_data->status}}</td>
            <td>{{$single_data->grand_total}}</td>
            <td>{{$single_data->item_count}}</td>
            <td>{{$single_data->payment_status}}</td>
            <td>{{$single_data->first_name}}</td>
            <td>{{$single_data->address}}</td>
            <td>{{$single_data->city}}</td>
          
           <td>
                
                <a href="{{route('acceptemorderroute', ['id'=>$single_data->id])}}"class="btn btn-success">Complete</a>
            </td>
    @endforeach
    </tbody>
</table>
@endsection
