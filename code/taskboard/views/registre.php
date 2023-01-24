<?php

if(isset($_POST['submit'])){
    $loginuser= new userController();
    $loginuser->register();
}


?>
<form method="POST">
  <div class="mb-3">
  
<section class="vh-100" style="margin: 20px;">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="<?= BASE_URL ?>/views/public/img/img.png" 
          class="img-fluid" alt="Sample image" style="width:90%">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"><br></p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email_user" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>


          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password_user" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4" >Password</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="text" id="form3Example4" name="name_user" class="form-control form-control-lg"
              placeholder="Enter name" />
            <label class="form-label" for="form3Example4" >Name</label>
          </div>

       

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">registre</button>
            <p class="small fw-bold mt-2 pt-1 mb-0"> have account? <a href="login"
                class="link-danger">login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section></form>