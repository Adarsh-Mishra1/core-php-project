<?php 
     session_start();
     if( $_SESSION['user_id']=='' && $_SESSION['user_type']!=='user' ){
          Echo "Go to login page and login again";
          header('location:../login.php');
     }else{     
     include('database_connect.php');
     include('./navigation.php');
     user_navigation('expenses');     
     }    
?>
<div class="container pt-5">
     <table class="table table-bordered table-striped table-hover ">
        <thead>
          <tr>
            <th scope="col">S.NO</th>                       
            <th scope="col">Date</th>                                   
            <th scope="col">Category</th>
            <th scope="col">Amount</th>
            <th scope="col">Description </th>            
            <th scope="col">Payment Mode </th>            
           
          </tr>
        </thead>
        <tbody>
            <?php
              $total_amount=0;
              $total_income=0;
              
               $sql= 'SELECT * FROM `transaction`  WHERE user_id='.$_SESSION['user_id'].' order by `date` ';
               $query='SELECT * FROM `category`';
               $query2='SELECT income_amount FROM income WHERE user_id='.$_SESSION['user_id'].'';
               

               $income_sum=execute_query($query2);
               foreach($income_sum as $res){
                $total_income=$total_income + $res['income_amount'];
               }
               
               $output=execute_query($query);
               $result=execute_query($sql); 
               $num_transaction=mysqli_num_rows($output);
               $i=1;
              if($num_transaction>0){ 
                while($row=mysqli_fetch_assoc($result)){                   
                echo '                                  
            <tr>
            <th scope="row">'.$row['sno'].'</th>           
            <td>'.$row['date'].'</td>
            <td>';

            foreach($output as $cat){
              if($cat['category_id']==$row['category']){
                echo $cat['category_name'];
              }
            }
            echo '
            </td>
            <td>'.$row['expense'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['payment_mode'].'</td>
            
         </tr>
           
            ';
          
          $total_amount =$total_amount +$row['expense'];
          
                }
            }
           ?>  
          <tr>
            <td></td>
            <td></td>
            <td><b>Total Amount<b></td>
            <td><b><?php echo $total_amount; ?></b></td>
            <td></td>
            <td></td>
            
          </tr>                   
        </tbody>
      </table>
      <div class="row">
        <col-sm-4>Total Income: <?php echo $total_income; ?></col-sm-4>
        <col-sm-4> Amount Left: <?php echo $total_income-$total_amount; ?></col-sm-4>
      </div>
  </div> 
</section>           
</body>
</html>