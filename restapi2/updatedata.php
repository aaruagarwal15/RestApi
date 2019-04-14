<?php 
include("connect.php");

$p_id = $_POST['p_id'];
$quantity = $_POST['quantity'];



$sql = "UPDATE product SET quantity = '$quantity' WHERE p_id = '$p_id';";
$result = mysqli_query($conn, $sql);

return $result;
?>