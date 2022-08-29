<?php include_once("header.php"); ?>
<?php include_once("validation.php"); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<body id="page-top">
<div id="wrapper">
<?php 


if($sesssion_role == 'user'){
    include_once("nav_user.php");
}




?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once("top_bar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">View Timetable</h1>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    

                                    <table class="table schedule table-hover table-striped mb-0" id="table_id">
                                    <thead class="bg-primary text-light">
                                    <tr>
                                    <th>No</th>
                                    <th>Class</th>
                                    <th>Class Room</th>
                                    <th>Faculty</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $select = mysqli_query($db, "SELECT * FROM subjects WHERE status = 2 AND class_id = '$user_class' ");
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
                                    </tr>


                                    <?php

                                    }

                                    }

                                    ?>
                                    </tbody>
                                    <tfoot class="bg-primary text-light">
                                    <tr>
                                    <th>No</th>
                                    <th>Class</th>
                                    <th>Class Room</th>
                                    <th>Faculty</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    </tr>
                                    </tfoot>
                                    </table>
                                    <br />
    <input type="button" id="btnExport" value="Download in .PDF" onclick="Export()" class="btn btn-primary"/>

                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
                    </div>

                    <!-- Content Row -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <?php include_once('footer_backend.php'); ?>
            <!-- End of Main Content -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementsByClassName('schedule'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }
    </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            initComplete: function(){
                this.api().columns().every(function (){

                    var column = this;
                    var select = $('<select class="form-control"><option value="">Filter</option></select>')
                    .appendTo($(column.footer()).empty() )
                    .on('change', function(){
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search(val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });

                    column.data().unique().sort().each(function(d, j){
                        select.append('<option value="'+d+'">'+d+'</option>')
                    });

                });
            }
        });
    } );
    </script>
    
