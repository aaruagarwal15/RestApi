<?php 
include("connect.php");
$rolln = $_POST['rolln'];
$name = $_POST['name'];
$sclass = $_POST['sclass'];

$sql = "INSERT INTO student Values ('$rolln', '$name', '$sclass')";
$result = mysqli_query($conn, $sql);

return $result;
?>