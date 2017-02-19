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
htmlHeader('Agencies','agencies','');
pageHeader('Agencies','agencies','');
?>
<script>
function confirmSubmit(){
	alert("Agency has been updated successfully");
}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Agency
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading panel_headingblue white">
						Edit Agency
					</header>

					
					<div class="panel-body">
						<?php
						if( isset($ViewAgency) && count($ViewAgency)>0 ){
							foreach($ViewAgency as $ViewAgency){
								echo '					
									<form onsubmit="confirmSubmit()" class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-12">
										<label>Name</label>
											<input type="text" class="form-control" name="agency_name" value="'.$ViewAgency['agency_name'].'" readonly />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
										<label>Description</label>
											<input type="text" class="form-control" value="'.$ViewAgency['agency_desc'].'" name="agency_desc" id="agency_desc" required />
											<span class= "desc_status"></span> 
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-success btn-md" id="send" name="edit_agency">Update</button>
											<a type="button" class="btn btn-primary btn-md" href="admin.php?action=agencies">Back</a>
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

$("#agency_desc").keyup(function()
{
	agency_desc= document.getElementById("agency_desc").value;
	if (agency_desc.length < 1) {
		$(".desc_status").html('<i style="color: red;">This field is required</i>');
		document.getElementById("send").disabled = true;
	}else if (agency_desc.length < 5) {
		$(".desc_status").html('<i style="color: red;">5 minimum characters</i>');
		document.getElementById("send").disabled = true;
	}else if (agency_desc.length > 100) {
		$(".desc_status").html('<i style="color: red;">100 maximum characters</i>');
		document.getElementById("send").disabled = true;
	}else if ((jQuery.trim( agency_desc )).length==0) {
		$(".desc_status").html('<i style="color: red;">You have only entered spaces</i>');
		document.getElementById("send").disabled = true;
	}else{
	$.ajax
			({
				type: "POST",
				url: "check_description.php",
				data: {agency_desc},
				cache: false,
				success: function(r)
				{
				   if(r==0){
					   $(".desc_status").html('<i style="color: red;">Description for Agency already exists</i>');
						document.getElementById("send").disabled = true;	
				   }else if(r==1){
					   $(".desc_status").html('<i style="color: green;">Description is available<i>');
						document.getElementById("send").disabled = false;	
				   }
				} 
			});
	}
});


</script>
<?php
htmlFooter();
?>