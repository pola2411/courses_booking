<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");

$id_dip=$_GET['id'];
$s="SELECT COUNT(diploma_booking.id)as num_dip FROM `diploma_booking` GROUP BY diploma_id having diploma_id=$id_dip ";
$qs=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($qs);

$s_t="SELECT student.name,student.phone,student.address FROM `diploma_booking` JOIN student ON diploma_booking.student_id=student.id where diploma_booking.diploma_id=$id_dip";
$q_s_t=mysqli_query($con,$s_t);

?>


<main id="main" class="main">
<div class="container col-md-8">
        <h1>Details about diploma</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col">count Booking</th>
                    

                </tr>
            </thead>
            <tbody>
              
                    <tr>
                        <td><?php if(isset($row['num_dip'])){echo "$row[num_dip]";} ?></td>
                    
                    </tr>
                
            </tbody>
        </table>
    </div>
    <div class="line"></div>

    <div class="container col-md-8">
        <h1>List Student booking</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($q_s_t as $data) { ?>
                    <tr>
                        <td><?php echo "$data[name]" ?></td>
                        <td><?php echo "$data[phone]" ?></td>
                        <td><?php echo "$data[address]" ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    






</main>


<?php
include("../shared/footer.php");
include("../shared/script.php");

?>