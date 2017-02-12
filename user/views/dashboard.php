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

<div class="container">
	
	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<input class="form-control input-lg" type="search" placeholder="Search keywords here">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h2 style="color:#191919; display:inline-block; float:left;">Asked Questions</span></h2>
							<button data-toggle="modal" data-target="#myModal" class="btn btn-success pull-right" style="margin-top:10px;">Ask A Question</button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div data-toggle="collapse" data-target="#message" class="whitetable">
								<p style="padding-left:20px;">
									<br />
									<a><b style="font-size:110%" class="redtext clickable">Question to be flashed here</b><span class="glyphicon glyphicon-plus" style="float:right; margin-right:10px;"></span></a>
									<br />
									<div id="message" class="collapse" style="padding-left:20px;">
									Hello this is the message which contains the question details.
									</div>
									<hr width="95%" />
								</p>
							</div>
						</div>
					</div>
		</section>
		<!--main content end-->
</section>
<!-- container section end -->
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Form</h4>
		  </div>
		  <div class="modal-body" id="detail">
				<form class="form-horizontal" onsubmit="confirmSubmit()"  method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<label>Select TUP Branch</label>
							<select class="form-control" name="branch" id="branch" required>
							<option selected="selected" value="" disabled>--TUP Branch--</option>
							 </select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<label>Select TUP Department</label>
							<select class="form-control" name="department" id="department" required>
							<option selected="selected" value="" disabled>--TUP Department--</option>
							 </select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						<label>Title</label>
							<input type="text" name="title" id="title" class="form-control" required />
							<span class= "t_status"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
						<label>Message</label>
							<textarea type="text" class="form-control" name="message" id="message" required></textarea>
							<span class= "m_length"></span>
							<span class= "m_status"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="center">
							<button type="submit" id="send" class="btn btn-success btn-md" name="send_concern">Send Question</button>
						</div>
					</div>
				</form>
		  </div>
		</div>
	  </div>
	</div>	
<div class="push"></div>
</div>
<br />
<?php
pageFooter();
?>
<script>
$(document).ready(function(){

	$('.collapse').on('show.bs.collapse', function(){
	$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
	}).on('hide.bs.collapse', function(){
	$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
	});

	$('#myModal').on('show.bs.modal', function(){ 
	//populate modal
		$.ajax
		  ({
		   type: "POST",
		   url: "views/selectbranch.php",
		   cache: false,
		   success: function(r)
		   {
			  $("#branch").html(r);
		   } 
		   });
	   
	   
	});
	
	$("#branch").change(function(){
		branch_id= document.getElementById("branch").value;
		$.ajax
		({
		type: "POST",
		url: "views/selectdepartment.php",
		data: {branch_id},
		cache: false,
		success: function(r)
		{
		  $("#department").html(r);
		} 
		});
	});	

});
</script>
<?php
htmlFooter();
?>