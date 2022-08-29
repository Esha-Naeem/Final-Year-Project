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
                                        <h1 class="h4 text-gray-900 mb-4">REGISTER | FACULTY</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <select name="class_id" id="class_id" class="form-control" required>
                                                <option value disabled selected>Choose Role</option>
                                                <option>Section Head</option>
                                                <option>Dean</option>
                                                <option>Head of Department</option>
                                                <option>Class in Charge</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" name="cnic" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter CNIC">
                                        </div>
                                        <div class="form-group">
                                        <input type="number" name="number" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter PH.Number">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" name="address" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                        <input type="password" name="cpassword" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Password">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Register" name="register_btn">
                                       
                                    </form>

                                    <?php 
                                    
                                    if(isset($_POST['register_btn'])){

                                        
                                        $role      = "faculty";
                                        $name      = $_POST['name'];
                                        $email     = $_POST['email'];
                                        $cnic     = $_POST['cnic'];
                                        $password  = $_POST['password'];
                                        $cpassword = $_POST['cpassword'];
                                        $number = $_POST['number'];
                                        $address = $_POST['address'];
                                        $class_id = $_POST['class_id'];

                                        if($password === $cpassword){

                                            
                                            $check_email = mysqli_query($db, "SELECT * FROM users WHERE email = '$email' ");
                                            if(mysqli_num_rows($check_email) != 0){
                                                echo "<p class='alert alert-warning mt-3'>Email already Exist.</p>";
                                            }else{

                                                $insert = mysqli_query($db, "INSERT INTO users(name, email, password, role, cnic, number, address, class) VALUES('$name', '$email', '$password', '$role', '$cnic', '$number', '$address', '$class_id') ");
                                                if($insert){
                                                    echo "<p class='alert alert-warning mt-3'>Your Account has been Registered. Please wait for Admin Approval.</p>";
                                                }else{
                                                    echo $db->error;
                                                }

                                            }


                                        }else{
                                            echo "<p class='alert alert-warning mt-3'>Password and Confirm Password are not Matched.</p>";
                                        }

                                        

                                    }

                                    
                                    ?>


                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Login Page!</a>
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