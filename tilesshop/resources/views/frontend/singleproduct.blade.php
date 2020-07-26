<!DOCTYPE html>
<html lang="en">

<body>

@include('part.header');    <!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url({{asset('images/bg_6.jpg')}});">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Product Single</h1>
                <p class="breadcrumbs">
                <span class="mr-2">
                    <a href="index.html">Home</a>
                    </span>
                    <span class="mr-2">
                    <a href="index.html">Product</a>
                </span>
                    <span>Product Single</span>
                </p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{asset('uploads/product')}}/{{$product->product_image}}" class="image-popup">
                    <img src="{{asset('uploads/product')}}/{{$product->product_image}}" class="img-fluid"
                         alt="Colorlib Template">
                </a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">

                <h3>{{$product->name}}</h3>
                <p class="price"><span>BDT {{$product->price}}</span></p>
                <p>{{$product->description}}</p>

                <p>Length: <span id="length">{{$product->length}}</span></p>
                <p>width: <span id="width">{{$product->width}}</span></p>
                <div class="row mt-4">

                    <div class="w-100"></div>
                    <label for="quantity">Area ft<sup>2</sup></label>
                    <div class="input-group col-md-6 d-flex mb-3">

                        <input type="text" id="area"  class="form-control input-number" placeholder="Area"
                               >


                    </div>

                </div>
                <p><span>Tiles: </span><span id="tiles"></span></p>
                <p><a href="{{route('addToCart', $product->id)}}" class="btn btn-primary py-3 px-5">Add to Cart</a></p>
            </div>
        </div>
    </div>
</section>


<footer class="ftco-footer bg-light ftco-section">
    @include('part.footer');
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>




<script>
    const area = document.querySelector('#area');
    area.addEventListener('input', function () {
        const length = document.querySelector('#length'),
            width = document.querySelector('#width'),
            tiles = document.querySelector('#tiles');
        const sum = length.textContent * width.textContent;
        tiles.textContent = Math.ceil(area.value /sum);
    })

</script>

</body>
</html>
