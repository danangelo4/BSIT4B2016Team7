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

?>
<?php	
	
if( isset($Depts) && count($Depts)>0 ){
	foreach($Depts as $Depts){
		echo '
			<tr class="text-center clickable" id="'.$Depts['id'].'">
				<td><small>'.$Depts['name'].'</small></td>
				<td><small>'.$Depts['description'].'</small></td>
			</tr>
			';
	}
}else{
	echo '
			<tr class="text-center">
				<td colspan="5">No records found</td>
				
			</tr>
			';
}
?>	


