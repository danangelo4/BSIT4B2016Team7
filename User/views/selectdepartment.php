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

$Dept = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();			
			$info['id'] = $myrow['id'];
			$info['name'] = $myrow['name'];
			$Dept[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
?>
<?php
echo'
	<option selected="selected" value="" disabled>--TUP Department--</option>
';
if( isset($Dept) && count($Dept)>0 ){
	foreach($Dept as $Dept){
		echo '
				<option value="'.$Dept['id'].'">'.$Dept['name'].'</option>
			';
	}
}else{
	echo '
				<option>No Records Found</option>
			';
}	
?>