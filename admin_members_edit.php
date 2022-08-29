<?php include_once("header.php"); ?>
<?php include_once("validation.php"); ?>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav_admin.php"); ?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once("top_bar.php"); ?>


<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Edit Member Details</h1>
</div>

<div class="row">
<div class="col-md-12">
<div class="card shadow mb-4">
<div class="card-body">


<?php 


$edit_id = $_GET['edit'];
if(!isset($edit_id)){
    header("location: admin_members.php");
}

$profile_edit = mysqli_query($db, "SELECT * FROM users WHERE id = '$edit_id' ");
$data_edit = mysqli_fetch_assoc($profile_edit);
if(mysqli_num_rows($profile_edit) == 0){
    header("localtion: admin_members.php");
}else{

    $user_name       = $data_edit['name'];
    $user_email      = $data_edit['email'];
    $user_password   = $data_edit['password'];
    $user_role       = $data_edit['role'];
    $user_cnic       = $data_edit['cnic'];
    $user_address       = $data_edit['address'];
    $user_number       = $data_edit['number'];


    ?>




<form action="" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="name" value="<?php echo $user_name ?>" placeholder="Enter Name" requried>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" value="<?php echo $user_email ?>" placeholder="Enter Email" requried>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" value="<?php echo $user_password ?>" placeholder="Enter Password" requried>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" name="number" value="<?php echo $user_number ?>" placeholder="Enter Number" requried>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="cnic" value="<?php echo $user_cnic ?>" placeholder="Enter CNIC" requried>
    </div>
    <div class="form-group">
        <input type="address" class="form-control" name="address" value="<?php echo $user_address ?>" placeholder="Enter Address" requried>
    </div>
    <input type="submit" class="btn btn-primary" value="Update" name="update_btn">
    <a href="admin_members.php" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Go Back</a>
</form>
<?php 

if(isset($_POST['update_btn'])){

    
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $cnic     = $_POST['cnic'];
    $number   = $_POST['number'];
    $address  = $_POST['address'];

    $update = mysqli_query($db, "UPDATE users SET name = '$name', email = '$email', password = '$password', cnic = '$cnic', number = '$number', address = '$address' WHERE id = '$edit_id' ");
    if($update){

        echo "<p class='alert alert-success mt-3'>Member Info is Updated.</p>";

    }else{
        echo $db->error;
    }

}


?>









    <?php




}






?>











</div>
</div>
</div>
</div>

<!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once("footer_backend.php"); ?>