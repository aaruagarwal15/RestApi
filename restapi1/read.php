<?php
include("connect.php");

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

$categories_arr = array();
//$categories_arr["records"] = array();
while($r=mysqli_fetch_array($result)) 
{   
    extract($r);
    $student_array = array(
        "roll_no" => $roll_no,
        "name" => $name,
        "class" => $class
    );

    array_push($categories_arr, $student_array);
}
http_response_code(200);
echo json_encode($categories_arr);
?>