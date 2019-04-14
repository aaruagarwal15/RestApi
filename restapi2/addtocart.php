<?php 
include("connect.php");
$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO product Values ('$p_id', '$p_name', '$quantity')";
$result = mysqli_query($conn, $sql);

return $result;
?>