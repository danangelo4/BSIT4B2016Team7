<?php
//contains header, buttons, page_branch, & footer
include_once "lib/include.php";
htmlHeader('Dashboard','dashboard','');
?>
<link rel="stylesheet" href="assets/css/whitetable.css">
<link rel="stylesheet" href="assets/css/table.css">
<?php
pageHeader('Dashboard','dashboard','')
?>
<br />

<div class="wrapper">
<div class="container">
	
	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<div class="row">
					<div class="col-sm-12">
						<h1 style="color:#191919;">Asked Questions</h1>
			
								<div class="whitetable">
													<p style="padding-left:20px;">
														<br />
														<a href="#"><b style="font-size:110%" class="redtext">Question to be flashed here</b></a>
														<br />Hello this is a test.
														<hr width="95%" />
													</p>
								</div>
	
					</div>
			</div><!--/.row-->
		</section>
		<!--main content end-->
</section>
<!-- container section end -->

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Mga Ulat</h4>
		  </div>
		  <div class="modal-body" id="detail">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Isara</button>
		  </div>
		</div>
	  </div>
	</div>

<div class="push"></div>
</div>
</div>
<br />
<?php
pageFooter();
?>
<script>
$(document).ready(function(){

		$('.concerntable').click(function() {
			var getIdFromRow = $(event.target).closest('tr').data('id'); //get the id from tr
			$('#myModal').on('show.bs.modal', function(){
				$(".modal-title").html('Recent Concern');
			$.ajax
			  ({
			   type: "POST",
			   url: "views/get_concern.php",
			   data: {getIdFromRow},
			   cache: false,
			   success: function(r)
			   {
				  $("#detail").html(r);
			   } 
			   });
			});
		});
		
		$('.alerttable').click(function() {
			var getIdFromRow = $(event.target).closest('tr').data('id'); //get the id from tr
			$('#myModal').on('show.bs.modal', function(){
				$(".modal-title").html('Recent Alert');
			$.ajax
			  ({
			   type: "POST",
			   url: "views/get_alert.php",
			   data: {getIdFromRow},
			   cache: false,
			   success: function(r)
			   {
				  $("#detail").html(r);
			   } 
			   });
			});
		});
		   
		   
});
</script>
<?php
htmlFooter();
?>