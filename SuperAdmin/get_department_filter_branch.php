<?php
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}

$branch=$_POST['branch'];

//prepare
$sql = "SELECT * FROM departments where branch_id='$branch'";

//display 
$result = mysqli_query($conn,$sql);

$FilterDept = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();			
			$info['id'] = $myrow['id'];
			$info['name'] = $myrow['name'];
			$FilterDept[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}

?>
<option selected="selected" value="" disabled>--Select Department--</option>
<?php	
	
if( isset($FilterDept) && count($FilterDept)>0 ){
	foreach($FilterDept as $FilterDept){
		echo '
				<option value="'.$FilterDept['id'].'">'.$FilterDept['name'].'</option>
			';
	}
}else{
	echo '
				<option>NO RECORDS FOUND</option>
			';
}
?>	


