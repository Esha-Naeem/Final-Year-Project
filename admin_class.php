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
<h1 class="h3 mb-0 text-gray-800">Manage Classes</h1>
</div>

<div class="row">
<div class="col-md-12">
<div class="card shadow mb-4">
<div class="card-body">


<?php 

if(isset($_GET['edit'])){

    $get_id = $_GET['edit'];
    $get_data = mysqli_query($db, "SELECT * FROM class WHERE id = '$get_id' ");
    if(mysqli_num_rows($get_data)){

        $fetch = mysqli_fetch_assoc($get_data);
        $get_class = $fetch['class'];
        $get_class_name = $fetch['class_name'];

    }

}

?>
<form action="" method="post">
    <div class="form-group">
        <input type="text" name="class" value="<?php if(isset($get_id)){ echo $get_class; } ?>" id="class" class="form-control" required placeholder="Enter class">
    </div>
    <div class="form-group">
        <input type="text" name="class_name" value="<?php if(isset($get_id)){ echo $get_class_name; } ?>" id="class_name" class="form-control" required placeholder="Enter Class Name">
    </div>
    <?php if(isset($get_id)){ ?>
        <input type="submit" class="btn btn-danger" name="update_btn" value="Click to Update">
        <a href="admin_class.php" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Cancel</a>
    <?php }else{ ?>
        <input type="submit" class="btn btn-primary" name="add_btn" value="Click to Add">
    <?php } ?>
</form>
<?php 

if(isset($_POST['add_btn'])){

    $class = $_POST['class'];
    $class_name = $_POST['class_name'];

    $check = mysqli_query($db, "SELECT * FROM class WHERE class = '$class' ");
    if(mysqli_num_rows($check) == 0){

        $insert = mysqli_query($db, "INSERT INTO class(class, class_name) VALUES('$class','$class_name') ");
        if($insert){
            echo "<p class='alert mb-0 alert-success mt-3'>Class has been Added.</p>";
        }

    }else{
        echo "<p class='alert mb-0 alert-warning mt-3'>Class already Added..</p>";
    }

}

if(isset($_POST['update_btn'])){

    $class = $_POST['class'];
    $class_name = $_POST['class_name'];

    $check = mysqli_query($db, "SELECT * FROM class WHERE class = '$class' AND id != '$get_id' ");
    if(mysqli_num_rows($check) == 0){

        $update = mysqli_query($db, "UPDATE class SET class = '$class', class_name = '$class_name' WHERE id = '$get_id' ");
        if($update){
            echo "<p class='alert mb-0 alert-success mt-3'>Class Info has been Updated.</p>";
        }

    }else{
        echo "<p class='alert mb-0 alert-warning mt-3'>Class already Added..</p>";
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
            <th>class</th>
            <th>Class Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $select = mysqli_query($db, "SELECT * FROM class");
        if(mysqli_num_rows($select)){

            $count = 0;
            while($row = mysqli_fetch_assoc($select)){


                $class = $row['class'];
                $class_name = $row['class_name'];
                $count++;

                ?>


                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $class; ?></td>
                    <td><?php echo $class_name; ?></td>
                    <td>

                    <a href="admin_class.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="admin_class.php?remove=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

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
    $del = mysqli_query($db, "DELETE FROM class WHERE id = '$remove_id' ");
    if($del){   
        header("Location: admin_class.php");
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