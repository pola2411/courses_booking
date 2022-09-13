<?php
include("./user_shared/head.php");
include("./user_shared/nav.php");
include("./user_shared/function.php");
include("./general/connection.php");
$sd = "SELECT `diplomas`.id as diploma_id ,`diplomas`.title,`diplomas`.`image` as diploma_image ,`diplomas`.`description`,`diplomas`.price,`diplomas`.start_time,`diplomas`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `diplomas`JOIN `instractors`ON diplomas.insractor_id=`instractors`.id";
$qsd = mysqli_query($con, $sd);
/* end diploma start hackson */
$sh = "SELECT `hackson`.id as hackson_id ,`hackson`.title,`hackson`.`image` as hackson_image ,`hackson`.`description`,`hackson`.start_time,`hackson`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `hackson`JOIN `instractors`ON hackson.instractor_id=`instractors`.id";
$qsh = mysqli_query($con, $sh);

$s = "SELECT `internalship`.id as internalship_id ,`internalship`.title,`internalship`.`image` as internalship_image ,`internalship`.`description`,`internalship`.`address`,`internalship`.start_time,`internalship`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `internalship`JOIN `instractors`ON internalship.insractor_id =`instractors`.id";
$qs = mysqli_query($con, $s);
/* start diploma */
if (isset($_GET['dip_id'])) {
  $id_dip = $_GET['dip_id'];
  $id_user = $_SESSION['id'];
  $s_dip="SELECT * FROM `diploma_booking` where student_id=$id_user";
  $q_s_dip=mysqli_query($con,$s_dip);
  $num_row_dip=mysqli_num_rows( $q_s_dip);
if($num_row_dip==0){
  $i_dip = "INSERT INTO `diploma_booking` VALUES(NULL,$id_dip,$id_user) ";
  $q_dip = mysqli_query($con, $i_dip);
  if ($q_dip) {
    echo "<script>
 alert('you are booking diploma done ')
 
 </script>";
    go("/home.php");
  }
}
  else{
    echo "<script>
    alert('you are booking diploma already ')
    
    </script>";
       go("/home.php");

  }
}
if(isset($_GET['hack_id'])){
$id_hack=$_GET['hack_id'];   
  $id_user = $_SESSION['id'];
  $s_hack="SELECT * FROM `hackson_booking` where student_id=$id_user";
  $q_s_hack=mysqli_query($con,$s_hack);
  $num_row_hack=mysqli_num_rows($q_s_hack);

  if($num_row_hack==0){

  $i_dip = "INSERT INTO `hackson_booking` VALUES(NULL,$id_hack,$id_user)";
  $q_dip = mysqli_query($con, $i_dip);
  if ($q_dip) {
    echo "<script>
 alert('you are booking hackson done ')
 
 </script>";
    go("/home.php");
  }}
  else{
    echo "<script>
    alert('you are booking hackson already ')
    
    </script>";
       go("/home.php");

  }
 

 
}
if(isset($_GET['inter_id'])){
  $id_inter=$_GET['inter_id'];   
    $id_user = $_SESSION['id'];

    $s_inter="SELECT * FROM `internalship_booking`where student_id=$id_user";
    $q_d_inter=mysqli_query($con,$s_inter);
    $num_row_inter=mysqli_num_rows($q_d_inter);

  if($num_row_inter==0){

    $i_dip = "INSERT INTO `internalship_booking` VALUES(NULL,$id_inter,$id_user)";
    $q_dip = mysqli_query($con, $i_dip);
    if ($q_dip) {
      echo "<script>
   alert('you are booking internalship done ')
   
   </script>";
      go("/home.php");
    }}
    else{
      echo "<script>
      alert('you are booking internalship already ')
      
      </script>";
         go("/home.php");
  
    }
  
  }
  



?>
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="container text-center text-md-left" data-aos="fade-up">

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <h2>Diplomas:</h2>
      <hr>
      <div class="row">
        <?php foreach ($qsd as $data) { ?>
          <div class="diploma_card card col-md-4">
            <h2><?php echo "$data[title]" ?></h2>
            <img src="/courses_booking/diploma/upload/<?php echo "$data[diploma_image]" ?>" class="dip_img card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo "$data[description]" ?></p>
              <p class="card-text">price:<?php echo "$data[price]" ?></p>
              <p class="card-text">start: <?php echo "$data[start_time]" ?>//end:<?php echo "$data[end_time]" ?></p>
              <p class="card-text">Instractor : <?php echo " $data[name]" ?></p>

              <form action="">
                <a href="/courses_booking/home.php?dip_id=<?php echo "$data[diploma_id]" ?>" class="btn btn-light">Booking</a>

              </form>





            </div>

          </div>
        <?php } ?>
      </div>

    </div>
    <div class="line"></div>
  </section><!-- End About Section -->

  <section id="steps" class="about">

    <div class="container">
      <h2>Hackson:</h2>
      <hr>
      <div class="row">
        <?php foreach ($qsh as $data) { ?>
          <div class="diploma_card card col-md-4">
            <h2><?php echo "$data[title]" ?></h2>
            <img src="/courses_booking/hackson/upload/<?php echo "$data[hackson_image]" ?>" class="dip_img card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo "$data[description]" ?></p>
              <p class="card-text">start: <?php echo "$data[start_time]" ?>//end:<?php echo "$data[end_time]" ?></p>
              <p class="card-text">Instractor : <?php echo "$data[name]" ?></p>

              <form action="">
                <a href="/courses_booking/home.php?hack_id=<?php echo "$data[hackson_id]" ?>" class="btn btn-light">Booking</a>

              </form>








            </div>

          </div>
        <?php } ?>
      </div>

    </div>



    <div class="line"></div>
  </section>
  <section id="features" class="about">
    <div class="container">
      <h2>Internalship:</h1>
        <hr>
        <div class="row">
          <?php foreach ($qs as $data) { ?>
            <div class="diploma_card card col-md-4">
              <h2><?php echo "$data[title]" ?></h2>
              <img src="/courses_booking/internalship/upload/<?php echo "$data[internalship_image]" ?>" class="dip_img card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text"><?php echo "$data[description]" ?></p>
                <p class="card-text">address: <?php echo "$data[address]" ?></p>
                <p class="card-text">start: <?php echo "$data[start_time]" ?>//end:<?php echo "$data[end_time]" ?></p>
                <p class="card-text">Instractor : <?php echo "$data[name]" ?></p>

                <form action="">
                <a href="/courses_booking/home.php?inter_id=<?php echo "$data[internalship_id]" ?>" class="btn btn-light">Booking</a>

              </form>





              </div>

            </div>
          <?php } ?>
        </div>

    </div>
    <div class="line"></div>


  </section><!-- End About Section -->



  <!-- ======= Testimonials Section ======= -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row no-gutters justify-content-center" data-aos="fade-up">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email mt-4">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone mt-4">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>

        </div>

        <div class="col-lg-5 d-flex align-items-stretch">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

      </div>


    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->




<?php


include("./user_shared/footer.php");
include("./user_shared/script.php");



?>