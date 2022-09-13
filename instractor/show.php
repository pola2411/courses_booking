<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");

$id= $_GET['show']; 
    $s = "SELECT `instractors`.id as instractor_id ,`instractors`.`name` as instractor_name,`instractors`.age,`instractors`.salary,`instractors`.`address`,`instractors`.phone,`instractors`.email,`instractors`.years_ex,specialty.name as specialty_name,`instractors`.`image`  FROM `instractors` JOIN specialty on specialty_id =specialty.id where `instractors`.id=$id";
    $qs = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($qs);

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
       $d="DELETE FROM `instractors` WHERE id=$id";
       $qd=mysqli_query($con,$d);
       go("/instractor/list.php"); 

    }
    

?>




<main id="main" class="main">

    <div class="container">

        <div class="card col-md-8">
            <h2>informations about <span class="name_show"><?php echo "$row[instractor_name]" ?></span> <img class="image_show" src="/courses_booking/admin/upload/<?php echo "$row[image]" ?>" alt=""> </h2>
            <hr>
            <div class="card-body">
                <h3>Name: <?php echo "$row[instractor_name]" ?> </h3>
                <hr>
                <h3>Age: <?php echo "$row[age]" ?> </h3>
                <hr>
                <h3>Address: <?php echo "$row[address]" ?> </h3>
                <hr>
                <h3>Phone: <?php echo "$row[phone]" ?> </h3>
                <hr>
                <h3>Salary: <?php echo "$row[salary]" ?> </h3>
               
                <hr>
                <h3>years_ex: <?php echo "$row[years_ex]" ?> </h3>
               
               <hr>
                <h4>Email: <?php echo "$row[email]" ?> </h4>
                <hr>
                <h3>specialty: <?php echo "$row[specialty_name]" ?> </h3>
                <hr>
                    
                <a href="/courses_booking/instractor/show.php?delete=<?php echo "$row[instractor_id]"?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                <a href="/courses_booking/instractor/update.php?update=<?php echo "$row[instractor_id]"?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                <a href="/courses_booking/instractor/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>









            </div>

        </div>

    </div>
</main>
<?php
include("../shared/footer.php");
include("../shared/script.php");

?>