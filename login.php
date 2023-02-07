<?php
    include('database_connect.php');
    global $msg;
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Registration Form </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                            <form action="login.php" method="POST">
                                <!-- <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div> -->
                                <div class="input-group mb-3 form-group">                                   
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="text" class="form-control" placeholder="Email / Username" name="username">
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

<?php
    session_start();
    if(isset($_POST['submit'])){
        // checking here input validation
        $sql="SELECT * FROM `usermst` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['password']."' AND `ustatus`='1' ";
        echo $sql;
        $result=execute_query($sql);
        $row=mysqli_fetch_array($result);        
        // data found
        $num_rows=mysqli_num_rows($result);
        if($num_rows==1){
            if($row['usertype']==2){
                // user type 1 is for admin
                header('location:new_admin.php');
                $_SESSION["user_id"]=$row['regno'];
                $_SESSION["user_type"]='admin';
                header('location:new_admin.php');
            }else{
                // user type 0 for user
                $_SESSION["user_id"]= $row['regno'];
                $_SESSION["user_type"]='user';
                header('location:user_panel/home.php');
            }
        }else{
            Echo ' <script>alert("wrong details entered");</script>';
        }
    }    

?>