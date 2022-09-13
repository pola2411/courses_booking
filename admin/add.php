<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");

$s="SELECT * FROM `roles`";
$qs=mysqli_query($con,$s);
/*end select from roles */
if(isset($_POST['send'])){
$name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$new_pass=sha1($password);
$role=$_POST['role'];
$image_name=time().$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$location="./upload/";
move_uploaded_file($tmp_name,$location.$image_name);
$i="INSERT INTO `admin`(`id`, `name`, `age`, `address`, `image`, `phone`, `salary`, `email`, `password`, `role_id`) VALUES (NULL,'$name',$age,'$address','$image_name','$phone',$salary,'$email','$new_pass',$role)";
$qi=mysqli_query($con,$i);
if($qi){
   go("/admin/list.php");

}else{
    go("/admin/add.php");
}



}





?>
<main id="main" class="main">
    <div class="container">
        <h1>Add Admin</h1>
        <div class="card col-md-8">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Age</label>
                        <input type="number" name="age" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" name="salary" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <select name="role"class="form-control">
                            <?php foreach($qs as $data) {?>
                            <option value="<?php echo "$data[id]" ?>"><?php echo"$data[name]" ?></option>
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