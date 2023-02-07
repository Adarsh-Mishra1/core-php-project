<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
  <?php 
      include('database_connect.php');
      include('admin-menu/navigation.php');    
  ?>
  <?php
  // For user registration form
    if(isset($_POST['register'])){
        $curr_date=date("Y-m-d");
        $sql="INSERT INTO `registration`(firstname,lastname,email,mobileno1,mobileno2,registerdate) VALUES('".$_POST['f_name']."','".$_POST['l_name']."', '".$_POST['email']."', '".$_POST['mob1']."','".$_POST['mob2']."','".$curr_date."')";     
        $result=execute_query($sql);
        $inserted_id=mysqli_insert_id($db);
        // Generation random         
        if(!$result){
          echo "<h3>registration Failed<h3>";
        }else{        
          $key=rand(1111,9999);
          // Random Password Generator
          $name=$_POST['f_name'];
          $email=$_POST['email'];
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $password = substr( str_shuffle( $chars ), 0, 8 );
          $sql="INSERT INTO `usermst`(`regno`, `username`, `mobileno`, `password`, `usertype`, `secretcode`, `lastlogin`, `regdate`, `ustatus`) VALUES ('".$inserted_id."','".$_POST['email']."','".$_POST['mob1']."','".$password."','1','".$key."','".date("Y-m-d")."','".date("Y-m-d")."','1')";
        //  echo $sql;
          $result=execute_query($sql);
          $id= base64_encode($inserted_id);        
          // mysql_query("insert into users values('','$name','$email','$password')");
          $to_email = "$email";
          $subject = "For login in JPRO App";
          $body = "Hi,nn This is your password to login $password Click on this link https://localhost/code_php/validation.php?user=$id to login and create password";
          $headers = "From: Jpro App";        
        if (mail($to_email, $subject, $body, $headers)) {
        ?>
          <div class="container-fluid " >
            <div class="" style="margin-top:5%">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg pt-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Hi <?php echo $name ?>Thank You for Registration</h3>
                        </div>
                        <div class="p-4">
                            <div class="alert alert-success">
                                Please check you mail(<?php echo $to_email; ?>) for login, click on given link in your mail to login.
                            </div>
                            <button onclick="closeWsin()"><a href="login.php">Click to go Login page</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <?php            
        }
        else{
          echo "Email sending failed...";
        }               
      }
    }
    

    // Add brand query
      if(isset($_POST['save_brand'])){
      $sql="INSERT INTO `brandmaster`(`brandname`, `brand description`, `brandstatus`) VALUES ('".$_POST['brand_name']."','".$_POST['brand_desc']."','1')";
      $result=execute_query($sql);
      echo $sql;
      if(!$result){
        echo "Insertion Failed";
      } else{
        header('location:addbrand.php');
      }
      }
    
      //Edit brand
      if(isset($_POST['edit_brand'])){

        $sql="UPDATE `brandmaster` SET `brandname`='".$_POST['brand_name']."',`brand description`='".$_POST['brand_desc']."',`brandstatus`='1' WHERE brandid='".$_POST['brand_id']."'";
        $result=execute_query($sql);
        echo $sql;
        if(!$result){
          echo "Updation Failed";
        }else{
          header('location:addbrand.php');
        }
    
      }


      if(isset($_POST['delete_brand'])){
        $del_id=$_POST['del_brand_id'];
        $sql="DELETE FROM `brandmaster` WHERE `brandid`='".$del_id."'";
        $delete=execute_query($sql);
        if(!$delete){
          echo "Deletion failed";
        }else{
          // echo  '<meta http-equiv="refresh" content="0"> ';
          header('location:addbrand.php');
        }
      }

      // Add Body Type 
      if(isset($_POST['body_type'])){
        $sql="INSERT INTO `bodytypemaster`( `bodytypename`, `bodytypedesc`, `bodytypestatus`) VALUES ('".$_POST['bodytype_name']."','".$_POST['body_type_description']."','1') ";
        $output=execute_query($sql);
        if(!$output){
          echo "insertion failed";
        }else{
          header('location:bodytypemaster.php');
        }
      }

      if(isset($_POST['edit_body_type'])){
        
        $id=$_POST['body_type_id'];
        $sql="UPDATE `bodytypemaster` SET `bodytypename`='".$_POST['body_type_name']."',`bodytypedesc`='".$_POST['body_type_description']."',`bodytypestatus`='1' WHERE `bodytypeid`='".$id."'";
        $result=execute_query($sql);
        if(!$result){
          echo "Updation Failed";
        }else{
          header('location:bodytypemaster.php');
        }
      }

      if(isset($_POST['delete_body'])){
        $del_id=$_POST['del_brand_id'];
        $sql="DELETE FROM `bodytypemaster` WHERE `bodytypeid`='".$del_id."'";
        echo $sql;
        $delete=execute_query($sql);
        if(!$delete){
          echo "Deletion failed";
        }else{
          // echo  '<meta http-equiv="refresh" content="0"> ';
          header('location:bodytypemaster.php');
        }
      }
	  
	   // Add Body Type 
      if(isset($_POST['add_income'])&&$_POST['income']!==''){
        $sql="INSERT INTO expense_manager`.`transaction` (`user_id`, `date`, `time`, `expense`, `income`, `total_expense`, `total_income`) VALUES('".$_POST['user_id']."','".$_POST['income']."','1')";
        I		
		$output=execute_query($sql);
        if(!$output){
          echo "insertion failed";
        }else{
          header('location:bodytypemaster.php');
        }
      }
  ?>
  </body>
</html>  