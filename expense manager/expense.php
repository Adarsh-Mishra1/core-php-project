<?php
     
     session_start();
     if( $_SESSION['user_id']=='' && $_SESSION['user_type']!=='user' ){
          Echo "Go to login page and login again";
          header('location:../login.php');
     }else{     
     include('database_connect.php');
     include('./navigation.php');
     user_navigation('expenses');     

?>

<?php
     }
?>
<script>
  alert(expense_description);
</script>
<section>
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <a class="btn btn-block btn-sm btn-warning" data-toggle="modal" data-target="#add_service">
              <i class="fa fa-plus-square" style="font-size: 40px;" id="icone_grande"></i> <br><br>
              <span class="texto_grande"><i class="fa fa-plus"></i> ADD Expense</span></a>
        </div>        
          
        
      </div>         
    </div>      
  <!-- Modal insert -->
  <div class="modal fade" id="add_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  enctype="multipart/form-data" method="POST" action="crud.php" id="add_expense_form">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <div class="form-group">
                <label for="Brand name">Price</label>
                <Input type="text" name="expense_price" class="form-control" placeholder="Enter Price" require>                
            </div>
           
            <div class="form-group">
                <label for="customer code">Category</label>
            <select class="form-control" name="expense_category" id="category">
              <option value="">select</option>
            <?php
            $sql="SELECT * FROM `category`";
            $output=execute_query($sql);
            //print_r($output);
            //die();
            foreach($output as $row){
            ?>				
              <option value="<?php echo $row['category_id']; ?>"> <?php echo $row['category_name']; ?> </option>
            <?php } ?>
            </select>	
            
            </div>
            <div class="form-group">
                <label for="date">Date</label>
				<input type="date" class="form-control" name="expense_date" placeholder="Date"
				value="<?php echo date("Y-m-d"); ?>"
				>
			</div>
			
			
			<div class="form-group">
                <label for="customer code">Description(optional)</label>
				<input type="text" class="form-control" name="expense_description" placeholder="Enter Unit Description">
			</div>
			<div class="form-group">
                <label for="customer code">Mode Of Payment</label>
				<select class="form-control" name="payment_mode" >
					<option value="">Select </option>
					<option value="Cash"> Cash </option>
					<option value="Online" > Online </option>
					
				</select>	
				
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-primary" name="save_expense" form="add_expense_form" value="add unit" id="add unit">Save </button>         
        </div>        
      </div>
    </div>
  </div>

  <!-- Modal for update -->
  <div class="modal fade" id="update_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form  enctype="multipart/form-data" method="POST" action="crud.php" id="update_expense">
          <input type="hidden" name="sno" id="sno">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" >
            <div class="form-group">
                <label for="Brand name">Price</label>
                <Input type="text" id="price" name="expense_price" class="form-control" placeholder="Enter Price" require>                
            </div>
              
            <div class="form-group">
              <label for="customer code">Category</label>
              <select class="form-control" id="exp_cat"  name="expense_category">
                <option value="">select</option>
              <?php
              $sql="SELECT * FROM `category`";
              $output=execute_query($sql);
              //print_r($output);
              //die();
              foreach($output as $row){              				
                //if($row['category_id']=='<script>x</script>' ){ ?>
                <!-- <option value="<?php //echo $row['category_id']; ?>" selected> <?php //echo // $row['category_name']; ?> </option> -->
              <?php //}else{
                ?>
                  <option value="<?php echo $row['category_id']; ?>" > <?php echo 
                  $row['category_name']; ?> </option>
              <?php
                //}
              }  
              ?>
              </select>	           
            </div>
            <div class="form-group">
              <label for="customer code">Date</label>
                <input type="date" id="date" class="form-control" name="expense_date" placeholder="Enter Unit Description"
                value="<?php echo date("Y-m-d"); ?>"
                >
            </div>
                
              
              <div class="form-group">
                <label for="customer code">Description(optional)</label>
                <input type="text" id="description" class="form-control" name="expense_description" placeholder="Enter Unit Description">
              </div>
              <div class="form-group">
                <label for="customer code">Mode Of Payment</label>
                <select id="payment_mode" class="form-control" name="payment_mode">
                  <option value="">Select </option>
                  <option value="Cash"> Cash </option>
                  <option value="Online" > Online </option>                  
                </select>	
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-primary" name="update_expense" form="update_expense"  id="update" value="update_expense">Update </button>         
        </div>        
      </div>
    </div>
  </div>
  
  <!-- Delete Modal HTML -->
	<div id="deleteBrandModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="delete_form" method="post" action="crud.php">						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
          <input type="hidden"  class="form-control" id="del_sno" name="sno">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button id="delete_form" type="submit" class="btn btn-danger" name="delete_expense" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
  <div class="container pt-5">
     <!-- Table starts here -->
     <table class="table table-bordered table-striped table-hover ">
        <thead>
          <tr>
            <th scope="col">S.NO</th>                       
            <th scope="col">Date</th>                                   
            <th scope="col">Category</th>
            <th scope="col">Amount</th>
            <th scope="col">Description </th>            
            <th scope="col">Payment Mode </th>            
            <th scope="col" style="text-align: center;" colspan="2">Action</th>            
          </tr>
        </thead>
        <tbody>
            <?php
              $total_amount=0;
              $total_income=0;
              $sql="SELECT * FROM `category` ";
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
            <td>
                <button type="button" class="btn btn-default btn-primary">
                <a href="javascript:;" style="color:white;" class="edit_btn" data-toggle="modal" data-target="#update_service" data-sno='.$row['sno'].' data-user_id='.$row['user_id'].' data-amount='.$row['expense'].' data-mode_of_payment='.$row['payment_mode'].' data-description='.$row['description'].' data-category='.$row['category'].' data-date='.$row['date'].'>
                 EDIT</a>
                </button>
            </td>    
            <td>
                <button type="button" class="btn btn-default btn-danger" >
                <a href="javascript:;" style="color:white;" class="delete_btn" data-toggle="modal" data-target="#deleteBrandModal" data-sno='.$row['sno'].' >DELETE</a>
                </button>
            </td>    
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
            <td></td>
          </tr>                   
        </tbody>
      </table>
      <div class="row">
        <col-sm-4>Total Income: <?php echo $total_income; ?></col-sm-4>&nbsp; <br>
      </div>
      <div class="row">      
        <col-sm-4> Amount Left: <?php echo $total_income-$total_amount; ?></col-sm-4>
      </div>
  </div> 
</section>           
</body>
</html>
<script>
  $('.edit_btn').click(function(){
    // Getting data give inside anchor tag in edit

    var user_id=$(this).data('user_id');
    var sno=$(this).data('sno');
    var expense_amount = $(this).data('amount');
    var expense_category=$(this).data('category'); 
    var expense_date=$(this).data('date'); 
    var expense_description=$(this).data('description'); 
    var expense_payment_mode=$(this).data('mode_of_payment'); 
    //alert(expense_description);
    // Here putting data inside edit form modal by using id of input tags    
    $('#sno').val(sno);
    $('#user_id').val(user_id);
    $('#price').val(expense_amount);
    $('#category').val(expense_category);
    $('#description').val(expense_description);
    $('#date').val(expense_date);
    $('#payment_mode').val(expense_payment_mode);
    $('#exp_cat').val(expense_category); // also selects "Two
     // also selects "Two
  });

    $('.delete_btn').click(function(){
      var sno= $(this).data('sno');
      $('#del_sno').val(sno); 
      
    });
  </script>
  