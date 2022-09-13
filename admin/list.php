<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$s="SELECT * FROM `admin`";
$qs=mysqli_query($con,$s);

?>

<main id="main" class="main">
<div class="container col-md-8">
        <h1>List Admin</h1>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">email</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($qs as $data) { ?>
                    <tr>
                        <td><?php echo "$data[id]" ?></td>
                        <td><?php echo "$data[email]" ?></td>
                        <td><a href="/courses_booking/admin/show.php?show=<?php echo"$data[id]" ?>"><i class='bx bx-show'></i></a></td>
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








