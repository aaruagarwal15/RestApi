<?php 
include("connect.php");
$var1 = $_POST['roll_no'];

$sql = "DELETE FROM student WHERE roll_no = '$var1'";
$result = mysqli_query($conn, $sql);

return $var1;

?>