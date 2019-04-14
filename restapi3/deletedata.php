<?php 
include("connect.php");
$var1 = $_POST['pid'];

$sql = "DELETE FROM project WHERE project_id = '$var1'";
$result = mysqli_query($conn, $sql);

return $var1;

?>