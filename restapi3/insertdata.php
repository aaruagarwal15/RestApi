<?php 
include("connect.php");
$pid = $_POST['pid'];
$pname = $_POST['pname'];
$date = $_POST['date'];

$sql = "INSERT INTO project Values ('$pid', '$pname', '$date')";
$result = mysqli_query($conn, $sql);

return $result;
?>