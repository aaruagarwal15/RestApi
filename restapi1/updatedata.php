<?php 
include("connect.php");

$rolln = $_POST['rolln'];
$roll_old = $_POST['roll_old'];
$name = $_POST['name'];
$sclass = $_POST['sclass'];


$sql = "UPDATE student SET name = '$name', class = '$sclass', roll_no = '$rolln' WHERE roll_no = '$roll_old';";
$result = mysqli_query($conn, $sql);

return $result;
?>