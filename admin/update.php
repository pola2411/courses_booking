
<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$id=$_GET['update'];
$s = "SELECT `admin`.id as admin_id ,`admin`.`name` as admin_name,`admin`.age,`admin`.salary,`admin`.`address`,`admin`.phone,`admin`.email,roles.name as role_name,`admin`.`image`,`admin`.`role_id`  FROM `admin` JOIN roles on role_id =roles.id where `admin`.id=$id";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);
/* end select values */
$sr="SELECT * FROM roles";
$qsr=mysqli_query($con,$sr);
/* end select roles */
if(isset($_POST['edit'])){
    $id=$_GET['update'];
$name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$role=$_POST['role'];

$u="UPDATE `admin` SET `name`='$name',`age`='$age',`address`='$address',`phone`='$phone',`salary`='$salary',`email`='$email',`role_id`='$role' WHERE id=$id";
$qu=mysqli_query($con,$u);
if($qu){
    go("/admin/list.php");
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
                        <input type="text" value="<?php echo "$row[admin_name]" ?>" class="form-control" name="name" aria-describedby="emailHelp">
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
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" value="<?php echo "$row[email]" ?>"  name="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <select name="role"class="form-control">
                             <option value="<?php echo "$row[role_id]"?>"><?php echo "$row[role_name]"?> </option> 
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