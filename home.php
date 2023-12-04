<?php
     session_start();
     if( $_SESSION['user_id']=='' && $_SESSION['user_type']!=='user' ){
          Echo "Go to login page and login again";
          //header('location:../login.php');
     }else{
    	// echo $_SESSION['user_id'];
		$user_id=$_SESSION['user_id'];
		// echo $_SESSION['user_type'];
		include('database_connect.php');
		include('navigation.php');
		user_navigation('Home');
     }
     
 
	// Getting Data Here	 
	$total_amount=0;
	$total_income=0;

	$query2='SELECT income_amount FROM income WHERE user_id='.$user_id.'';
	$query3='SELECT expense FROM `transaction`WHERE user_id='.$user_id.'';
	$income_sum=execute_query($query2);
	$expense_sum=execute_query($query3);
	foreach($income_sum as $res){
		$total_income=$total_income + $res['income_amount'];
	}
	foreach($expense_sum as $exp){
		$total_amount=$total_amount + $exp['expense'];
	}

?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
	<script>
		$(document).ready(function() {
			var ctx = $("#chart-line");
			var myLineChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: ["Expense", "Income"],
					datasets: [{
						data: [<?php echo $total_amount; ?>,<?php echo $total_income;  ?>],
						backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)"]
					}]
				},
				options: {
					title: {
						display: true,
						text: 'report'
					}
				}
			});
		});
	</script>
	
	
	<br>
	<div class="page-content page-container" id="page-content">
		<div class="padding">
			<div class="row">
				<div class="container-fluid d-flex justify-content-center">
					<div class="col-sm-8 col-md-6">
						<div class="card">
							<div class="card-header">Expense chart</div>
							<div class="card-body" style="height: 100%">
								<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
									<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
										<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
									</div>
									<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
										<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
									</div>
								</div> <canvas id="chart-line" width="400" height="250" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<section class="ftco-section" id="buttons">
			<div class="container">
				<!--<div class="row mb-4">
					<div class="col-md-12">
						<h2 class="heading-section"> </h2>
					</div>
				</div> -->
				

				<div class="row">
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-primary w-100 align-items-stretch d-flex" data-toggle="modal" data-target="#add_income">
							<div class="icon icon-left d-flex align-items-center justify-content-center">
								<i class="ion-ios-brush"></i>
							</div>
							<div class="text text-right py-2 pr-3">
								<h4>Income</h4>
								<span>Add Income</span>
								
							</div>
						</button>
					</div>
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-white w-100 align-items-stretch d-flex" onclick="window.open('expense.php','_blank');">
							<div class="icon icon-left icon-secondary d-flex align-items-center justify-content-center">
								<i class="ion-ios-chatboxes"></i>
							</div>
							<div class="text text-right py-2 pr-3">
								<h4>Expense</h4>
								<span>Add</span>
							</div>
						</button>
					</div>
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-tertiary w-100 align-items-stretch d-flex" data-toggle="modal" data-target="#add_category">
							<div class="icon icon-left d-flex align-items-center justify-content-center">
								<i class="ion-ios-pulse"></i>
							</div>
							<div class="text text-right py-2 pr-3">
								<h4>Category</h4>
								<span>create</span>
							</div>
						</button>
					</div>
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-quarternary w-100 align-items-stretch d-flex " onclick="window.open('report.php','_blank');">
							<div class="icon icon-left d-flex align-items-center justify-content-center">
								<i class="ion-ios-people"></i>
							</div>
							<div class="text text-right py-2 pr-3">
								<h4>Report</h4>
								<span>click here </span>
							</div>
						</button>
					</div>

					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-quarternary w-100 align-items-stretch d-flex">
							<div class="text text-left py-2 pl-3">
								<h4><?php echo $total_income; ?></h4>
								<span>Total Income</span>
							</div>
							<div class="icon icon-right d-flex align-items-center justify-content-center">
								<i class="ion-ios-briefcase"></i>
							</div>
						</button>
					</div>
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-primary w-100 align-items-stretch d-flex">
							<div class="text text-left py-2 pl-3">
								<h4><?php echo $total_amount; ?></h4>
								<span>Total Expense</span>
							</div>
							<div class="icon icon-right d-flex align-items-center justify-content-center">
								<i class="ion-ios-people"></i>
							</div>
						</button>
					</div>
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-secondary w-100 align-items-stretch d-flex">
							<div class="text text-left py-2 pl-3">
							<?php
							if($total_amount>0&&$total_income>0){
							$expense_percent=$total_amount/$total_income*100;
							}else{
								$expense_percent='';
							}
							?>	
								<h4><?php if($expense_percent>0){ echo number_format((float)$expense_percent, 2, '.', '');} ?>%</h4>
								<span>Expense Percent</span>
							</div>
							<div class="icon icon-right d-flex align-items-center justify-content-center">
								<i class="ion-ios-pulse"></i>
							</div>
						</button>
					</div>
					<div class="col-md-3 mb-3">
						<button type="button" class="btn btn-tertiary w-100 align-items-stretch d-flex">
							<div class="text text-left py-2 pl-3">
								<h4><?php echo $total_income-$total_amount; ?></h4>
								<span>Amount Left</span>
							</div>
							<div class="icon icon-right d-flex align-items-center justify-content-center">
								<i class="ion-ios-pricetag"></i>
							</div>
						</button>
					</div>
				</div>
			</div>
	  </section>

	  
	<!-- Add Income Modal -->
	<!-- Modal insert -->
  <div class="modal fade" id="add_income" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Income</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  enctype="multipart/form-data" method="POST" action="crud.php" id="add_income_form">
			
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="form-group">
                <label for="customer code">Amount</label>
				<input type="text" class="form-control" name="income_amount" placeholder="Enter Unit Description" required>
			</div>
			
			<div class="form-group">
                <label for="customer code">Income Type</label>
				<select class="form-control" name="income_type" required>
					<option value="">Select </option>
					<option value="1">Business </option>
					<option value="2">Salary</option>
					<option value="3">Loan </option>
				</select>	
			</div>	
			<div class="form-group">
                <label for="customer code">Date</label>
				<input type="date" class="form-control" name="income_date" placeholder="Enter Unit Description" value="<?php echo date('y-m-d'); ?>">
			</div>
			<div class="form-group">
                <label for="customer code">Description(optional)</label>
				<input type="text" class="form-control" name="income_description" placeholder="Enter Unit Description">
			</div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-primary" name="add_income" form="add_income_form" value="add income" id="add income">Save </button>         
        </div>        
      </div>
    </div>
  </div>
  
  
  <!-- Add Category Modal --->
  <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  enctype="multipart/form-data" method="POST" action="crud.php" id="add_category_form">
            <div class="form-group">
                <label for="Brand name">Category Name</label>
                <Input type="text" name="category_name" class="form-control" placeholder="Enter Unit Name" require>                
            </div>
                    
         </form>
        </div>
		<table class="table table-bordered table-striped table-hover ">
			<thead>
				<tr>
					<th></th>
					<th>Category</th>					
				</tr>
				<tr>
					<td></td>
					<?php 
					$query='SELECT * FROM `category`';
					$output=execute_query($query);
					foreach($output as $cat){				
						  echo
						  '<tr>
						 	<td></td> 
						  <td>';
						  echo $cat['category_name'];				
							echo 		
						  '</td><tr>'	;
						}
					?>
					
					
				</tr>
			</thead>
		</table>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-primary" name="add_category" form="add_category_form" value="add_category" id="add category">Save </button>         
        </div>        
      </div>
    </div>
  </div>
</body>
</html>
