<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");

$id_hack=$_GET['id'];
$s="SELECT COUNT(hackson_booking.id)as num_dip FROM `hackson_booking`  GROUP BY hackson_id having hackson_id=$id_hack";
$qs=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($qs);

$s_t="SELECT student.name,student.phone,student.address FROM `hackson_booking` JOIN student ON `hackson_booking`.student_id=student.id where `hackson_booking`.hackson_id=$id_hack";
$q_s_t=mysqli_query($con,$s_t);

?>


<main id="main" class="main">
<div class="container col-md-8">
        <h1>Details about Hackson</h1>
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