<?php
include("./shared/head.php");
include("./shared/header.php");
include("./shared/aside.php");
include("./general/connection.php");
include("./general/function.php");
$sd = "SELECT `diplomas`.id as diploma_id ,`diplomas`.title,`diplomas`.`image` as diploma_image ,`diplomas`.`description`,`diplomas`.price,`diplomas`.start_time,`diplomas`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `diplomas`JOIN `instractors`ON diplomas.insractor_id=`instractors`.id";
$qsd = mysqli_query($con, $sd);
/* end diploma start hackson */
$sh = "SELECT `hackson`.id as hackson_id ,`hackson`.title,`hackson`.`image` as hackson_image ,`hackson`.`description`,`hackson`.start_time,`hackson`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `hackson`JOIN `instractors`ON hackson.instractor_id=`instractors`.id";
$qsh = mysqli_query($con, $sh);

$s="SELECT `internalship`.id as internalship_id ,`internalship`.title,`internalship`.`image` as internalship_image ,`internalship`.`description`,`internalship`.`address`,`internalship`.start_time,`internalship`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `internalship`JOIN `instractors`ON internalship.insractor_id =`instractors`.id";
$qs=mysqli_query($con,$s);
?>

<main id="main" class="main">
    <h1 class="index_h1">[INSTANT]</h1>

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










                    </div>

                </div>
            <?php } ?>
        </div>

    </div>



<div class="line"></div>


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










                </div>

            </div>
        <?php } ?>
    </div>

</div>



<div class="line"></div>


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

                    






                    </div>

                </div>
            <?php } ?>
        </div>

    </div>
    


</main><!-- End #main -->





<?php
include("./shared/footer.php");
include("./shared/script.php");



?>