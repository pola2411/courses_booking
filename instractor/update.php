
<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$id=$_GET['update'];
$s = "SELECT `instractors`.id as instractor_id ,`instractors`.`name` as instractor_name,`instractors`.age,`instractors`.salary,`instractors`.`address`,`instractors`.phone,`instractors`.email,`instractors`.years_ex,specialty.name as specialty_name,`instractors`.`image`,`instractors`.specialty_id   FROM `instractors` JOIN specialty on specialty_id =specialty.id where `instractors`.id=$id";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);
/* end select values */
$sr="SELECT * FROM specialty";
$qsr=mysqli_query($con,$sr);
/* end select roles */
if(isset($_POST['edit'])){
    $id=$_GET['update'];
$name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$ex=$_POST['ex'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$specialty=$_POST['specialty'];

$u="UPDATE `instractors` SET `name`='$name',`age`='$age',`address`='$address',`phone`='$phone',`years_ex`='$ex',`salary`='$salary',`email`='$email',`specialty_id`='$specialty' WHERE id=$id";
$qu=mysqli_query($con,$u);
if($qu){
    go("/instractor/list.php");
}









}





?>




<main id="main" class="main">
    <div class="container">
        <h1>Edit Admin</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?php echo "$row[instractor_name]" ?>" class="form-control" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Age</label>
                        <input type="number" value="<?php echo "$row[age]" ?>"  name="age" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" value="<?php echo "$row[address]" ?>"  name="address" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" value="<?php echo "$row[salary]" ?>"  name="salary" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" value="<?php echo "$row[phone]" ?>"  name="phone" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">years_ex</label>
                        <input type="text" value="<?php echo "$row[years_ex]" ?>"  name="ex" class="form-control" id="exampleInputPassword1">
                    </div>
         
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" value="<?php echo "$row[email]" ?>"  name="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Specialty</label>
                        <select name="specialty"class="form-control">
                             <option value="<?php echo "$row[specialty_id]"?>"><?php echo "$row[specialty_name]"?> </option> 
                            <?php foreach($qsr as $data) {?>
                              
                            <option value="<?php echo "$data[id]" ?>"><?php echo"$data[name]" ?></option>
                            <?php } ?>

                        </select>

                    </div>

                    <button type="submit" name="edit" class="my_btn btn btn-info">Submit</button>
                </form>

            </div>

        </div>

    </div>
</main>
<?php
include("../shared/footer.php");
include("../shared/script.php");



?>