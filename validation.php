<?php 


if(!isset($user_id)){
    header("Location: out.php");
}


$profile = mysqli_query($db, "SELECT * FROM users WHERE id = '$user_id' ");
$data = mysqli_fetch_assoc($profile);
if(mysqli_num_rows($profile) == 0){
    header("out.php");
}else{

    $user_name     = $data['name'];
    $user_email    = $data['email'];
    $user_password = $data['password'];
    $user_cnic     = $data['cnic'];
    $user_number   = $data['number'];
    $user_address  = $data['address'];
    $user_role     = $data['role'];
    $user_class     = $data['class'];

}


?>