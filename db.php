<?php 


session_start();
ob_start();

$host_name = "localhost";
$user_name = "root";
$pass_word = "";
$data_base = "ttms_sql";

$db = mysqli_connect($host_name, $user_name, $pass_word, $data_base);


if(isset($_SESSION['id']) AND isset($_SESSION['role'])){
    $user_id = $_SESSION['id'];
    $sesssion_role = $_SESSION['role'];
}



?>