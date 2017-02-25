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
htmlHeader('Branch','branch','');
?>
<link rel="stylesheet" href="dist/css/table.css">
<?php
pageHeader('Branch','branch','');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TUP Branches
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
					<a class="btn btn-success btn-md pull-left" href="admin.php?action=addbranch">Add Branch</a>
					<span class="btn-group pull-right"> 
    				<button class="btn btn-primary btn-md btnEdit" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</button>
    				<button class="btn btn-danger btn-md btnDelete" role="button"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
					</span>
					<br />
					<br />
					<section class="panel">
				
					<!-- Table Content -->
					<div id="page-content-wrapper">
						<div class="panel-body">
							<div class="table-responsive">
								<table id="agencies" class="table table-bordered">
								
									<thead>
										<tr>
											<th class="text-center">NAME</th>
											<th class="text-center">DESCRIPTION</th>
										</tr>
									</thead>
									
									<tbody>
									<?php
									if( isset($Agencies) && count($Agencies)>0 ){
										foreach($Agencies as $Agencies){
											echo '
												<tr class="text-center clickable" id="'.$Agencies['id'].'">
													<td><small>'.$Agencies['name'].'</small></td>
													<td><small>'.$Agencies['description'].'</small></td>
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
    		window.location = 'admin.php?action=edit_branch&id=' + ID;

        }else{
			$('.modal').modal('show');
            $('.modal-content').html("<div class='modal-header'><button type='button' class='close' id='btnClosemodal' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title' id='myModalLabel'>Select Record</h4></div><br/><center>Please select a record first before clicking edit button.</center><br/>");
			ID="";
        }
	});
	
	
	$(".btnDelete").click(function(){
       if(ID!=""){
		   
		    if(!confirm('Are you sure you want to delete this branch?')){
            e.preventDefault();
            return false;
			}else{
    		window.location = 'admin.php?action=delete_branch&id=' + ID;
			alert("Branch has been deleted");
			}

        }else{
			$('.modal').modal('show');
            $('.modal-content').html("<div class='modal-header'><button type='button' class='close' id='btnClosemodal' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title' id='myModalLabel'>Select Record</h4></div><br/><center>Please select a record first before clicking edit button.</center><br/>");
			ID="";
        }
	});
	
});
 $(function () {
    $('#agencies').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
<?php
htmlFooter();
?>