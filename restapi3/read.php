<?php
include("connect.php");

$sql = "SELECT * FROM project";
$result = mysqli_query($conn, $sql);

$categories_arr = array();
//$categories_arr["records"] = array();
while($r=mysqli_fetch_array($result)) 
{   
    extract($r);
    $student_array = array(
        "project_id" => $project_id,
        "project_name" => $project_name,
        "start_date" => $start_date
    );

    array_push($categories_arr, $student_array);
}
http_response_code(200);
echo json_encode($categories_arr);
?>