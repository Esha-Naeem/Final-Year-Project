<?php include_once("header.php"); ?>
<?php include_once("validation.php"); ?>
<body id="page-top">
<div id="wrapper">
<?php 


if($sesssion_role == 'admin'){
    include_once("nav_admin.php");
}elseif($sesssion_role == 'user'){
    include_once("nav_user.php");
}elseif($sesssion_role == 'faculty'){
    include_once("nav_faculty.php");
}




?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once("top_bar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <?php 
                    
                    if($sesssion_role == 'admin'){
                        ?>




                        <?php
                    }
                    
                    ?>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $user_name ?>'s Profile Details</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Setting Options:</div>
                                            <a class="dropdown-item" href="#">Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    

                                <table class="table table-bordered mb-0 table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <td><?php echo $user_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $user_email ?></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><?php echo $user_password ?></td>
                                    </tr>
                                    <tr>
                                        <th>CNIC</th>
                                        <td><?php echo $user_cnic ?></td>
                                    </tr>
                                    <tr>
                                        <th>Number</th>
                                        <td><?php echo $user_number ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $user_number ?></td>
                                    </tr>
                                </table>


                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
                    </div>

                    <!-- Content Row -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include_once("footer_backend.php"); ?>