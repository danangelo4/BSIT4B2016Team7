<?php
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}

$id=$_POST['getIdFromRow'];

//prepare
$sql = "SELECT * FROM questions where id='$id'";

//display 
$result = mysqli_query($conn,$sql);

$Concern = array();
	if( $myrow=mysqli_fetch_array($result) ){
		do{
			$info= array();			
			$info['title'] = $myrow['title'];
			$info['description'] = $myrow['description'];
			$info['answer_id'] = $myrow['answer_id'];
			$info['department_id'] = $myrow['department_id'];
			$info['date_submitted'] = $myrow['date_submitted'];
			$Concern[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	
	
$sql2 = "SELECT answers.* FROM answers where answers.id='$id'";


//display 
$result2 = mysqli_query($conn,$sql2);

$ViewConcernResponse = array();
	if( $myrow=mysqli_fetch_array($result2) ){
		do{
			$info= array();
			$info['answer'] = $myrow['answer'];
			$ViewConcernResponse[] = $info;
		}while($myrow=mysqli_fetch_array($result2));
	}
	
	?>
	
<?php
if( isset($Concern) && count($Concern)>0 ){
	foreach($Concern as $Concern){
		echo '
				<p><b>Title: </b>  '.$Concern['title'].'</p>
				<p><b>To: </b>  '.$Concern['department_id'].'</p>
				<p><b>Message: </b>  '.$Concern['description'].'</p>';
				if( isset($ViewConcernResponse) && count($ViewConcernResponse)>0 ){
					foreach($ViewConcernResponse as $ViewConcernResponse){
						echo'
						<br />
						<br />
						<p class="center">-------------------------------------------------------------------------------------</p>
						<p><b>From: </b>Concerned Citizen</p>
						<p><b>Message: </b>'.$ViewConcernResponse['answer'].'</p>
						';
					}
				}
	}
}else{
	echo '
				<p>NO RECORDS FOUND</p>
			';
}
?>	


