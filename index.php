<?php include_once("header.php"); ?>
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">

                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">TTMS | LOGIN</h1>
                                </div>
                                <form class="user" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <input type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" value="Login">

                                </form>

                                <?php 
                                
                                if(isset($_POST['login_btn'])){

                                    $email    = $_POST['email'];
                                    $password = $_POST['password'];

                                    $check = mysqli_query($db, "SELECT * FROM users WHERE email = '$email' AND password = '$password' ");
                                    $data = mysqli_fetch_assoc($check);
                                    if(mysqli_num_rows($check) == 0){
                                        echo "<p class='alert alert-danger mt-3'>Invalid Email or Password</p>";
                                    }elseif(mysqli_num_rows($check) == 1 AND $data['status'] == 1){
                                        $_SESSION['id'] = $data['id'];
                                        $_SESSION['role'] = $data['role'];
                                        header("Location: backend.php");
                                    }else{
                                        echo "<p class='alert alert-warning mt-3'>Please wait for Admin Approval.</p>";
                                    }



                                }
                                
                                ?>


                                <hr>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account <b>[STUDENT]</b></a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register_faculty.php">Create an Account <b>[FACULTY]</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include_once("footer.php"); ?>