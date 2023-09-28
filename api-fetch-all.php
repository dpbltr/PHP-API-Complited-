<?php

header('Content-Type1: application/json');
header('Acess-Control-Allow-Origin: *');

include 'config.php';
$sql = "SELECT * FROM example";
$result = mysqli_query($conn , $sql) or die('Query Faild');

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('massage' => 'No Record Found .' , 'status' => false));
}

?>
 