<?php
session_start();
	
if( isset($_GET['action']) && strlen($_GET['action'])>0 ) {
	switch($_GET['action']){
	case 'ask':
		askquestion();
		break;
	default:
		home();
	}
}else{
	//call the index function
	home();
}

function home(){ 
	if($_SERVER['REQUEST_METHOD']=='POST' ){
			$title = $_POST['title'];
			$message = $_POST['message'];
			$branch = $_POST['branch'];
			$department = $_POST['department'];
			include "model/model.php";
			$Inquiries = view_inquiries();
			add_inquiry($title,$message,$branch,$department);
			include "views/dashboard.php";
		}
		else{
			include "model/model.php";
			$Inquiries = view_inquiries();
			include "views/dashboard.php";
		}
}


?>