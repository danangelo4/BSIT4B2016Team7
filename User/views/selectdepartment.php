<?php
include "../model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}

$branch_id = $_POST['branch_id'];

//prepare
$sql = "SELECT * FROM departments where branch_id='$branch_id'";

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
?>
<?php
echo'
	<option selected="selected" value="" disabled>--TUP Department--</option>
';
if( isset($Branch) && count($Branch)>0 ){
	foreach($Branch as $Branch){
		echo '
				<option value="'.$Branch['name'].'">'.$Branch['name'].'</option>
			';
	}
}else{
	echo '
				<option>No Records Found</option>
			';
}	
?>