<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");

$id= $_GET['show']; 
    $s = "SELECT `admin`.id as admin_id ,`admin`.`name` as admin_name,`admin`.age,`admin`.salary,`admin`.`address`,`admin`.phone,`admin`.email,roles.name as role_name,`admin`.`image`  FROM `admin` JOIN roles on role_id =roles.id where `admin`.id=$id";
    $qs = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($qs);

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
       $d="DELETE FROM `admin` WHERE id=$id";
       $qd=mysqli_query($con,$d);
       go("/admin/list.php"); 

    }
    

?>




<main id="main" class="main">

    <div class="container">

        <div class="card col-md-8">
            <h1>informations about <span class="name_show"><?php echo "$row[admin_name]" ?></span> <img class="image_show" src="/courses_booking/admin/upload/<?php echo "$row[image]" ?>" alt=""> </h1>
            <hr>
            <div class="card-body">
                <h3>Name: <?php echo "$row[admin_name]" ?> </h3>
                <hr>
                <h3>Age: <?php echo "$row[age]" ?> </h3>
                <hr>
                <h3>Address: <?php echo "$row[address]" ?> </h3>
                <hr>
                <h3>Phone: <?php echo "$row[phone]" ?> </h3>
                <hr>
                <h3>Salary: <?php echo "$row[salary]" ?> </h3>
               
                <hr>
                <h4>Email: <?php echo "$row[email]" ?> </h4>
                <hr>
                <h3>Role: <?php echo "$row[role_name]" ?> </h3>
                <hr>
                    
                <a href="/courses_booking/admin/show.php?delete=<?php echo "$row[admin_id]"?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                <a href="/courses_booking/admin/update.php?update=<?php echo "$row[admin_id]"?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                <a href="/courses_booking/admin/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>









            </div>

        </div>

    </div>
</main>
<?php
include("../shared/footer.php");
include("../shared/script.php");

?>