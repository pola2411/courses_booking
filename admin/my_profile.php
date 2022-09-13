<?php
include("../shared/head.php");
include("../shared/header.php");
include("../shared/aside.php");
include("../general/connection.php");
include("../general/function.php");
$id = $_SESSION['id'];
$s = "SELECT * FROM `admin` where id=$id";
$qs = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($qs);

if (isset($_POST['edit'])) {
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    if (empty($_FILES['image']['name'])) {
        $image_name = $row['image'];
    } else {
        $image_name = time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/";
        move_uploaded_file($tmp_name, $location . $image_name);
    }
    $u = "UPDATE `admin` SET `name`='$name',`age`='$age',`address`='$address',`image`='$image_name',`phone`='$phone',`salary`='$salary',`email`='$email' WHERE id=$id";
    $qu = mysqli_query($con, $u);
    go("/login_admin.php");
        session_reset();
        session_destroy();
    
}
if(isset($_POST['change_pass'])){
$old_pass=$_POST['password'];
$new_pass=$_POST['newpassword'];
$re_pass=$_POST['renewpassword'];
/*   ----------------    shal*/
$old_shal=sha1($old_pass);
$new_shal=sha1($new_pass);
$re_shal=sha1($re_pass);
if($old_shal==$row['password']){
    if($new_shal==$re_shal){
        $up="UPDATE `admin` SET `password`='$new_shal'  WHERE id=$id";
        $qup=mysqli_query($con,$up);
        go("/login_admin.php");
        session_reset();
        session_destroy();

    }


}





}




?>
<main id="main" class="main ">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile ">
        <div class="row">
            <div class="col-xl-4 ">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="/courses_booking/admin/upload/<?= $row['image'] ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $row['name'] ?></h2>

                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8 ">

                <div class="card my_profile">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title label">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name </div>
                                    <div class="col-lg-9 col-md-8"><?= $row['name'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Age</div>
                                    <div class="col-lg-9 col-md-8"><?= $row['age'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $row['address'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $row['phone'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Salary</div>
                                    <div class="col-lg-9 col-md-8"><?= $row['salary'] ?></div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $row['email'] ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="/courses_booking/admin/upload/<?= $row['image'] ?>" alt="Profile">
                                            <div class="pt-2">
                                            <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName" value="<?= $row['name'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Age</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="age" type="number" class="form-control" value="<?= $row['age'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="company" value="<?= $row['address'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Job" value="<?= $row['phone'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Salary</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="salary" type="number" class="form-control" id="Country" value="<?= $row['salary'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Address" value="<?= $row['email'] ?>">
                                        </div>
                                    </div>




                                    <div class="text-center">
                                        <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST">

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
include("../shared/footer.php");
include("../shared/script.php");

?>