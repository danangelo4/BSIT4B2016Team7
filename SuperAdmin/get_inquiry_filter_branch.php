<?php
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$filter=$_POST['filter'];
$sql = "SELECT * FROM questions where branch_id='$filter'";

//display 
$result = mysqli_query($conn,$sql);

$Concerns = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();
			$info['id'] = $myrow['id'];
			$info['title'] = $myrow['title'];
			$info['description'] = $myrow['description'];
			$info['answer_id'] = $myrow['answer_id'];
			$info['department_id'] = $myrow['department_id'];
			$info['date_submitted'] = $myrow['date_submitted'];
			$Concerns[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	
	if( isset($Concerns) && count($Concerns)>0 ){
		foreach($Concerns as $Concerns){
			echo '
				<tr data-toggle="modal" data-id="'.$Concerns['id'].'" data-target="#myModal" class="text-center clickable" id="'.$Concerns['id'].'">
					<td><small>'.$Concerns['title'].'</small></td>
					<td><small>'.$Concerns['department_id'].'</small></td>
				</tr>
				';
		}
	}else{
		echo '
				<tr class="text-center">
					<td colspan="3">No records found</td>
				</tr>
				';
	}
?>