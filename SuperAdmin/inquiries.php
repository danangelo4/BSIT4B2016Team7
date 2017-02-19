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
htmlHeader('Inquiries','inquiries','');
?>
<link rel="stylesheet" href="dist/css/table.css">
<?php
pageHeader('Inquiries','inquiries','');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inquiries
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
							
					<!-- Table Content -->
					<div id="page-content-wrapper">
						<div class="panel-body">
							<div class="table-responsive">
								<table id="concerns" class="table table-bordered table-condensed">
								<div class="form-group">
									<div class="form-group">
										<div class="col-sm-4">
												<select class="form-control" id="filter" name="filter">
													<option selected="selected" value="all">All Branches</option>
													<?php
														if( isset($Agency) && count($Agency)>0 ){
															foreach($Agency as $Agency){
																echo '
																		<option value="'.$Agency['id'].'">'.$Agency['name'].'</option>
																	';
															}
														}else{
															echo '
																		<option disabled>No other records found</option>
																	';
														}
													?>
												 </select>
											</div>
										</div>
									<div class="form-group">
										<div class="col-sm-4">
												<select class="form-control" id="filter" name="filter">
													<option selected="selected" value="all">All Departments</option>
												<?php
														if( isset($Depts) && count($Depts)>0 ){
															foreach($Depts as $Depts){
																echo '
																		<option value="'.$Depts['name'].'">'.$Depts['name'].'</option>
																	';
															}
														}else{
															echo '
																		<option disabled>No other records found</option>
																	';
														}
													?>	
												 </select>
											</div>
										</div>
										</div>
										
										
									<br />
									<br />
									
									<thead>
										<tr>
											<th class="text-center" width="40%">INQUIRY TITLE</th>
											<th class="text-center" width="30%">RECIPIENT</th>
										</tr>
									</thead>
									
									<tbody id="concernstable" class="concernstbl">
									<?php
									if( isset($Concerns) && count($Concerns)>0 ){
										foreach($Concerns as $Concerns){
											echo '
												<tr data-toggle="modal" data-id="'.$Concerns['id'].'" data-target="#myModal" class="text-center clickable" id="'.$Concerns['id'].'">
													<td><small>'.$Concerns['title'].'</small></td>
													<td><small>'.$Concerns['branch_id'].'</small></td>
												</tr>
												';
										}
									}else{
										echo '
												<tr class="text-center">
													<td colspan="3">No records found</td>
												</tr>
												';
									}
									?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
							<!-- /#table-content-wrapper -->
				</section>
			</div>
		</div>
	</section>
        <!-- ./col -->
		
		
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Inquiry</h4>
		  </div>
		  <div class="modal-body" id="detail">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
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
<script type="text/javascript">
var ID="";
$(document).ready(function(){

    $(document).on('click', '.clickable', function(){
            $('.clickable').removeClass('clicked');
            $(this).addClass('clicked');
            ID = $(this).attr('id');
    });
	
	
	 $('#myModal').on('show.bs.modal', function(){ //subscribe to show method
	  var getIdFromRow = $(event.target).closest('tr').data('id'); //get the id from tr
	//make your ajax call populate items or what even you need

		$.ajax
		  ({
		   type: "POST",
		   url: "get_inquiry.php",
		   data: {getIdFromRow},
		   cache: false,
		   success: function(r)
		   {
			  $("#detail").html(r);
		   } 
		   });
	   
	});
	
	
	$("#filter").change(function()
		{
			filter= document.getElementById("filter").value;
			alert(filter);
			if (filter=="all"){
				$.ajax
				({
				type: "POST",
				url: "get_inquiry_all.php",
				cache: false,
				success: function(r)
				{
				  $(".concernstbl").html(r);
				} 
				});
			} else{
				$.ajax
				({
				type: "POST",
				url: "get_inquiry_filter_branch.php",
				data: {filter},
				cache: false,
				success: function(r)
				{
				  $(".concernstbl").html(r);
				} 
				});
			}
		});	
		
		
		$(function () {
    $('#concerns').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
		
	
});
</script>
<?php
htmlFooter();
?>