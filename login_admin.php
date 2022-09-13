<?php
include("./shared/head.php");
include("./general/connection.php");




if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];
    $new_pass=sha1($password);
    $s="SELECT * FROM `admin` where email='$email' AND `password`='$new_pass'";
    $qs=mysqli_query($con,$s);
    $row=mysqli_fetch_assoc($qs);
    $nom_row=mysqli_num_rows($qs);
    if($nom_row>0){
        $_SESSION['admin']=$email;
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['image']=$row['image'];

        echo "<script>
        window.location.replace('/courses_booking/')
        
        
        </script>"; 
    }


}



?>


















  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                  <img  style="width: 130px;"  class="login_img" src="/courses_booking/assets/img/instant.jpg" alt="">
               
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h1 style="color:white;" class="card-title text-center pb-0 fs-4">Login to Your Account</h1>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                     
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
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
include("./shared/script.php");



?>