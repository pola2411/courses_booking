<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$id=$_GET['update'];
$s = "SELECT `diplomas`.id as diploma_id ,`diplomas`.title,`diplomas`.`image` as diploma_image ,`diplomas`.`description`,`diplomas`.price,`diplomas`.start_time,`diplomas`.end_time,`instractors`.id as instractor_id,`instractors`.`name` FROM `diplomas`JOIN `instractors`ON diplomas.insractor_id=`instractors`.id where `diplomas`.id=$id";
$qs = mysqli_query($con, $s);
$row=mysqli_fetch_assoc($qs);

$si = "SELECT * FROM `instractors`";
$qsi = mysqli_query($con, $si);
/* end select  start update*/
if(isset($_POST['send'])){
    $id=$_GET['update'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $instractor = $_POST['instractor'];
    if(empty($_FILES['image']['name'])){
        $image_name=$row['diploma_image']; 

    }else{
        $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    move_uploaded_file($tmp_name, $location . $image_name);

    }
    $u="UPDATE `diplomas` SET `title`='$title',`image`='$image_name',`description`='$description',`price`='$price',`start_time`=' $start',`end_time`=' $end',`insractor_id`='$instractor' WHERE `diplomas`.id=$id";
    $qu=mysqli_query($con,$u);
    if($qu){
        go("/diploma/list.php");
    }



}

?>
<main id="main" class="main">
    <div class="container">
        <h1>Edit Diploma</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" value="<?php echo"$row[title]" ?>" class="form-control" name="title" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" value="<?php echo"$row[description]" ?>"  name="description" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="number" value="<?php echo"$row[price]" ?>"  name="price" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Start Time</label>
                        <input type="date" value="<?php echo"$row[start_time]" ?>"  name="start" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">End Time</label>
                        <input type="date" value="<?php echo"$row[end_time]" ?>"  name="end" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Instractor</label>
                        <select name="instractor" class="form-control">
                            <option value="<?php echo"$row[instractor_id]" ?>"><?php echo"$row[name]" ?></option>
                            
                            <?php foreach ($qsi as $data) { ?>
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