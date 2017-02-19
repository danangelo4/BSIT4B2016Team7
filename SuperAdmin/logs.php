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
htmlHeader('Logs','logs','');
pageHeader('Logs','logs','');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Logs
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
								<table id="logs" class="table table-striped table-bordered table-hover table-condensed">
								
									<thead>
										<tr>
											<th class="text-center" width="70%">ACTIVITY LOG</th>
											<th class="text-center" width="30%">DATETIME</th>
										</tr>
									</thead>
									
									<tbody>
									<?php
									if( isset($Logs) && count($Logs)>0 ){
										foreach($Logs as $Logs){
											echo '
												<tr>
													<td><small>'.$Logs['username'].'&nbsp;'.$Logs['action'].'</small></td>
													<td class="text-center"><small>'.date("M d, Y h:ia", strtotime($Logs['datetime'])).'</small></td>
													
												</tr>
												';
										}
									}else{
										echo '
												<tr class="text-center">
													<td colspan="2">No records found</td>
													
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
</div>
<!-- ./wrapper -->

<?php
pageFooter();
?>
<script>
$(function () {
    $('#logs').DataTable({
      "paging": false,
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