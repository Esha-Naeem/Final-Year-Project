<?php include_once("header.php"); ?>
<?php include_once("validation.php"); ?>
<body id="page-top">
<div id="wrapper">
<?php include_once("nav_faculty.php"); ?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once("top_bar.php"); ?>


<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Generate Timetable</h1>
</div>

<div class="row">
<div class="col-md-12">
<div class="card shadow mb-4">
<div class="card-body">



<form action="" method="post">
    <div class="form-group">
        <select name="subject_id" id="subject_id" class="form-control" required>
            <option value disabled selected>Choose Subject</option>
            <?php 
            
            $select = mysqli_query($db, "SELECT * FROM subjects");
            if(mysqli_num_rows($select)){

                while($row = mysqli_fetch_assoc($select)){

                    ?>


                    <option value="<?php echo $row['id'] ?>"><?php echo $row['subject'] ?></option>


                    <?php

                }

            }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="time" name="time" class="form-control" required title="Choose Time">
    </div>
    <input type="submit" class="btn btn-primary" name="add_btn" value="Click to Generate">
</form>
<?php 

if(isset($_POST['add_btn'])){

    $subject_id = $_POST['subject_id'];
    $time       = $_POST['time'];


    $check = mysqli_query($db, "SELECT * FROM subjects WHERE times = '$time' OR subject_id = '$subject_id' ");
    if(mysqli_num_rows($check) == 0){

        $insert = mysqli_query($db, "UPDATE subjects SET times = '$time', status = 1 WHERE id = '$subject_id' ");
        if($insert){
            echo "<p class='alert mb-0 alert-success mt-3'>Timetable has been Generated.</p>";
        }

    }else{
        echo "<p class='alert mb-0 alert-warning mt-3'>Same Record cannot be Generated..</p>";
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