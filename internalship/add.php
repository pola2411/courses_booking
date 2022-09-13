<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$s = "SELECT * FROM `instractors`";
$qs = mysqli_query($con, $s);
if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $instractor = $_POST['instractor'];
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    move_uploaded_file($tmp_name, $location . $image_name);
    $i="INSERT INTO `internalship` VALUES(NULL,'$title','$image_name','$description', '$address' ,'$start','$end',$instractor)";
    $qi=mysqli_query($con,$i);
    if($qi){
        go("/internalship/list.php");
    }




}



?>
<main id="main" class="main">
    <div class="container">
        <h1>Add Internalship</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Time</label>
                        <input type="date" name="start" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">End Time</label>
                        <input type="date" name="end" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Instractor</label>
                        <select name="instractor" class="form-control">
                            <?php foreach ($qs as $data) { ?>
                                <option value="<?php echo "$data[id]" ?>"><?php echo "$data[name]" ?></option>
                            <?php } ?>

                        </select>

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