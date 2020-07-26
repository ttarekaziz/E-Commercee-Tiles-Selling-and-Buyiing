<!DOCTYPE html>
<html lang="en">

<body>

@include('part.header')    

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">My Cart</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <form action="{{route('updateCart')}}" method="post">
                        @csrf
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="text-center cart-products-{{$item->id}}">
                                    <td class="product-remove">
                                        <a href="{{route('cart.remove', $item->id )}}"><span
                                                class="ion-ios-close"></span></a>
                                    </td>
                                    <td class="image-prod">
                                        <div class="img"
                                             style="background-image:url({{asset('uploads/product/')}}/{{$item->associatedModel->product_image}});"></div>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{$item->name}}</h3>
                                        <p>{{$item->associatedModel->description}}</p>
                                    </td>
                                    <td class="price">{{$item->price}}</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="id[]" value="{{$item->id}}">
                                            <input type="number" name="quantity[]"
                                                   onchange="totalPrice('cart-products-{{$item->id}}')"
                                                   class="quantity form-control input-number"
                                                   value="{{$item->quantity}}"
                                                   min="1" max="100">
                                        </div>
                                    </td>
                                    <td class="total">0</td>
                                </tr><!-- END TR-->
                            @endforeach
                            </tbody>
                        </table>
                        <p class="text-right">
                            <button id="cancel" class="btn btn-primary py-3 px-4">Cancel</button>
                            <button type="submit" class="btn btn-primary py-3 px-4">Update</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>

            <form action="{{ route('checkout.place.order') }}" class="bg-white p-5 contact-form row justify-content-end" method="post">
                @csrf
                <div class="col col-lg-7 col-md-6 ">
                    <div class="form-group">
                        <input type="text" class="form-control text-left" placeholder="Your First Name" name="first_name"
                               value="{{ auth()->user()->firstname }}" required autocomplete="firstname" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control text-left" placeholder="Your Last Name" name="last_name"
                               value="{{ auth()->user()->lastname }}" required autocomplete="lastname">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control text-left" placeholder="Your address" name="address"
                               value="{{ old('address') }}" required autocomplete="address" >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control text-left" placeholder="Your city" name="city"
                               value="{{ old('city') }}" required autocomplete="city" >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control text-left" placeholder="Your country" name="country" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control text-left" placeholder="Type post_code"
                               name="post_code" required>
                    </div>
                </div>
                <div class="col col-lg-5 col-md-6 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>{{$subTotal}} BDT</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>0.00 BDT</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>0.00 BDT</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>{{$Total}} BDT</span>
                        </p>
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                    </p>
                </div>
            </form>

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

    const quantities = document.querySelectorAll('.quantity'),
        prices = document.querySelectorAll('.price'),
        totals = document.querySelectorAll('.total'),
        cancel = document.querySelector('#cancel');


    function totalPrice(rowOrQuantities, prices = '', totals = '') {
        if (prices === '' && totals === '') {
            let quantitiess = document.querySelectorAll('.quantity');
            for (let j = 0; j < quantitiess.length; j++) {
                let quantity = document.querySelector(`.${rowOrQuantities} .quantity`);
                let price = document.querySelector(`.${rowOrQuantities} .price`);
                let total = document.querySelector(`.${rowOrQuantities} .total`);

                total.textContent = quantity.value * parseFloat(price.textContent);
            }
        } else {
            for (let i = 0; i < rowOrQuantities.length; i++) {
                totals[i].textContent = rowOrQuantities[i].defaultValue * parseFloat(prices[i].textContent);
                rowOrQuantities[i].value = rowOrQuantities[i].defaultValue
                console.log(rowOrQuantities[i].value)

            }

        }
    }

    totalPrice(quantities, prices, totals);

    cancel.addEventListener('click', function (e) {
        e.preventDefault()
        totalPrice(quantities, prices, totals);
    })

</script>


</body>
</html>
