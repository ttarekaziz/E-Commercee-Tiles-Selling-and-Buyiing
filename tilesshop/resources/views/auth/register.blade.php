<!DOCTYPE html>
<html lang="en">

  <body>

   @include('part.header');
    <!-- END nav -->



    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="{{ route('register') }}" class="bg-white p-5 contact-form" method="post">
                @csrf
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Your First Name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Last Name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" >
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" >
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Phone Number" name="number" value="{{ old('number') }}" required autocomplete="number" >
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="type your password" name="password" >
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="confirm your password" name="password_confirmation" required>
              </div>

              <div class="form-group">
                <input type="submit" value="Create Account" class="btn btn-primary py-3 px-5">
              </div>
            </form>

          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>

      </div>
    </section>



    <footer class="ftco-footer bg-light ftco-section">
     @include('part.footer');
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>

  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>


  <script src="js/aos.js"></script>


  <script src="js/scrollax.min.js"></script>

  <script src="js/main.js"></script>
  </body>
</html>
