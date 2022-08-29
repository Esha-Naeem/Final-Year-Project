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
<h1 class="h3 mb-0 text-gray-800">Approve Timetable Generation Requests</h1>
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
            <th>Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $select = mysqli_query($db, "SELECT * FROM subjects WHERE status = 1");
        if(mysqli_num_rows($select)){

            $count = 0;
            while($row = mysqli_fetch_assoc($select)){


                $times = $row['times'];
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
                    <td><?php echo $times; ?></td>
                    <td>
                    <a href="admin_timetable_requests.php?approve=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>
                    <a href="admin_timetable_requests.php?remove=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                </tr>


                <?php

            }

        }
        
        ?>
    </tbody>

</table>
<?php 

if(isset($_GET['remove'])){

    $remove_id = $_GET['remove'];
    $del = mysqli_query($db, "DELETE FROM subjects WHERE id = '$remove_id' ");
    if($del){   
        header("Location: admin_timetable_requests.php");
    }else{
        echo $db->error;
    }

}

if(isset($_GET['approve'])){

    $approve_id = $_GET['approve'];
    $upd = mysqli_query($db, "UPDATE subjects SET status = 2 WHERE id = '$approve_id' ");
    if($upd){   
        header("Location: admin_timetable_requests.php");
    }else{
        echo $db->error;
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