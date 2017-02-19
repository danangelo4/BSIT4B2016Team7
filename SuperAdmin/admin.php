<?php
session_start();
	if(!isset($_SESSION['sa_username'])){
		echo '<script>header("Location: admin.php");</script>';
	}
	
if( isset($_GET['action']) && strlen($_GET['action'])>0 ) {
	switch($_GET['action']){
	case 'logout':
		logout_();
		break;
	case 'dashboard':
		loggedin_();
		break;
	case 'superadmins':
		superadmins_();
		break;
	case 'addsuperadmin':
		addsuperadmin_();
		break;
	case 'admins':
		admins_();
		break;
	case 'addadmin':
		addadmin_();
		break;
	case 'users':
		users_();
		break;
	case 'branch':
		agencies_();
		break;
	case 'department':
		dept_();
		break;
	case 'addbranch':
		addbranch_();
		break;
	case 'add_dept':
		adddept_();
		break;
	case 'blockusers':
		blockusers_();
		break;
	case 'activateusers':
		activateusers_();
		break;
	case 'inquiries':
		concerns_();
		break;
	case 'view_concern':
		viewconcern_();
		break;
	case 'sendalert':
		sendalerts_();
		break;
	case 'edit_alert':
		editalert_();
		break;
	case 'alerts':
		alerts_();
		break;
	case 'livechat':
		livechat_();
		break;
	case 'chatroom':
		chatroom_();
		break;
	case 'profile':
		profile_();
		break;
	case 'edit_admin':
		editadmin_();
		break;
	case 'edit_super_admin':
		editsuperadmin_();
		break;
	case 'edit_agency':
		editagency_();
		break;
	case 'delete_admin':
		deleteadmin_();
		break;
	case 'delete_agency':
		deleteagency_();
		break;
	case 'delete_alert':
		deletealert_();
		break;
	case 'logs':
		logs_();
		break;
	default:
		index(); //login site
	}
}else{
	//call the index function
	index();
}

function index(){ //login
	include "model/model.php";
	$FiliPatrol = login_check();
	include "login.php"; //login site
}


function loggedin_(){
	include "index.php"; //dashboard
}


function livechat_(){
	include "model/model.php";
	$ChatUnattended = view_unattended();
	include "livechat.php";
}



function chatroom_(){
	include "chatroom.php";
}


function profile_(){
	include "model/model.php";
	$ProfileDetails = profile_details();
	include "profile.php";
}

function logout_(){
	include "model/model.php";
	logout_log();
	active_admin_logout();
	session_start();
	session_destroy();
	header("Location: admin.php");
}

function admins_(){
	include "model/model.php";
	$Admins = admin_details();
	include "admins.php";
}

function superadmins_(){
	include "model/model.php";
	$SuperAdmins = super_admin_details();
	include "super_admins.php";
}

function users_(){
	include "model/model.php";
	$Users = user_details();
	include "users.php";
}

function agencies_(){
	include "model/model.php";
	$Agencies = agency_details();
	include "branch.php";
}

function dept_(){
	include "model/model.php";
	$Depts = dept_details();
	include "department.php";
}

function addbranch_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$agency_name = $_POST['agency_name'];
				$agency_desc = $_POST['agency_desc'];
		ob_start();
		include "model/model.php";
		$Agencyadd = add_agency($agency_name,$agency_desc);
		ob_end_clean();
		$Agencies = agency_details();
		include "government_agencies.php";
	}else{
		
		include "model/model.php";
		$Agencies = agency_details();
		include "addbranch.php";
	}
}

function adddept_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$agency_name = $_POST['agency_name'];
				$agency_desc = $_POST['agency_desc'];
		ob_start();
		include "model/model.php";
		$Agencyadd = add_agency($agency_name,$agency_desc);
		ob_end_clean();
		$Agencies = agency_details();
		include "government_agencies.php";
	}else{
		
		include "model/model.php";
		$Agencies = agency_details();
		include "adddepartment.php";
	}
}

function addadmin_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];
				$govt_agency = $_POST['govt_agency'];
		ob_start();
		include "model/model.php";
		$Admin = add_admin($username,$password,$first_name,$last_name,$email,$govt_agency);
		ob_end_clean();
		$Admins = admin_details();
		$Branch = select_branch();
		$Dept = select_dept();
		include "admins.php";
	}else{
		
		include "model/model.php";
		$Admins = admin_details();
		$Branch = select_branch();
		$Dept = select_dept();
		include "addadmin.php";
	}
}

function addsuperadmin_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];
		ob_start();
		include "model/model.php";
		$SuperAdmin = add_super_admin($username,$password,$first_name,$last_name,$email);
		ob_end_clean();
		$SuperAdmins = super_admin_details();
		include "super_admins.php";
	}else{
		
		include "model/model.php";
		$SuperAdmins = super_admin_details();
		include "addsuperadmin.php";
	}
}


function concerns_(){
	include "model/model.php";
	$Concerns = concern_details();
	$Agency = select_branch();
	include "inquiries.php";
}

function viewconcern_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$response_msg = $_POST['response_msg'];
				$concern_msg = $_POST['concern_msg'];
				
				//check whether an image is selected
				if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
					$errors = array();
					$allowed_ext = array('jpg','jpeg','png','gif');
					$random = md5(uniqid().rand());
					$file_name = $random . $_FILES['image']['name'];
					
					
					
					$file_ext = strtolower(substr($file_name, (strrpos($file_name, '.') + 1), strlen($file_name)));  
					
					
					$file_size = $_FILES['image']['size'];
					$file_tmp = $_FILES['image']['tmp_name'];
					
						if(move_uploaded_file($file_tmp, 'uploads/concern_response_img/'.$file_name)) {
							$image=($file_name);
							echo 'File uploaded';
							ob_start();
							include "model/model.php";
							$ConcernResponse = add_concern_response($response_msg,$image,$concern_msg);
							make_status_replied();
							response_log();
							ob_end_clean();
							$Concerns = concern_details();
							include "concerns.php";
						}
				}else
				{
					//no image is selected
					ob_start();
					include "model/model.php";
					$image="";
					$ConcernResponse = add_concern_response($response_msg,$image,$concern_msg);
					make_status_replied();
					response_log();
					ob_end_clean();
					$Concerns = concern_details();
					include "concerns.php";
				}
				
		
	}else{
	include "model/model.php";
	$ViewConcern = get_concern_details();
	$ViewConcernResponse = get_concern_response();
	include "view_concern.php";
	}
}

function sendalerts_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$alert_title = $_POST['alert_title'];
				$alert_msg = $_POST['alert_msg'];
				$country = $_POST['country'];
				$region = $_POST['region'];
				if(isset($_POST['province'])){
					$province = $_POST['province'];
				}else{
					$province="";
				}
				if(isset($_POST['city'])){
					$city = $_POST['city'];
				}else{
					$city="";
				}
				if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
					$errors = array();
					$allowed_ext = array('jpg','jpeg','png','gif');
					$random = md5(uniqid().rand());
					$file_name = $random . $_FILES['image']['name'];
					
					
					
					$file_ext = strtolower(substr($file_name, (strrpos($file_name, '.') + 1), strlen($file_name)));  
					
					
					$file_size = $_FILES['image']['size'];
					$file_tmp = $_FILES['image']['tmp_name'];
					
						if(move_uploaded_file($file_tmp, 'images/uploads/alerts/'.$file_name)) {
							$image=($_FILES['image']['name']);
							echo 'File uploaded';
							ob_start();
							include "model/model.php";
							$SendAlert = add_alert($alert_title,$alert_msg,$country,$region,$province,$city,$image);
							ob_end_clean();
							$Alert = alert_details();
							include "alerts.php";
						}
				}else
				{
					//no image is selected
					ob_start();
					include "model/model.php";
					$SendAlert = add_alert($alert_title,$alert_msg,$country,$region,$province,$city,$image);
					ob_end_clean();
					$Alert = alert_details();
					include "alerts.php";
				}
	}else{
		include "model/model.php";
		$Region = select_region();
		include "sendalert.php";
	}
}

function editalert_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$alert_title = $_POST['alert_title'];
				$alert_msg = $_POST['alert_msg'];
				$country = $_POST['country'];
				$region = $_POST['region'];
				$province = $_POST['province'];
				$city = $_POST['city'];
		ob_start();
		include "model/model.php";
		$EditAlert = edit_alert($alert_title,$alert_msg,$country,$region,$province,$city);
		edit_alert_log();
		ob_end_clean();
		$Alert = alert_details();
		include "alerts.php";
	}else{
	include "model/model.php";
	$ViewAlert = get_alert_details();
	$Region = select_region();
	include "edit_alert.php";
	}
}



function editadmin_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$username = $_POST['username'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];
				$govt_agency = $_POST['govt_agency'];
		ob_start();
		include "model/model.php";
		$EditAdmin = edit_admin($username,$password,$first_name,$last_name,$email,$govt_agency);
		edit_admin_log();
		ob_end_clean();
		$Admins = admin_details();
		include "admins.php";
	}else{
	include "model/model.php";
	$ViewAdmin = get_admin_details();
	$Branch = select_branch();
	$Dept = select_dept();
	include "edit_admin.php";
	}
}

function editsuperadmin_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$username = $_POST['username'];
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$email = $_POST['email'];
		ob_start();
		include "model/model.php";
		$EditSuperAdmin = edit_super_admin($username,$password,$first_name,$last_name,$email);
		//edit_admin_log();
		ob_end_clean();
		$SuperAdmins = super_admin_details();
		include "super_admins.php";
	}else{
	include "model/model.php";
	$ViewSuperAdmin = get_super_admin_details();
	include "edit_super_admin.php";
	}
}

function editagency_(){
	if( $_SERVER['REQUEST_METHOD']=='POST' ){
				$agency_name = $_POST['agency_name'];
				$agency_desc = $_POST['agency_desc'];
		ob_start();
		include "model/model.php";
		$EditAgency = edit_agency($agency_name,$agency_desc);
		edit_admin_log();
		ob_end_clean();
		$Agencies = agency_details();
		include "government_agencies.php";
	}else{
	include "model/model.php";
	$ViewAgency = get_agency_details();
	include "edit_agency.php";
	}
}



function alerts_(){
	include "model/model.php";
	$Alert = alert_details();
	include "alerts.php";
}

function logs_(){
	include "model/model.php";
	$Logs = view_logs();
	include "logs.php";
}


function blockusers_(){
	ob_start();
	include "model/model.php";
	block_users();
	ob_clean();
	$Users = user_details();
	include "users.php";
}

function activateusers_(){
	ob_start();
	include "model/model.php";
	activate_users();
	ob_clean();
	$Users = user_details();
	include "users.php";
}

function deleteadmin_(){
	ob_start();
	include "model/model.php";
	delete_admin();
	ob_clean();
	$Admins = admin_details();
	include "admins.php";
}

function deleteagency_(){
	ob_start();
	include "model/model.php";
	delete_agency();
	ob_clean();
	$Agencies = agency_details();
	include "government_agencies.php";
}



function deletealert_(){
	ob_start();
	include "model/model.php";
	delete_alert();
	ob_clean();
	$Alert = alert_details();
	include "alerts.php";
}

?>