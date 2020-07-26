<!DOCTYPE html>
<html lang="en">
  
  <body>

   @include('part.header');
    <!-- END nav -->
		
	

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your First Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Last Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Phone Number">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="type your password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="confirm your password">
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


  
  </body>
</html>