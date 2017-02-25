<?php
function add_inquiry($title,$message,$branch,$department){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO questions(title,description,branch_id,department_id,answer_id,date_submitted) VALUES('$title','$message','$branch','$department',null,now())";

//display
$result = mysqli_query($conn,$sql);
}


function view_inquiries(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM questions";

//display 
$result = mysqli_query($conn,$sql);

$Inquiries = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['title'] = $myrow['title'];
			$info['description'] = $myrow['description'];
			$info['branch_id'] = $myrow['branch_id'];
			$info['department_id'] = $myrow['department_id'];
			$info['date_submitted'] = $myrow['date_submitted'];
			$Inquiries[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Inquiries;
}


?>