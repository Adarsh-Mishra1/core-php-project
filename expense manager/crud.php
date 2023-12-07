<?php
    include('database_connect.php');
    function redirect($url, $statusCode = 303)
    {
       header('Location: ' . $url, true, $statusCode);  
        die();
    }
    
     
    if(isset($_POST['delete_expense'])){
        $del_id=$_POST['sno'];
        $sql="DELETE FROM `transaction` WHERE `sno`='".$del_id."'";
        
        $delete=execute_query($sql);
        if(!$delete){
          echo "Deletion failed";
        }else{
          // echo  '<meta http-equiv="refresh" content="0"> ';
          redirect('expense.php');
          
        }
    }
	  
	if(isset($_POST['add_category'])&&$_POST['category_name']!==''){
		$sql="INSERT INTO `category`(`category_name`) VALUES ('".$_POST['category_name']."') ";
		$output=execute_query($sql);
        if(!$output){
          echo "insertion failed";
        }else{
          redirect('home.php');
        }
    }
	  
	  // Add income
    if(isset($_POST['add_income'])&&$_POST['income_amount']!==''){			
        $sql="INSERT INTO `income` (`user_id`,`income_type`, `date`, `description`, `income_amount`) VALUES ('".$_POST['user_id']."','".$_POST['income_type']."','".$_POST['income_date']."','".$_POST['income_description']."','".$_POST['income_amount']."')";       		
		    $output=execute_query($sql);
          if(!$output){
            echo "insertion failed";

          }else{
            redirect('home.php');
          }
    }  
	  
      
    if(isset($_POST['save_expense'])&&$_POST['expense_price']!==''){		
        
        $sql="INSERT INTO `transaction` ( `user_id`, `date`, `expense`, `category`, `description`,`payment_mode`) VALUES ('".$_POST['user_id']."', '".$_POST['expense_date']."','".$_POST['expense_price']."', '".$_POST['expense_category']."', '".$_POST['expense_description']."','".$_POST['payment_mode']."')";
         //echo $sql;
        // die();
        $output=execute_query($sql);
        if(!$output){
          echo "insertion failed";
        }else{
          
          redirect('expense.php');
        }
    }

    if(isset($_POST['update_expense'])&&$_POST['user_id']!==''){	
        $sql="UPDATE `transaction` SET `user_id`='".$_POST['user_id']."',`description`='".$_POST['expense_description']."', `date`='".$_POST['expense_date']."',  `expense`='".$_POST['expense_price']."', `category`='".$_POST['expense_category']."',`payment_mode`='".$_POST['payment_mode']."' WHERE  `sno`='".$_POST['sno']."'";
         //echo $sql;
        // die();
        $result=execute_query($sql);
        if(!$result){
          echo "Update Failed";
        }else{
          redirect('expense.php');
        }
    }	

  // For user registration form
      if(isset($_POST['register'])){
        $curr_date=date("Y-m-d");
        $email=hash('md5',$_POST['email']);
        $sql="SELECT * FROM `registration` WHERE `email`='".$email."'";
        if(mysqli_num_rows(execute_query($sql))>0){
          echo "This Email is Already Exist.";
          echo "<h3><a href='registration.php'>Click to Register Again</a></h3>";
          echo "<br><h3> <a href='index.php'>Click to Login</a></h3>";
        }else{
          $password=hash('md5',$_POST['password']);
          $email=hash('md5',$_POST['email']);
          $sql="INSERT INTO `registration`(firstname,lastname,email,password,mobileno1,mobileno2,registerdate,remarks,regstatus) VALUES('".$_POST['f_name']."','".$_POST['l_name']."', '".$email."','".$password."', '".$_POST['mob1']."','".$_POST['mob2']."','".$curr_date."',' ','1')";     
          $result=execute_query($sql);
          //echo $sql;
          $inserted_id=mysqli_insert_id($db);
          
          
          //Code for mulitple table registartion and randow password generation        
          /*
          if(!$result){
            echo "<h3>registration Failed<h3>";
          }else{        
            $key=rand(1111,9999);
            // Random Password Generator
            $name=$_POST['f_name'];
            $email=$_POST['email'];
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password=$_POST['password'];
            //$password = substr( str_shuffle( $chars ), 0, 8 );
            $sql="INSERT INTO `usermst`(`regno`, `username`, `mobileno`, `password`, `usertype`, `secretcode`, `lastlogin`, `regdate`, `ustatus`) VALUES ('".$inserted_id."','".$_POST['email']."','".$_POST['mob1']."','".$password."','1','".$key."','".date("Y-m-d")."','".date("Y-m-d")."','1')";
            
            $result=execute_query($sql);
            $id= base64_encode($inserted_id);        
            // mysql_query("insert into users values('','$name','$email','$password')");
          }
          */
          if($result){ 
          ?>
            <!DOCTYPE html>
              <html lang="en">
              <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
                  <title>Status</title>
              </head>
              <body>
              <div class="container-fluid " >
                <div class="" style="margin-top:5%">
                    <div class="rounded d-flex justify-content-center">
                        <div class="col-md-4 col-sm-12 shadow-lg pt-5 bg-light">
                            <div class="text-center">
                                <h3 class="text-primary">Hi <?php echo $_POST['f_name'].'&nbsp'.$_POST['l_name']; ?> Thank You for Registration</h3>
                            </div>
                            <div class="p-4">
                                <div class="alert alert-success">
                                  Registration Complete                             
                                </div>
                                <button onclick="closeWsin()"><a href="index.php">Click to go Login page</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            <?php   
          }else{
            echo "Registration Failed";
          }     
        } 
      }
    
  ?>
  </body>
</html>  