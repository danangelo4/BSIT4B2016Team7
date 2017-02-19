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
htmlHeader('Operators','operators','');
pageHeader('Operators','operators','');
?>
<script>
function confirmSubmit(){
	alert("Admin has been updated successfully");
}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Admin
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					
					<div class="panel-body">
						<?php
						if( isset($ViewAdmin) && count($ViewAdmin)>0 ){
							foreach($ViewAdmin as $ViewAdmin){
								echo '					
									<form onsubmit="confirmSubmit()" class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-12">
										<label>Username</label>
											<input type="text" class="form-control" name="username" value="'.$ViewAdmin['username'].'" readonly />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
										<label>First Name</label>
											<input type="text" class="form-control" value="'.$ViewAdmin['first_name'].'" name="first_name" id="first_name" required />
											<span class= "fname_status"></span> 
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
										<label>Last Name</label>
											<input type="text" class="form-control" value="'.$ViewAdmin['last_name'].'" id="last_name" name="last_name" required />
											<span class= "lname_status"></span> 
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
										<label>Branch</label>
											<select class="form-control" name="branch">
											<option selected="selected" value="branch">Current: Branch</option>
											';
												if( isset($Branch) && count($Branch)>0 ){
													foreach($Branch as $Branch){
														echo '
																<option value="'.$Branch['name'].'">'.$Branch['name'].'</option>
															';
													}
												}else{
													echo '
																<option>NO RECORDS FOUND</option>
															';
												}
												echo'
											 </select>
										</div>
										<div class="col-sm-6">
										<label>Department</label>
											<select class="form-control" name="department">
											<option selected="selected" value="'.$ViewAdmin['department_id'].'">Current: '.$ViewAdmin['department_id'].'</option>
											
											 </select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-success btn-md" id="send" name="edit_admin">Update</button>
											<a type="button" class="btn btn-primary btn-md" href="admin.php?action=admins">Back</a>
										</div>
									</div>
									
								</form>';
							}
						}?>
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

$("#email").keyup(function()
{
	var email= document.getElementById("email").value;
	$.ajax
			({
				type: "POST",
				url: "check_email.php",
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