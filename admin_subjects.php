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
<h1 class="h3 mb-0 text-gray-800">Manage Subjects</h1>
</div>

<div class="row">
<div class="col-md-12">
<div class="card shadow mb-4">
<div class="card-body">



<form action="" method="post">
    <div class="form-group">
        <select name="class_id" id="class_id" class="form-control" required>
            <option value disabled selected>Choose Class</option>
            <?php 
            
            $select = mysqli_query($db, "SELECT * FROM class");
            if(mysqli_num_rows($select)){

                while($row = mysqli_fetch_assoc($select)){

                    ?>


                    <option value="<?php echo $row['id'] ?>"><?php echo $row['class'] ?></option>

                    <?php

                }

            }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <select name="faculty_id" id="faculty_id" class="form-control" required>
            <option value disabled selected>Choose Faculty</option>
            <?php 
            
            $select_fac = mysqli_query($db, "SELECT * FROM users WHERE role = 'faculty' ");
            if(mysqli_num_rows($select_fac)){

                while($row_fac = mysqli_fetch_assoc($select_fac)){

                    ?>


                    <option value="<?php echo $row_fac['id'] ?>"><?php echo $row_fac['name'] ?></option>

                    <?php

                }

            }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="subject" class="form-control" required placeholder="Enter Subject Name">
    </div>
    <input type="submit" class="btn btn-primary" name="add_btn" value="Click to Add">
</form>
<?php 

if(isset($_POST['add_btn'])){

    $class_id   = $_POST['class_id'];
    $faculty_id = $_POST['faculty_id'];
    $subject    = $_POST['subject'];

    $check = mysqli_query($db, "SELECT * FROM subjects WHERE faculty_id = '$faculty_id' AND subject = '$subject' ");
    if(mysqli_num_rows($check) == 0){

        $insert = mysqli_query($db, "INSERT INTO subjects(class_id, faculty_id, subject) VALUES('$class_id', '$faculty_id', '$subject') ");
        if($insert){
            echo "<p class='alert mb-0 alert-success mt-3'>Subject has been Added.</p>";
        }

    }else{
        echo "<p class='alert mb-0 alert-warning mt-3'>Subject already Added..</p>";
    }

}

?>









</div>
</div>




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
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $select = mysqli_query($db, "SELECT * FROM subjects");
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
                    <td>
                    <a href="admin_subjects.php?remove=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

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
        header("Location: admin_subjects.php");
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