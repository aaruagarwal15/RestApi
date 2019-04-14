<?php 
include("connect.php");

$pid = $_POST['pid'];
$pid_old = $_POST['pid_old'];
$pname = $_POST['pname'];
$date = $_POST['date'];


$sql = "UPDATE project SET project_name = '$pname', start_date = '$date', project_id = '$pid' WHERE project_id = '$pid_old';";
$result = mysqli_query($conn, $sql);

return $result;
?>