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
	include "model/model.php";
	include "views/dashboard.php";
}


?>