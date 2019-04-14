<?php 
include("connect.php");
$var1 = $_POST['p_id'];

$sql = "DELETE FROM product WHERE p_id = '$var1'";
$result = mysqli_query($conn, $sql);

return $var1;

?>