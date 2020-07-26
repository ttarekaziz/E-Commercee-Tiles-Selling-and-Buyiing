<!doctype html>
 @if(auth()->user()->role==='admin')
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{Route('homeroute')}}">ATC CERAMICS</a>
  
  <ul class="navbar-nav px-3">
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
  </ul>
</nav>
</body>
@endif
</html>