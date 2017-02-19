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
?>
<link rel="stylesheet" href="dist/css/table.css">
<?php
pageHeader('Operators','operators','');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Operators
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
					<a class="btn btn-success btn-md pull-left" href="admin.php?action=addadmin">Add Operator</a>
					<span class="btn-group pull-right"> 
    				<button class="btn btn-primary btn-md btnEdit" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</button>
    				<button class="btn btn-danger btn-md btnDelete" role="button"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
					</span>
					<br />
					<br />
					<section class="panel">
					<header class="panel-heading panel_headingblue white">
						Operator List
					</header>
				
					<!-- Table Content -->
					<div id="page-content-wrapper">
						<div class="panel-body">
							<div class="table-responsive">
								<table id="operators" class="table table-bordered table-condensed">
								
									<thead>
										<tr>
											<th class="text-center" width="30%">USERNAME</th>
											<th class="text-center" width="20%">BRANCH</th>
											<th class="text-center" width="20%">DEPARTMENT</th>
											<th class="text-center" width="30%">FULL NAME</th>
										</tr>
									</thead>
									
									<tbody>
									<?php
									if( isset($Admins) && count($Admins)>0 ){
										foreach($Admins as $Admins){
											echo '
												<tr class="text-center clickable" id="'.$Admins['id'].'">
													<td><small>'.$Admins['username'].'</small></td>
													<td><small>'.$Admins['department_name'].'</small></td>
													<td><small>'.$Admins['department_name'].'</small></td>
													<td><small>'.$Admins['first_name'].' '.$Admins['last_name'].'</small></td>
													
												</tr>
												';
										}
									}else{
										echo '
												<tr class="text-center">
													<td colspan="5">No records found</td>
													
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
        <!-- ./col -->
      </div>
      
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
</div>  
  
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
	
	
	$(".btnEdit").click(function(){
       if(ID!=""){
    		window.location = 'admin.php?action=edit_admin&id=' + ID;

        }else{
			$('.modal').modal('show');
            $('.modal-content').html("<div class='modal-header'><button type='button' class='close' id='btnClosemodal' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title' id='myModalLabel'>Select Record</h4></div><br/><center>Please select a record first before clicking edit button.</center><br/>");
			ID="";
        }
	});
	
	
	$(".btnDelete").click(function(){
       if(ID!=""){
		   
		    if(!confirm('Are you sure to delete?')){
            e.preventDefault();
            return false;
			}else{
    		window.location = 'admin.php?action=delete_admin&id=' + ID;
			alert("Admin has been removed successfully");
			}

        }else{
			$('.modal').modal('show');
            $('.modal-content').html("<div class='modal-header'><button type='button' class='close' id='btnClosemodal' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title' id='myModalLabel'>Select Record</h4></div><br/><center>Please select a record first before clicking edit button.</center><br/>");
			ID="";
        }
	});
	$(function () {
    $('#operators').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
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