<?php
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$agency_desc=$_POST['agency_desc'];
$sql = "SELECT agency_desc FROM govt_agency WHERE agency_desc = '$agency_desc'";

//display 
$result = mysqli_query($conn,$sql);

$anything_found = mysqli_num_rows($result);

//check if the username already exists
if($anything_found>0)
{
    echo "0";
}
else 
{ 
    echo "1"; 
}
?>