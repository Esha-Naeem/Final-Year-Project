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
<h1 class="h3 mb-0 text-gray-800">Manage <b>Faculty</b> Register Requests</h1>
</div>

<div class="row">
<div class="col-md-12">
<div class="card shadow mb-4">
<div class="card-body">


<div class="table-responsive">
<table class="mb-0 table table-bordered table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Number</th>
        <th>Address</th>
        <th>Cnic</th>
        <th>Status</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php 
    
    
    $get_data = mysqli_query($db, "SELECT * FROM users WHERE role = 'faculty' AND status = 0 ");
    if(mysqli_num_rows($get_data)){
        $count = 0;
        while($row = mysqli_fetch_assoc($get_data)){

            $name     = $row['name'];
            $email    = $row['email'];
            $password = $row['password'];
            $role     = $row['role'];
            $number     = $row['number'];
            $address     = $row['address'];
            $cnic     = $row['cnic'];
            $status     = $row['status'];
            $class     = $row['class'];

            $get_class = mysqli_query($db, "SELECT * FROM class WHERE id = '$class' ");
            if(mysqli_num_rows($get_class)){
                $asd = mysqli_fetch_assoc($get_class);
                $class_name = $asd['class'];
            }else{
                $class_name = $class;
            }

            $count++;
            ?>


            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $number; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $cnic; ?></td>
                <td><?php if($status == 0){ echo "<span class='badge badge-warning'>Pending</span>"; }else{ echo "<span class='badge badge-success'>Approved</span>"; } ?></td>
                <td><?php echo $class_name; ?></td>
                <td>

                    <a href="manage_reg_requests_fac.php?approve=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                    <a href="manage_reg_requests_fac.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                </td>
            </tr>


            <?php
            
        }
    }else{
        ?>

<tr>
    <td colspan=45>No Record Found.</td>
</tr>


        <?php
    }
    
    
    ?>
</tbody>
</table>
</div>
<?php 


if(isset($_GET['delete'])){

    $del_id = $_GET['delete'];
    $remove = mysqli_query($db, "DELETE FROM users WHERE id = '$del_id' ");
    if($remove){
        header("Location: manage_reg_requests_fac.php");
    }

}

if(isset($_GET['approve'])){

    $approve_id = $_GET['approve'];
    $approve = mysqli_query($db, "UPDATE users SET status = 1 WHERE id = '$approve_id' ");
    if($approve){
        header("Location: manage_reg_requests_fac.php");
    }

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