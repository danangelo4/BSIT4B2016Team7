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
htmlHeader('Add Branch','addbranch','');
pageHeader('Add Branch','addbranch','');
?>
<script>
function confirmSubmit(){
	alert("Branch has been added successfully");
}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Branch
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading panel_headingblue white">
						BRANCH REGISTRATION FORM
					</header>

				
					<div class="panel-body">
						<form class="form-horizontal" onsubmit="confirmSubmit()" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-sm-12">
								<label>Branch Name</label>
									<input type="text" class="form-control" name="branch_name" id="branch_name" required />
									<span class= "status"></span> 
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>Description</label>
									<input type="text" class="form-control" name="branch_desc" id="branch_desc" required />
									<span class= "desc_status"></span> 
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-md" id="send" name="add_agency">Add Agency</button>
									<a type="button" class="btn btn-primary btn-md" href="admin.php?action=branch">Back</a>
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
$("#branch_name").keyup(function()
{
	branch_name= document.getElementById("branch_name").value;
	if (branch_name.length == 0) {
		$(".status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
	}else if (branch_name.length == 1) {
		$(".status").html('<i style="color: red;">2 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (branch_name.length > 20) {
		$(".status").html('<i style="color: red;">20 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else if ((jQuery.trim( branch_name )).length==0) {
		$(".status").html('<i style="color: red;">You have only entered spaces</i>');
		document.getElementById("send").disabled = true;
	}else{
	$.ajax
			({
				type: "POST",
				url: "check_branchname.php",
				data: {branch_name},
				cache: false,
				success: function(r)
				{
				   if(r==0){
					   $(".status").html('<i style="color: red;">Agency name already exists</i>');
						document.getElementById("send").disabled = true;	
				   }else if(r==1){
					   $(".status").html('<i style="color: green;">Agency name is available<i>');
						document.getElementById("send").disabled = false;	
				   }
				} 
			});
	}
});

$("#branch_desc").keyup(function()
{
	branch_desc= document.getElementById("branch_desc").value;
	if (branch_desc.length < 1) {
		$(".desc_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
	}else if (branch_desc.length < 5) {
		$(".desc_status").html('<i style="color: red;">5 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (branch_desc.length > 100) {
		$(".desc_status").html('<i style="color: red;">100 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else if ((jQuery.trim( branch_desc )).length==0) {
		$(".desc_status").html('<i style="color: red;">You have only entered spaces</i>');
		document.getElementById("send").disabled = true;
	}else{
		$(".desc_status").html('');
		document.getElementById("send").disabled = false;	
	}
});


</script>
<?php
htmlFooter();
?>