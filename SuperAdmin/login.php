<?php
if(isset($_SESSION['sa_username'])) {
     header("Location: admin.php?action=dashboard"); // redirects them to homepage
	 exit;
}
?>

<!DOCTYPE>
<html lang="en">
<head>
	<title>Filipatrol Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="dist/css/bootstrap.min2.css" rel="stylesheet" />
	<link href="dist/css/logincss.css" rel="stylesheet" />
	<link rel="shortcut icon" href="images/logo/logo.png" />
</head>	
<body>
<div class="container">
	<div class="row">
		<div class="Absolute-Center is-Responsive">
			<div class="col-lg-12 text-center">
				<br />
				<a href="admin.php"><img src="images/logo/logo.png" height="20%" alt="logo"/></a>
				<h2>TUP Online Inquiry</h2>
			</div>
				<div class="col-sm-12 col-md-6 col-md-offset-3">
					<form method="post">
						<div class="panel panel-default">
							<div class="panel-heading"> <strong class="">SUPERADMIN PANEL</strong></div>
								<div class="panel-body">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-sm-3 control-label">Username:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="username" placeholder="Username" required="">
												<br />
											</div>
										</div>
										<br />
										<div class="form-group">
											<label class="col-sm-3 control-label">Password:</label>
												<div class="col-sm-9">
													<input type="password" class="form-control" name="password" placeholder="Password" required="">
												</div>
										</div>
										<br />
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-9">
												<br />
												<button type="submit" class="btn btn-success btn-sm">Login</button>
												<button type="reset" class="btn btn-default btn-sm">Reset</button>
											</div>
										</div>
									</form>
								</div>
						</div>  	
					</form>        
				</div>  
		</div>    
	</div>
</div>

	<script src="assets/js/vendor/jquery.min.js"></script>
	<script src="assets/js/flat-ui.min.js"></script>
	<script src="dist..\docs../assets/js/application.js"></script>
	  
</body>
</html>
