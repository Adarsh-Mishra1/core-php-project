<?php
    include('database_connect.php');
    global $msg;
    if(isset($_POST['submit'])){
        // checking here input validation
        $password=hash('md5',$_POST['password']);
        $email=hash('md5',$_POST['username']);
        $sql="SELECT * FROM `registration` WHERE `email`='".$email."' AND `password`='".$password."' AND `regstatus`='1' ";
        //echo $sql;
        $result=execute_query($sql);
        $row=mysqli_fetch_array($result); 
        //print_r($row);
        // data found
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0){            
                // user type 0 for user
                session_start();
                $_SESSION["user_id"]= $row['regno'];
                $_SESSION["user_type"]='user';
                header("location:home.php");   
                exit();
        }else{
            echo ' <script>alert("wrong details entered");</script>';
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- validation -->
        <script src="./js/lib/jquery.js"></script>
	    <script src="./js/dist/jquery.validate.js"></script>
        <script src="./js/validation.js"></script>
        <style>
            .error{
                color:#e03434;
            }
        </style>
    </head>

    <body>        
        <div class="container-fluid " >
            <div class="" style="margin-top:5%">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Login</h3>
                        </div>
                        <div class="p-4">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="login_form">
                                <!-- <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div> -->
                                <div class="input-group mb-3 form-group">                                   
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="text" class="form-control" placeholder="Email / Username" name="username"><br>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" placeholder="password"
                                    name="password"
                                    >
                                </div>
                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-primary" type="submit" name="submit"
                                    ><span></span> Sign In</button>
                                </div>                               
                                <p class="text-center mt-3">Forget Password
                                    <span class="text-primary"><a href="">Click Here</a></span>
                                </p>
                                <p class="text-center mt-3">Not have an account?
                                    <span class="text-primary"><a href="registration.php">Create New</a></span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
