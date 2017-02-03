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
				$sql="SELECT account_id FROM account
						WHERE username='".$_POST['username']."' AND
						password='".md5($_POST['password'])."'";
						
				//execute the query
				$result= mysqli_query($conn,$sql);
				//display result
				if (mysqli_num_rows($result)>0){
					//username and password are correct
					
					$username= $_POST['username'];
					$_SESSION['username']= $username;
					
					
					header("Location: patrol.php?action=dashboard");
				}
				else{
					//username and password are wrong
					echo '<script> alert("Hindi nagtugma ang Username at Password!")</script>';
				}
			}
			else{
				//DISPLAY THE LOGIN FORM
			}

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
$sql = "SELECT * FROM account where username='" . $_SESSION['username'] . "'";

//display 
$result = mysqli_query($conn,$sql);

$Userdetails = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['first_name'] = $myrow['first_name'];
			$info['last_name'] = $myrow['last_name'];
			$info['middle_name'] = $myrow['middle_name'];
			$info['age'] = $myrow['age'];
			$info['email_address'] = $myrow['email_address'];
			$info['mobile_no'] = $myrow['mobile_no'];
			$info['country'] = $myrow['country'];
			$info['province'] = $myrow['province'];
			$info['city'] = $myrow['city'];
			$Userdetails[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Userdetails;

}

function submit_concern($concern_title,$concern_msg,$image,$govt_agency_recepient){

include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
	// echo "OK";
}
//prepare
$username=$_SESSION['username'];

$sql = "INSERT INTO concern(username,concern_title,concern_msg,image,govt_agency_recepient,message_date,status) VALUES('$username','$concern_title','$concern_msg','$image','$govt_agency_recepient',now(),'unreplied')";

//display
$result = mysqli_query($conn,$sql);
echo"<script>alert('pass')</script>";
}

function view_concern(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM concern where status='replied'";

//display 
$result = mysqli_query($conn,$sql);

$Concerns = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['concern_id'] = $myrow['concern_id'];
			$info['concern_title'] = $myrow['concern_title'];
			$info['concern_msg'] = $myrow['concern_msg'];
			$info['message_date'] = $myrow['message_date'];
			$Concerns[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Concerns;
}

function view_recent_concerns(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * from concern ORDER by concern_id DESC limit 0,3";

//display 
$result = mysqli_query($conn,$sql);

$Concerns = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['concern_id'] = $myrow['concern_id'];
			$info['concern_title'] = $myrow['concern_title'];
			$info['concern_msg'] = $myrow['concern_msg'];
			$info['govt_agency_recepient'] = $myrow['govt_agency_recepient'];
			$info['message_date'] = $myrow['message_date'];
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
			$ViewConcern[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $ViewConcern;
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




function select_agency(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM govt_agency";

//display 
$result = mysqli_query($conn,$sql);

$Agency = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['agency_name'] = $myrow['agency_name'];
			$Agency[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Agency;
}





function select_agency_filter(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * FROM govt_agency";

//display 
$result = mysqli_query($conn,$sql);

$AgencyFilter = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];			
			$info['agency_name'] = $myrow['agency_name'];
			$AgencyFilter[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $AgencyFilter;
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
$sql = "SELECT * FROM concern where status='replied'";

//display 
$result = mysqli_query($conn,$sql);

$Concerns = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['concern_id'] = $myrow['concern_id'];
			$info['concern_title'] = $myrow['concern_title'];
			$info['concern_msg'] = $myrow['concern_msg'];
			$info['govt_agency_recepient'] = $myrow['govt_agency_recepient'];
			$info['message_date'] = $myrow['message_date'];
			$Concerns[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Concerns;
}




function alerts_all(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * from alert";

//display 
$result = mysqli_query($conn,$sql);

$Alerts = array();
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
			$Alerts[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Alerts;
}




function view_recent_alerts(){
include "config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$sql = "SELECT * from alert ORDER by id DESC limit 0,3";

//display 
$result = mysqli_query($conn,$sql);

$Alerts = array();
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
			$Alerts[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $Alerts;
}

?>