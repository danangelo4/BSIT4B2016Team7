<?php
function htmlHeader($title,$activeMenu,$parent){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN | <?php echo ($title)?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/input.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="shortcut icon" href="images/logo/logo.png" />
<?php
}

function pageHeader($title,$activeMenu,$parent){
?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TUP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>TUP</b> INQUIRY</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="hidden-xs"><?php echo $_SESSION['sa_username']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <i class="fa fa-user bigicon white"></i>

                <p>
                  <?php echo $_SESSION['sa_username']?>
                  <small>Technological University of the Philippines</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="admin.php?action=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="admin.php?action=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="<?php echo ($activeMenu=='dashboard')?'active':'';?>">
          <a href="admin.php?action=dashboard">
			<i class="fa fa-tachometer"></i> <span> Dashboard<span>
		  </a>
        </li>
       <li class="<?php echo ($activeMenu=='admins')?'active':'';?>">
          <a href="admin.php?action=superadmins">
            <i class="fa fa-users"></i> <span> Super Admins</span>
          </a>
        </li>
        <li class="<?php echo ($activeMenu=='operators')?'active':'';?>">
          <a href="admin.php?action=admins">
            <i class="fa fa-users"></i> <span> Operators</span>
          </a>
        </li>
		<li class="<?php echo ($activeMenu=='branch')?'active':'';?>">
          <a href="admin.php?action=branch">
            <i class="fa fa-institution"></i> <span> Branch</span>
          </a>
        </li>
		<li class="<?php echo ($activeMenu=='department')?'active':'';?>">
          <a href="admin.php?action=department">
            <i class="fa fa-institution"></i> <span> Department</span>
          </a>
        </li>
        <li class="<?php echo ($activeMenu=='inquiries')?'active':'';?>">
          <a href="admin.php?action=inquiries">
            <i class="fa fa-question"></i> <span> Inquiries</span>
          </a>
        </li>
        <li class="<?php echo ($activeMenu=='logs')?'active':'';?>">
          <a href="admin.php?action=logs">
            <i class="fa fa-ticket"></i> <span> Logs</span>
          </a>
        </li>
       
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
<?php
}

function pageFooter(){
?>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	setInterval(function(){
		$.ajax
		({
			type: "GET",
			url: "check_livechat_request.php",
			cache: false,
			success: function(r)
			{
				$(".pull-right-container").html(r);
			}	
		});
	}, 3000); //check unattended every 3 seconds
	
	
});
</script>


<?php
}

function htmlFooter(){
?>
	</body>
	</html>
<?php
}

?>
 