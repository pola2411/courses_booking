<?php
include('./user_shared/head.php');
include('./general/connection.php');
if(isset($_POST['submit'])){
   $name= $_POST['name'];
   $age= $_POST['age'];
   $address= $_POST['address'];
   $phone= $_POST['phone'];
   $email= $_POST['email'];
   $password= $_POST['password'];
   $new=sha1($password);
   $i="INSERT INTO `student` values(NULL,'$name',$age,'$address','$phone','$email','$new')";
   $qi=mysqli_query($con,$i);
   echo "<script>
   window.location.replace('/courses_booking/login_user.php')
   
   
   </script>";








}

?>



  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                <img  style="width: 130px;"  class="login_img" src="/courses_booking/assets/img/instant.jpg" alt="">

                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                      <label for="age" class="form-label">age</label>
                      <input type="text" name="age" class="form-control" id="age" required>
                      <div class="invalid-feedback">Please, enter your age!</div>
                    </div>
                    <div class="col-12">
                      <label for="address" class="form-label">Your address</label>
                      <input type="text" name="address" class="form-control" id="address" required>
                      <div class="invalid-feedback">Please, enter your address!</div>
                    </div>
                    <div class="col-12">
                      <label for="phone" class="form-label">Your phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="/courses_booking/login_user.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

          
              <div class="credits">
              Designed by <a href="https://www.facebook.com/pola.nabil.372/">Pola Nabil</a>
              </div>   
          

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <?php
include('./user_shared/script.php');
?>