<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="backend.php">
<div class="sidebar-brand-icon rotate-n-15">
<i class="fas fa-laugh-wink"></i>
</div>
<div class="sidebar-brand-text mx-3">Faculty Panel</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
<a class="nav-link" href="backend.php">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Other Tabs
</div>

<?php 

if($user_class == 'Section Head'){
?>


<li class="nav-item">
<a class="nav-link" href="faculty_timetable_generate.php">
<i class="fas fa-fw fa-chart-area"></i>
<span>Generate Timetable</span></a>
</li>


<?php
}

?>


<li class="nav-item">
<a class="nav-link" href="view_timetable_fac.php">
<i class="fas fa-fw fa-chart-area"></i>
<span>View Timetable</span></a>
</li>



</ul>
<!-- End of Sidebar -->