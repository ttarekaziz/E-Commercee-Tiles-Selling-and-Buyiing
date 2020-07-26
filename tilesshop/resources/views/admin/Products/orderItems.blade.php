@extends('admin.master')

@section('content')




<h1>{{$order->order_number}}</h1>
<p><span class="badge badge-dark">Address:</span> {{$order->address}}, {{$order->city}}, PO:{{$order->post_code}}, {{$order->country}}</p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Grand Total</th>


    </tr>
    </thead>
    <tbody>
    <?php $sum =0;?>
    @foreach($order->items as $key=>$item)
        <?php $sum += $item->price; ?>
        <tr>
            <th scope="row">{{$key+1}}</th>

            <td>{{$item->product->name}}</td>
            <td>{{$item->product->description}}</td>
            <td>${{$item->product->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>${{$item->price}}</td>

        </tr>
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td >Total:</td>
        <td >${{$sum}}</td>
    </tr>
    </tbody>
</table>
<form action="{{route('admin.order.delete', [$order->id] )}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-success">cancel</button>
</form>
@endsection
