<?php
if (isset($_GET['region'])) {
    $sql = new mysqli('localhost','root','','filipatrol');
    $region = mysqli_real_escape_string($sql,$_GET['region']);
    $query = "SELECT * FROM geography WHERE region = '$region'";
    $ret = $sql->query($query);
    $result = array();
    while ($row = $ret->fetch_assoc()) {
         $result[] = array(
             'value' => $row['id'],
             'name' => $row['province']
         );
    }
    echo json_encode($result);
}
?>