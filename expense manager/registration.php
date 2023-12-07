<?php
include('database_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Registration </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- validate -->
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
                    <div class="col-md-5 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">REGISTER</h3>
                        </div>
                        <div class="p-4">
                            <form action="crud.php"  method="POST" id="register" >
                                <input type="hidden" autocomplete="FALSE">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="f_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="l_name" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="text" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-phone"></i></span>
                                    <input type="number" name="mob1" class="form-control" placeholder="Mobile Number">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-phone-fill"></i></span>
                                    <input type="number" name="mob2" class="form-control" placeholder=" Alternate Mobile Number">
                                </div>
                                <!-- <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" placeholder="password">
                                </div> -->
                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-primary" type="submit"  name="register"><span></span> Sign up</button>
                                </div>                               
                                <p class="text-center mt-3">Already have an account?
                                    <span class="text-primary"><a href="index.php">Sign in</a></span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>