<?php
header('Content-Type: application/json');
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare

$sql = "  SELECT COUNT(u.id) AS qty, m.month
     FROM (
           SELECT 'Jan' AS MONTH
           UNION SELECT 'Feb' AS MONTH
           UNION SELECT 'Mar' AS MONTH
           UNION SELECT 'Apr' AS MONTH
           UNION SELECT 'May' AS MONTH
           UNION SELECT 'Jun' AS MONTH
           UNION SELECT 'Jul' AS MONTH
           UNION SELECT 'Aug' AS MONTH
           UNION SELECT 'Sep' AS MONTH
           UNION SELECT 'Oct' AS MONTH
           UNION SELECT 'Nov' AS MONTH
           UNION SELECT 'Dec' AS MONTH
          ) AS m
LEFT JOIN questions u 
ON MONTH(STR_TO_DATE(CONCAT(m.month, YEAR(CURDATE())),'%M %Y')) = MONTH(u.date_submitted)
   AND YEAR(u.date_submitted) = YEAR(CURDATE())
GROUP BY m.month
ORDER BY 1+1;";

//display 
$result = mysqli_query($conn,$sql);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode($data);	
?>