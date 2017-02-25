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
?>
<link rel="stylesheet" href="dist/css/table.css">
<?php
pageHeader('Department','department','');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TUP Departments
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			
			<div class="col-sm-4">
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
			<div class="col-sm-8">
				<span class="btn-group pull-right"> 
				<a class="btn btn-success btn-md pull-left" href="admin.php?action=add_dept">Add</a>
				<button class="btn btn-primary btn-md btnEdit" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</button>
				<button class="btn btn-danger btn-md btnDelete" role="button"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
				</span>
			</div>
			
			
			<div class="col-sm-12">
					<br />
					<section class="panel">
				
					<!-- Table Content -->
					<div id="page-content-wrapper">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="departmenttbl">
								
									<thead>
										<tr>
											<th class="text-center">NAME</th>
											<th class="text-center">DESCRIPTION</th>
										</tr>
									</thead>
									
									<tbody id="depts_table">
										<tr class="text-center">
											<td>-------SELECT A BRANCH FIRST--------</td>
											<td>-------SELECT A BRANCH FIRST--------</td>
											
										</tr>
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
	
	$("#branch").change(function()
	 {
		branch= document.getElementById("branch").value;
			$.ajax
			({
				type: "POST",
				url: "get_department_to_table.php",
				data: {branch},
				cache: false,
				success: function(r)
				{
				  $("#depts_table").html(r);
				} 
			});
		
	});

    $(document).on('click', '.clickable', function(){
            $('.clickable').removeClass('clicked');
            $(this).addClass('clicked');
            ID = $(this).attr('id');
    });
	
	
	$(".btnEdit").click(function(){
       if(ID!=""){
    		window.location = 'admin.php?action=edit_department&id=' + ID;

        }else{
			$('.modal').modal('show');
            $('.modal-content').html("<div class='modal-header'><button type='button' class='close' id='btnClosemodal' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title' id='myModalLabel'>Select Record</h4></div><br/><center>Please select a record first before clicking edit button.</center><br/>");
			ID="";
        }
	});
	
	
	$(".btnDelete").click(function(){
       if(ID!=""){
		   
		    if(!confirm('Are you sure you want to delete this department?')){
            e.preventDefault();
            return false;
			}else{
    		window.location = 'admin.php?action=delete_department&id=' + ID;
			alert("Department has been deleted successfully");
			}

        }else{
			$('.modal').modal('show');
            $('.modal-content').html("<div class='modal-header'><button type='button' class='close' id='btnClosemodal' data-dismiss='modal' aria-hidden='true'>&times;</button><h4 class='modal-title' id='myModalLabel'>Select Record</h4></div><br/><center>Please select a record first before clicking edit button.</center><br/>");
			ID="";
        }
	});
	
});
 $(function () {
    $('#departmenttbl').DataTable({
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