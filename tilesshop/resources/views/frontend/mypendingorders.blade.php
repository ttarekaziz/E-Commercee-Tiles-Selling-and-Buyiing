@extends('frontend.frontmaster')

@section('content')




<p>Completed Orders</p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Order Number</th>
        <th scope="col">Status</th>
        <th scope="col">Grand Total</th>
        <th scope="col">Items</th>
        <th scope="col">Action</th>
       

    </tr>
    </thead>
    <tbody>

    @foreach($orders as $key=>$order)
        <tr>
            <th scope="row">{{$key+1}}</th>

            <td>{{$order->order_number}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->grand_total}}</td>
            <td>{{$order->item_count}}</td>

            <td>
                
                <a href="{{route('cancelorderroute', ['id'=>$order->id])}}"class="btn btn-success">Cancel</a>
            </td>

          
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
