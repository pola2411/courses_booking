<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");

$s = "SELECT `internalship`.id as internalship_id ,`internalship`.title,`internalship`.`image` as internalship_image ,`internalship`.`description`,`internalship`.`address`,`internalship`.start_time,`internalship`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `internalship`JOIN `instractors`ON internalship.insractor_id =`instractors`.id";
$qs = mysqli_query($con, $s);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $d = "DELETE FROM `internalship` WHERE id=$id";
    $qd = mysqli_query($con, $d);
    go("/internalship/list.php");
}



?>

<main id="main" class="main">

    <div class="container">
        <h1>List Internalship</h1>
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
                        <p class="card-text">Instractor:<?php echo "$data[name]" ?></p>

                        <a href="/courses_booking/internalship/list.php?delete=<?php echo "$data[internalship_id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                        <a href="/courses_booking/internalship/update.php?update=<?php echo "$data[internalship_id]" ?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                        <a href="/courses_booking/internalship/details.php?id=<?php echo "$data[internalship_id]" ?>" class="btn btn-info" style="width:60px ;"><i class='bx bx-show'></i></a>









                    </div>

                </div>
            <?php } ?>
        </div>

    </div>
</main>






<?php
include("../shared/footer.php");
include("../shared/script.php");

?>