<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$s = "SELECT * FROM `specialty`";
$qs = mysqli_query($con, $s);

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $insert = "INSERT INTO `specialty` VALUES (NULL,'$name')";
    $qi = mysqli_query($con, $insert);
    go("/instractor/specialty.php");
}


?>
<main id="main" class="main">
    <div class="container col-md-8">
        <h1>List Specialty</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th scope="col">ID</th>
                    <th scope="col">Name</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($qs as $data) { ?>
                    <tr>
                        <td><?php echo "$data[id]" ?></td>
                        <td><?php echo "$data[name]" ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="line"></div>
    <div class="container">
        <h1>Add Specialty</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                    </div>


                    <button type="submit" name="send" class="my_btn btn btn-info">Submit</button>
                </form>

            </div>

        </div>

    </div>
</main>


<?php
include("../shared/footer.php");
include("../shared/script.php");



?>