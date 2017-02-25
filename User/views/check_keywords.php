<?php
include "../model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$search = $_POST['search']; // always escape

$keys = explode(" ",$search);

$sql = "SELECT * FROM questions WHERE title LIKE '%$search%' ";


$result = mysqli_query($conn,$sql);

$Search = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();			
			$info['id'] = $myrow['id'];
			$info['title'] = $myrow['title'];
			$info['description'] = $myrow['description'];
			$Search[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}

if( isset($Search) && count($Search)>0 ){
	foreach($Search as $Search){
		echo '
				<div>
				<p class="header clickable">
						<a style="padding-left:20px;"><b style="font-size:110%" class="redtext">'.$Search['title'].'</b><span style="float:right; margin-right:10px;"><span class="glyphicon glyphicon-plus"></span>/<span class="glyphicon glyphicon-minus"></span></span></a>
					<br />
					<div class="collapse">
						<span style="padding-left:20px;">'.$Search['description'].'</span>
					</div>
				</p>
				</div>
				<hr width="95%" />
			';
	}
}else{
	echo '
				<div>
				<p class="header text-center" style="padding-bottom:15px;">
						<span><b style="font-size:110%" class="redtext">No records found</b></span>
				</p>
				</div>
			';
}	

?>

<script>
$(document).ready(function(){

	$('.collapse').on('show.bs.collapse', function(){
	$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
	}).on('hide.bs.collapse', function(){
	$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
	});
	
	
	$('.header').click(function(){
		$(this).nextUntil('p.header').slideToggle();
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

});
</script>