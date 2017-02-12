<?php
//contains header, buttons, page_branch, & footer
include_once "lib/include.php";
htmlHeader('Ask Question','concerns','');
?>
<link rel="stylesheet" href="assets/css/table.css">
<link rel="stylesheet" href="assets/css/whitetable.css">
<?php
pageHeader('Ask Question','ask','');
?>
<script>
function confirmSubmit(){
	alert("Ang iyong ulat ay naipadala na! Maraming salamat!");
}
</script>
<br />
<div class="container">
	<div class="col-sm-12">
		<section class="panel">
							<header class="panel-heading" id="whitetext">
								Form
							</header>
						
			
							<div class="panel-body">
								<form class="form-horizontal" onsubmit="confirmSubmit()"  method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>Select TUP Branch</label>
											<select class="form-control" name="branch" required>
											<option selected="selected" value="" disabled>--TUP Branch--</option>
											 </select>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>Select TUP Department</label>
											<select class="form-control" name="department" required>
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
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<label>Image</label>
											<input type="file" name="image" id="image" value="" class="form-control" />
										</div>
									</div>
									<div class="form-group">
										<div class="center">
											<button type="submit" id="send" class="btn btn-success btn-md" name="send_concern">Send Question</button>
										</div>
									</div>
								</form>
			
							</div>
	
		</section>
	</div>
	
	
</div>
<br />
<?php
pageFooter();
?>
<?php
htmlFooter();
?>