<!DOCTYPE html>
<html>
<head>
    <title>ATC Ceramics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('homeroute')}}" style="font-size:200%;color:black"> ATC Ceramics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('homeroute')}}" class="nav-link">Home</a></li>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{route('shopproductroute')}}" class="nav-link">Shop</a>
                        </li>

                     

                        <li class="nav-item"><a href="{{route('contactroute')}}" class="nav-link">Contact</a></li>


                        @guest
                            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Sign In</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Sign
                                        up</a></li>
                            @endif
                        @else
                            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Sign Out
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </li>

                            <li class="nav-item">
            <a class="nav-link" href="{{route('mycompleteorders')}}">
              <span data-feather="file"></span>
             My Completed Orders
            </a>
          </li>

            <li class="nav-item">
            <a class="nav-link" href="{{route('mypendingorders')}}">
              <span data-feather="file"></span>
             My Pending Orders
            </a>
          </li>

                             @if(auth()->user()->role==='admin')

                            <li class="nav-item"><a href="{{route('adminhomeroute')}}" class="nav-link">Dashboard</a>
                            </li>

                            @endif


                        @endguest

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart')}}"><span
                                    style=" color: white; background: cadetblue; padding: 2px 6px; border-radius: 50px;">{{ $cartItems }}</span>
                                items </a>
                        </li>


                    </ul>
                </div>
            </ul>
        </div>
</nav>

</body>
</html>
