<?php include_once("header.php"); ?>
<?php include_once("validation.php"); ?>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav_user.php"); ?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once("top_bar.php"); ?>


<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">All Subjects</h1>
</div>

<div class="row">
<div class="col-md-12">
<div class="card shadow mb-4">
<div class="card-body">




<table class="table table-bordered table-striped mb-0">

    <thead>
        <tr>
            <th>No</th>
            <th>Class</th>
            <th>Class Room</th>
            <th>Faculty</th>
            <th>Subject</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $select = mysqli_query($db, "SELECT * FROM subjects WHERE class_id = '$user_class' ");
        if(mysqli_num_rows($select)){

            $count = 0;
            while($row = mysqli_fetch_assoc($select)){


                $subject = $row['subject'];
                $class_id = $row['class_id'];
                $get_class = mysqli_query($db, "SELECT * FROM class WHERE id = '$class_id' ");
                if(mysqli_num_rows($get_class)){
                    $asd = mysqli_fetch_assoc($get_class);
                    $class_name = $asd['class'];
                    $class_room = $asd['class_name'];
                }else{
                    $class_name = "--";
                    $class_room = "--";
                }
                $faculty_id = $row['faculty_id'];
                $get_faculty = mysqli_query($db, "SELECT * FROM users WHERE id = '$faculty_id' ");
                if(mysqli_num_rows($get_faculty)){
                    $asd_asd = mysqli_fetch_assoc($get_faculty);
                    $faculty_name = $asd_asd['name'];
                }else{
                    $faculty_name = "--";
                }
                $count++;

                ?>


                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $class_name; ?></td>
                    <td><?php echo $class_room; ?></td>
                    <td><?php echo $faculty_name; ?></td>
                    <td><?php echo $subject; ?></td>
                </tr>


                <?php

            }

        }
        
        ?>
    </tbody>

</table>



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