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
			$info['datetime'] = $myrow['datetime'];
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
$sql = "select A.id,A.username,A.first_name,A.last_name,B.name AS department,C.name AS branch from admin A inner join departments B on A.department_id = B.id inner join branch C on A.branch_id = C.id";

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
			$info['branch'] = $myrow['branch'];
			$info['department'] = $myrow['department'];
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


function branch_details(){
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

function add_branch($branch_name,$branch_desc){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO branch (name,description) VALUES('$branch_name','$branch_desc')";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds branch";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

$result2 = mysqli_query($conn,$sql2);

}

function add_department($branch_id,$department_name,$department_desc){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO departments (branch_id,name,description) VALUES('$branch_id','$department_name','$department_desc')";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds department";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

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
$sql = "select A.id,A.username,A.first_name,A.last_name,B.name AS department,C.name AS branch from admin A inner join departments B on A.department_id = B.id inner join branch C on A.branch_id = C.id where A.id='$id'";

//display 
$result = mysqli_query($conn,$sql);

$ViewAdmin = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['username'] = $myrow['username'];
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['branch'] = $myrow['branch'];
			$info['department'] = $myrow['department'];
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

function get_branch_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id=$_GET['id'];
$sql = "SELECT * FROM branch where id=$id";

//display 
$result = mysqli_query($conn,$sql);

$ViewAgency = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['name'] = $myrow['name'];
			$info['description'] = $myrow['description'];
			$ViewAgency[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewAgency;
}

function get_department_details(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id=$_GET['id'];
$sql = "SELECT * FROM departments where id=$id";

//display 
$result = mysqli_query($conn,$sql);

$ViewDept = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['name'] = $myrow['name'];
			$info['description'] = $myrow['description'];
			$ViewDept[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewDept;
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




function inquiry_details(){
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




function get_inquiry_details(){
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




function get_inquiry_response(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$id = $_GET['id'];
$sql = "SELECT * FROM answers,questions WHERE questions.answer_id=answers.id AND questions.id='$id'";


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



function add_inquiry_response($response_msg,$image,$concern_msg){

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
$action="answers inquiry";
$object_id=$_GET['id'];
$sql = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

//display
$result = mysqli_query($conn,$sql);
}



function edit_admin($username,$password,$first_name,$last_name,$branch_id,$department_id){

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
$sql = "UPDATE admin SET username='$username',first_name='$first_name',last_name='$last_name',department_id='$department_id',branch_id='$branch_id' WHERE id='$id'";

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

$username=$_SESSION['sa_username'];
$action="edits superadmin profile";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
}




function edit_branch($branch_name,$branch_desc){

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
$sql = "UPDATE branch SET name='$branch_name',description='$branch_desc' WHERE id='$id'";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="edits branch";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
}




function edit_department($department_name,$department_desc){

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
$sql = "UPDATE departments SET name='$department_name',description='$department_desc' WHERE id='$id'";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="edits department";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
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



function add_operator($username,$password,$first_name,$last_name,$branch,$department){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$sql = "INSERT INTO admin (username,password,first_name,last_name,branch_id,department_id) VALUES('$username',md5('$password'),'$first_name','$last_name','$branch','$department')";

//display
$result = mysqli_query($conn,$sql);

$username=$_SESSION['sa_username'];
$action="adds operator";
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
$action="adds superadmin";
$object_id=mysqli_insert_id($conn);
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

$result2 = mysqli_query($conn,$sql2);
}



function delete_superadmin_(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id=$_GET['id'];
$sql = "DELETE FROM super_admin WHERE id='$id'";

//display
$result = mysqli_query($conn, $sql);


$username=$_SESSION['sa_username'];
$action="deletes superadmin";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

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

function delete_branch(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id=$_GET['id'];
$sql = "DELETE FROM branch WHERE id='$id'";

//display
$result = mysqli_query($conn, $sql);


$username=$_SESSION['sa_username'];
$action="deletes branch";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);
}

function delete_department(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$id=$_GET['id'];
$sql = "DELETE FROM departments WHERE id='$id'";

//display
$result = mysqli_query($conn, $sql);


$username=$_SESSION['sa_username'];
$action="deletes department";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$id',now())";

$result2 = mysqli_query($conn,$sql2);

}


?>