
@extends('frontend.frontmaster')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Collection</h1>
            <p class="breadcrumbs"><span class="mr-2"></span> </p>
          </div>
        </div>
      </div>
    </div>
    <main role="main">


        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">

                    @foreach($all_products as $product)

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{url('/uploads/product/'.$product->product_image)}}"  height="225" alt="">
                                <div class="card-body">
                                    <p class="card-text"><a href="{{route('single.product', [$product->id] )}}">{{$product->name}}</a></p>
                                    <p class="card-text">{{$product->category->name}}</p>



                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">

                                            <a href="{{route('buynow', $product->id)}}" class="btn btn-sm btn-outline-secondary">Buy Now</a>
                                            <a href="{{route('addToCart', $product->id)}}" class="btn btn-sm btn-outline-secondary">Add to cart</a>
                                        </div>
                                        <small class="text-muted">{{$product->price}} BDT</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$all_products->links()}}
                </div>
            </div>
        </div>

    </main>
@endsection
