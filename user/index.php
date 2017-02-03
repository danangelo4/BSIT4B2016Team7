<?php
session_start();
	
if( isset($_GET['action']) && strlen($_GET['action'])>0 ) {
	switch($_GET['action']){
	default:
		home();
	}
}else{
	//call the index function
	home();
}

function home(){ 
	include "model/model.php";
	$Concerns = view_recent_concerns();
	$Alerts = view_recent_alerts();
	include "views/dashboard.php";
}

?>