<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['sa_username'])){
		header("Location:admin.php");
	}
?>
<?php
include_once "lib/webdesign.php";
htmlHeader('Add Admin','admins','');
pageHeader('Add Admin','admins','');
?>
<script>
function confirmSubmit(){
	alert("Admin has been added successfully");
}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Admin
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading panel_headingblue white">
						REGISTRATION FORM
					</header>

				
					<div class="panel-body">
						<form class="form-horizontal" onsubmit="confirmSubmit()" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-sm-12">
								<label>Username</label>
									<input type="text" class="form-control" name="username" id="username" required />
									<span class= "status"></span> 
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>Password</label>
									<input type="password" class="form-control" name="password" id="password" required />
									<span class= "p_status"></span> 
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>First Name</label>
									<input type="text" class="form-control" name="first_name" id="first_name" required />
									<span class= "fname_status"></span> 
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>Last Name</label>
									<input type="text" class="form-control" name="last_name" id="last_name" required />
									<span class= "lname_status"></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>E-mail</label>
									<input type="email" class="form-control" name="email" id="email" required />
									<span class= "e_status"></span>
								</div>
							</div>
				
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-md" id="send" name="add_super_admin">Add Super Admin</button>
									<a type="button" class="btn btn-primary btn-md" href="admin.php?action=superadmins">Back</a>
								</div>
							</div>
							
						</form>
					</div>
							
				</section>
	
            </div>
		
		</div>
	</section>
        <!-- ./col -->
  </div>
      
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
pageFooter();
?>
<script>
$("#username").keyup(function()
{
	username= document.getElementById("username").value;
	if (username.length == 0) {
		$(".status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
	}else if (/\s/.test(username)) {
		$(".status").html('<i style="color: red;">username should not contain spaces</i>');
		document.getElementById("send").disabled = true;
	}else if (username.length < 5) {
		$(".status").html('<i style="color: red;">5 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (username.length > 20) {
		$(".status").html('<i style="color: red;">20 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else{
	$.ajax
			({
				type: "POST",
				url: "check_superadmin_username.php",
				data: {username},
				cache: false,
				success: function(r)
				{
				   if(r==0){
					   $(".status").html('<i style="color: red;">username is taken</i>');
						document.getElementById("send").disabled = true;	
				   }else if(r==1){
					   $(".status").html('<i style="color: green;">username is available<i>');
						document.getElementById("send").disabled = false;	
				   }
				} 
			});
	}
});

$("#email").keyup(function()
{
	var email= document.getElementById("email").value;
	$.ajax
			({
				type: "POST",
				url: "check_superadmin_email.php",
				data: {email},
				cache: false,
				success: function(r)
				{
				   if(r==0){
					   $(".e_status").html('<i style="color: red;">email is taken</i>');
						document.getElementById("send").disabled = true;	
				   }else if(r==1){
					   $(".e_status").html('');
						document.getElementById("send").disabled = false;	
				   }
				} 
			});
});

$("#password").keyup(function()
{
	password= document.getElementById("password").value;
	if (password.length < 8) {
		$(".p_status").html('<i style="color: red;">8 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (password.length > 30) {
		$(".p_status").html('<i style="color: red;">30 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else{
		$(".p_status").html('');
		document.getElementById("send").disabled = false;
	}
});

$("#first_name").keyup(function()
{
	first_name= document.getElementById("first_name").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(first_name)) {
        $(".fname_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("send").disabled = true;
    }else{
		if (first_name.length == 0) {
		$(".fname_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
		}else if (first_name.length == 1) {
			$(".fname_status").html('<i style="color: red;">2 minimum characters</i>');
			document.getElementById("send").disabled = true;
		}else if (first_name.length > 20) {
			$(".fname_status").html('<i style="color: red;">20 maximum characters</i>');
			document.getElementById("send").disabled = true;
		}else if ((jQuery.trim( first_name )).length==0) {
			$(".fname_status").html('<i style="color: red;">You have only entered spaces</i>');
			document.getElementById("send").disabled = true;
		}else{
			$(".fname_status").html('');
			document.getElementById("send").disabled = false;
		}
	}
});

$("#last_name").keyup(function()
{
	last_name= document.getElementById("last_name").value;
	var pattern = new RegExp(/[0-9~`!#$%\^&*+=\-\[\]\\';,./{}|\\":<>\?]/); //unacceptable chars
    if (pattern.test(last_name)) {
        $(".lname_status").html('<i style="color: red;">No numbers and special characters allowed</i>');
		document.getElementById("send").disabled = true;
    }else{
		if (last_name.length == 0) {
		$(".lname_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
		}else if (last_name.length == 1) {
			$(".lname_status").html('<i style="color: red;">2 minimum characters</i>');
			document.getElementById("send").disabled = true;
		}else if (last_name.length > 20) {
			$(".lname_status").html('<i style="color: red;">20 maximum characters</i>');
			document.getElementById("send").disabled = true;
		}else if ((jQuery.trim( last_name )).length==0) {
			$(".lname_status").html('<i style="color: red;">You have only entered spaces</i>');
			document.getElementById("send").disabled = true;
		}else{
			$(".lname_status").html('');
			document.getElementById("send").disabled = false;
		}
	}
});
</script>
<?php
htmlFooter();
?>