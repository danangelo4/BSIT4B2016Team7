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
htmlHeader('Department','department','');
pageHeader('Department','department','');
?>
<script>
function confirmSubmit(){
	alert("Department has been added successfully");
}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Department
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
				
					<div class="panel-body">
						<form class="form-horizontal" onsubmit="confirmSubmit()" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-sm-4">
								<label>Branch</label>
									<select class="form-control" id="branch" name="branch">
									<option selected="selected" value="" disabled>--Select a Branch--</option>
										<?php
											if( isset($Branch) && count($Branch)>0 ){
												foreach($Branch as $Branch){
													echo '
															<option value="'.$Branch['id'].'">'.$Branch['name'].'</option>
														';
												}
											}else{
												echo '
															<option>NO RECORDS FOUND</option>
														';
											}
										?>
									 </select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>Department Name</label>
									<input type="text" class="form-control" name="dept_name" id="dept_name" required />
									<span class= "status"></span> 
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<label>Description</label>
									<input type="text" class="form-control" name="dept_desc" id="dept_desc" required />
									<span class= "desc_status"></span> 
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-md" id="send" name="add_dept">Add Agency</button>
									<a type="button" class="btn btn-primary btn-md" href="admin.php?action=department">Back</a>
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
$("#dept_name").keyup(function()
{
	dept_name= document.getElementById("dept_name").value;
	if (dept_name.length == 0) {
		$(".status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
	}else if (dept_name.length == 1) {
		$(".status").html('<i style="color: red;">2 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (dept_name.length > 20) {
		$(".status").html('<i style="color: red;">20 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else if ((jQuery.trim( dept_name )).length==0) {
		$(".status").html('<i style="color: red;">You have only entered spaces</i>');
		document.getElementById("send").disabled = true;
	}else{
	$.ajax
			({
				type: "POST",
				url: "check_deptname.php",
				data: {dept_name},
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

$("#dept_desc").keyup(function()
{
	dept_desc= document.getElementById("dept_desc").value;
	if (dept_desc.length < 1) {
		$(".desc_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
	}else if (dept_desc.length < 5) {
		$(".desc_status").html('<i style="color: red;">5 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (dept_desc.length > 100) {
		$(".desc_status").html('<i style="color: red;">100 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else if ((jQuery.trim( dept_desc )).length==0) {
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