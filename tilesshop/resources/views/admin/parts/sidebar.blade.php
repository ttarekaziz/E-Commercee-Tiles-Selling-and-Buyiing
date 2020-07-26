<!doctype html>
<body>
   @if(auth()->user()->role==='admin')
	<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          
     
          <li class="nav-item">
            <a class="nav-link" href="{{route('pendingorderlist')}}">
              <span data-feather="file"></span>
             Pending Orders
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('completeorderlist')}}">
              <span data-feather="file"></span>
             Complete Orders
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('cancelorderlist')}}">
              <span data-feather="file"></span>
             Canceled Orders
            </a>
          </li>
         

          <li class="nav-item">
            <a class="nav-link" href="{{route('categorylistroute')}}">
              <span data-feather="shopping-cart"></span>
              Category List
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('productlistroute')}}">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          
          
        </ul>
       
      </div>
    </nav>

    <main>
    </main>
  </div>
</div>
</body>
@endif
</html>