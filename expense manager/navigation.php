<?php
function user_navigation($active){
	?>
	<!doctype html>
	<html lang="en">
	<head>
		<title><?php echo $active; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- FOR NAVBAR DROPDOWN MENU -->
		<link rel="stylesheet" href="user-menu/css/style.css">
		<!-- <script src=//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin=anonymous></script> -->
		<!-- <script src=//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin=anonymous></script> -->
		<!-- <script src=//code.jquery.com/jquery-3.5.1.slim.js integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin=anonymous></script> -->
		<!-- for button icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- For buttons  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="css/ionicons.min.css">
		<link rel="stylesheet" href="css/style.css">
			
		<style>	
		body{
			overflow-x:hidden !important;
		}	
		
        .error{
            color:#e03434;
        }
		</style>
	</head>
	<body>
		<section class="ftco-section" style="padding:0; margin:0;">
			<div >
				<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
					<div class="container-fluid">
						<a class="navbar-brand" href="home.php">Expense Manager</a>
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
							aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="fa fa-bars"></span> Menu
						</button>
						<div class="collapse navbar-collapse" id="ftco-nav">
							<ul class="navbar-nav ml-auto mr-md-3">
								<li class="nav-item <?php if($active=='Home'){ echo 'active';} ?>"><a href="home.php" class="nav-link">Dasboard</a></li>
														
								<li class="nav-item <?php if($active=='Logout'){ echo 'active';} ?> "><a href="logout.php" class="nav-link"  onclick="logoutProfile();" >Logout</a></li>							
							</ul>
						</div>
					</div>
				</nav>
				<!-- END nav -->
			</div>
		</section>
		<!-- Validation files jquery -->
		<script src="./js/lib/jquery.js"></script>
		<script src="./js/dist/jquery.validate.js"></script>

		<!-- <script src="js/jquery.min.js"></script> -->
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script src="./js/validation.js"></script>
		
		<script>
			function logoutProfile() {
				if (confirm("Do you really want logout your profile?")) {
					location.href = 'logout.php';
				}
			}

		</script>
<?php
	}
?>

