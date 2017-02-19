<?php
//Employees_model.php

function login_check(){
			include "config.php";
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$conn = mysqli_connect($host,$user,$pass,$db);
				if( mysqli_connect_errno($conn) ){
					echo "Error in DB";
				}else{
					// echo "OK";
				}
				$sql="SELECT * FROM super_admin
						WHERE username='".$_POST['username']."' AND
						password='".md5($_POST['password'])."'";
						
				//execute the query
				$result= mysqli_query($conn,$sql);
				//display result
				if (mysqli_num_rows($result)>0){
					//username and password are correct
					
					$username= $_POST['username'];
					$_SESSION['sa_username']= $username;
					
					
					login_log();
					active_admin();
					header("Location: admin.php?action=dashboard");
				}
				else{
					//username and password are wrong
					echo '<script> alert("Invalid Username/Password.")</script>';
				}
			}
			else{
				//DISPLAY THE LOGIN FORM
			}

}

function login_log(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$action="logs in";
$sql = "INSERT INTO logs(username,action,datetime) VALUES('$username','$action',now())";

//display
$result = mysqli_query($conn,$sql);

}

function active_admin(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$time = time();
$sql = "REPLACE INTO active_admin (username, time_visited) VALUES ('$username','$time')";

//display
$result = mysqli_query($conn,$sql);

}



function logout_log(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$action="logs out";
$sql = "INSERT INTO logs(username,action,datetime) VALUES('$username','$action',now())";

//display
$result = mysqli_query($conn,$sql);

}



function active_admin_logout(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$sql = "DELETE FROM active_admin WHERE username='$username'";

//display
$result = mysqli_query($conn,$sql);

}




function view_unattended(){
	
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT t1.*
FROM messages t1
WHERE t1.message_id = (SELECT t2.message_id
                 FROM messages t2, chat_rooms t3
                 WHERE (t2.chat_room_id,t3.chat_room_id) = (t1.chat_room_id,t1.chat_room_id)
                 AND t3.status = 'unattended'
                 ORDER BY t2.message_id DESC
                 LIMIT 1
                 )";

//display 
$result = mysqli_query($conn,$sql);

$ChatUnattended = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['chat_room_id'] = $myrow['chat_room_id'];
			$info['message_id'] = $myrow['message_id'];
			$info['message'] = $myrow['message'];
			$info['created_at'] = $myrow['created_at'];
			$ChatUnattended[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ChatUnattended;

}




function profile_details(){
	
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM super_admin where username='" . $_SESSION['sa_username'] . "'";

//display 
$result = mysqli_query($conn,$sql);

$ProfileDetails = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['email'] = $myrow['email'];
			$ProfileDetails[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ProfileDetails;

}




function view_logs(){
	
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM logs";

//display 
$result = mysqli_query($conn,$sql);

$Logs = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['username'] = $myrow['username'];
			$info['action'] = $myrow['action'];
			$info['object_id'] = $myrow['object_id'];
			$Logs[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Logs;

}



function admin_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT admin.*,departments.name AS department_name FROM admin,departments WHERE departments.id=admin.department_id ORDER BY id DESC";

//display 
$result = mysqli_query($conn,$sql);

$Admins = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['username'] = $myrow['username'];
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['department_id'] = $myrow['department_id'];
			$info['department_name'] = $myrow['department_name'];
			$Admins[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Admins;
}

function super_admin_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM super_admin";

//display 
$result = mysqli_query($conn,$sql);

$SuperAdmins = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['username'] = $myrow['username'];
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['email'] = $myrow['email'];
			$SuperAdmins[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $SuperAdmins;
}

function user_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM account where status='approved' OR status='blocked'";

//display 
$result = mysqli_query($conn,$sql);

$Users = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['account_id'] = $myrow['account_id'];			
			$info['username'] = $myrow['username'];
			$info['first_name'] = $myrow['first_name'];
			$info['middle_name'] = $myrow['middle_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['email_address'] = $myrow['email_address'];
			$info['status'] = $myrow['status'];
			$Users[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Users;
}

function agency_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM branch";

//display 
$result = mysqli_query($conn,$sql);

$Agencies = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['name'] = $myrow['name'];
			$info['description'] = $myrow['description'];
			$Agencies[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Agencies;
}


function dept_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM departments";

//display 
$result = mysqli_query($conn,$sql);

$Depts = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['name'] = $myrow['name'];
			$info['description'] = $myrow['description'];
			$Depts[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Depts;
}

function add_agency($agency_name,$agency_desc){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO govt_agency (agency_name,agency_desc) VALUES('$agency_name','$agency_desc')";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds admin";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

$result2 = mysqli_query($conn,$sql2);

}


function block_users(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id = $_GET['id'];
$sql = "UPDATE account SET status='blocked' WHERE account_id='$id'";

//display
$result = mysqli_query($conn, $sql);

$username=$_SESSION['sa_username'];
$action="blocks user";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
}

function activate_users(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id = $_GET['id'];
$sql = "UPDATE account SET status='approved' WHERE account_id='$id' AND status='blocked'";

//display
$result = mysqli_query($conn, $sql);

$username=$_SESSION['sa_username'];
$action="blocks user";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
}

function get_admin_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id=$_GET['id'];
$sql = "SELECT * FROM admin where id=$id";

//display 
$result = mysqli_query($conn,$sql);

$ViewAdmin = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['username'] = $myrow['username'];
			$info['password'] = $myrow['password'];
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['department_id'] = $myrow['department_id'];
			$ViewAdmin[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewAdmin;
}

function get_super_admin_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id=$_GET['id'];
$sql = "SELECT * FROM super_admin where id=$id";

//display 
$result = mysqli_query($conn,$sql);

$ViewSuperAdmin = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['username'] = $myrow['username'];
			$info['password'] = $myrow['password'];
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['email'] = $myrow['email'];
			$ViewSuperAdmin[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewSuperAdmin;
}

function get_agency_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id=$_GET['id'];
$sql = "SELECT * FROM govt_agency where id=$id";

//display 
$result = mysqli_query($conn,$sql);

$ViewAgency = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['agency_name'] = $myrow['agency_name'];
			$info['agency_desc'] = $myrow['agency_desc'];
			$ViewAgency[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewAgency;
}

function select_branch(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM branch";

//display 
$result = mysqli_query($conn,$sql);

$Branch = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['name'] = $myrow['name'];
			$Branch[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Branch;
}


function select_dept(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM departments";

//display 
$result = mysqli_query($conn,$sql);

$Dept = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['name'] = $myrow['name'];
			$Dept[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Dept;
}


function select_region(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT DISTINCT region FROM geography";

//display 
$result = mysqli_query($conn,$sql);

$Region = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();			
			$info['region'] = $myrow['region'];
			$Region[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Region;
}


function select_province($region){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT province FROM geography where region='$region'";

//display 
$result = mysqli_query($conn,$sql);

$Province = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();			
			$info['province'] = $myrow['province'];
			$Province[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Province;
}




function concern_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$username=$_SESSION['sa_username'];
$sql = "SELECT * FROM questions";

//display 
$result = mysqli_query($conn,$sql);

$Concerns = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['title'] = $myrow['title'];
			$info['description'] = $myrow['description'];
			$info['branch_id'] = $myrow['branch_id'];
			$Concerns[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Concerns;
}




function get_concern_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id = $_GET['id'];
$sql = "SELECT * FROM concern where concern_id='$id'";


//display 
$result = mysqli_query($conn,$sql);

$ViewConcern = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['concern_title'] = $myrow['concern_title'];
			$info['concern_msg'] = $myrow['concern_msg'];
			$info['govt_agency_recepient'] = $myrow['govt_agency_recepient'];
			$info['message_date'] = $myrow['message_date'];
			$info['image'] = $myrow['image'];
			$info['status'] = $myrow['status'];
			$ViewConcern[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewConcern;
}




function get_concern_response(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id = $_GET['id'];
$sql = "SELECT concern_response.* FROM concern_response where concern_response.concern_id='$id'";


//display 
$result = mysqli_query($conn,$sql);

$ViewConcernResponse = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['response_msg'] = $myrow['response_msg'];
			$info['image'] = $myrow['image'];
			$info['message_date'] = $myrow['message_date'];
			$ViewConcernResponse[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewConcernResponse;
}



function add_concern_response($response_msg,$image,$concern_msg){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$concern_id=$_GET['id'];
$sql = "INSERT INTO concern_response(response_msg, image, message_date, concern_id)
SELECT '$response_msg','$image', now(), '$concern_id'
FROM concern
WHERE concern_msg = '$concern_msg'";

//display
$result = mysqli_query($conn,$sql);
}

function response_log(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$action="replies to concern";
$object_id=$_GET['id'];
$sql = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

//display
$result = mysqli_query($conn,$sql);

}



function make_status_replied(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "UPDATE concern 
   INNER JOIN concern_response
   SET concern.status = 'replied' 
   WHERE concern.concern_id = concern_response.concern_id";

//display
$result = mysqli_query($conn,$sql);
}






function alert_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM alert";

//display 
$result = mysqli_query($conn,$sql);

$Alert = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['alert_title'] = $myrow['alert_title'];
			$info['alert_msg'] = $myrow['alert_msg'];
			$info['country'] = $myrow['country'];
			$info['region'] = $myrow['region'];
			$info['province'] = $myrow['province'];
			$info['city'] = $myrow['city'];
			$info['date_issued'] = $myrow['date_issued'];
			$Alert[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Alert;
}




function get_alert_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id=$_GET['id'];
$sql = "SELECT * FROM alert where id=$id";

//display 
$result = mysqli_query($conn,$sql);

$ViewAlert = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['alert_title'] = $myrow['alert_title'];
			$info['alert_msg'] = $myrow['alert_msg'];
			$info['image'] = $myrow['image'];
			$info['country'] = $myrow['country'];
			$info['region'] = $myrow['region'];
			$info['province'] = $myrow['province'];
			$info['city'] = $myrow['city'];
			$info['date_issued'] = $myrow['date_issued'];
			$ViewAlert[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewAlert;
}






function add_alert($alert_title,$alert_msg,$country,$region,$province,$city){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO alert(alert_title,alert_msg,country,region,province,city,date_issued) VALUES('$alert_title','$alert_msg','$country','$region','$province','$city',now())";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds alert";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

$result2 = mysqli_query($conn,$sql2);

}






function edit_alert($alert_title,$alert_msg,$country,$region,$province,$city){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$id = $_GET['id'];
$sql = "UPDATE alert SET alert_title='$alert_title',alert_msg='$alert_msg',country='$country',region='$region',province='$province',city='$city',date_issued=now() WHERE id='$id'";

//display
$result = mysqli_query($conn,$sql);
}



function edit_alert_log(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$action="edits alert";
$object_id=$_GET['id'];
$sql = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

//display
$result = mysqli_query($conn,$sql);

}



function edit_admin($username,$password,$first_name,$last_name,$email,$govt_agency){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$id = $_GET['id'];
$sql = "UPDATE admin SET username='$username',password='$password',first_name='$first_name',last_name='$last_name',email='$email',govt_agency='$govt_agency' WHERE id='$id'";

//display
$result = mysqli_query($conn,$sql);
}

function edit_super_admin($username,$password,$first_name,$last_name,$email){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$id = $_GET['id'];
$sql = "UPDATE super_admin SET username='$username',password='$password',first_name='$first_name',last_name='$last_name',email='$email' WHERE id='$id'";

//display
$result = mysqli_query($conn,$sql);
}

function edit_agency($agency_name,$agency_desc){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$id = $_GET['id'];
$sql = "UPDATE govt_agency SET agency_name='$agency_name',agency_desc='$agency_desc' WHERE id='$id'";

//display
$result = mysqli_query($conn,$sql);
}


function edit_admin_log(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$action="edits admin profile";
$object_id=$_GET['id'];
$sql = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

//display
$result = mysqli_query($conn,$sql);

}

function edit_super_admin_log(){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['sa_username'];
$action="edits admin profile";
$object_id=$_GET['id'];
$sql = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

//display
$result = mysqli_query($conn,$sql);

}


function add_admin($username,$password,$first_name,$last_name,$email,$govt_agency){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO admin (username,password,first_name,last_name,email,govt_agency) VALUES('$username',md5('$password'),'$first_name','$last_name','$email','$govt_agency')";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds admin";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

$result2 = mysqli_query($conn,$sql2);

}

function add_super_admin($username,$password,$first_name,$last_name,$email){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO super_admin (username,password,first_name,last_name,email) VALUES('$username',md5('$password'),'$first_name','$last_name','$email')";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds admin";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

$result2 = mysqli_query($conn,$sql2);

}


function delete_admin(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id=$_GET['id'];
$sql = "DELETE FROM admin WHERE id='$id'";

//display
$result = mysqli_query($conn, $sql);


$username=$_SESSION['sa_username'];
$action="deletes admin";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);

}

function delete_agency(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id=$_GET['id'];
$sql = "DELETE FROM govt_agency WHERE id='$id'";

//display
$result = mysqli_query($conn, $sql);


$username=$_SESSION['sa_username'];
$action="deletes admin";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);

}



function delete_alert(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id=$_GET['id'];
$sql = "DELETE FROM alert WHERE id='$id'";

//display
$result = mysqli_query($conn, $sql);

$username=$_SESSION['sa_username'];
$action="deletes alert";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
}


?>