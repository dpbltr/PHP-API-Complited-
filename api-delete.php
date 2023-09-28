<?php
// header('Content-Type : application/json ');
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Method: POST');
// header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods ,Authorization , X-Requested-With');


// $data = json_decode(file_get_contents("php://input"), true);

// $student_id = isset($data['sid']) ? $data['sid] : null;

// include "config.php";
// if($student_id != null){
// $sql = "DELETE FROM example WHERE id = '{$student_id}'";
// // $result = mysqli_query($conn, $sql) or die("Query Faild ." . mysqli_connect_error($result));
// if(mysqli_query($conn, $sql)){
//     echo json_encode(array('Massage' => 'Student DELETE Record .', 'Status' => true));
// }
// else{
//     echo json_encode(array('Massage' => 'Student Record Not DELETED .' , 'Status' => false));
// }
//}


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$student_id = isset($data['sid']) ? $data['sid'] : null; // Assign the value or null if not set

include "config.php";

if ($student_id !== null) {
    $sql = "DELETE FROM example WHERE id = '{$student_id}'";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('Message' => 'Student Record Deleted.', 'Status' => true));
    } else {
        echo json_encode(array('Message' => 'Student Record Not Deleted.', 'Status' => false));
    }
} else {
    echo json_encode(array('Message' => 'Student ID not provided.', 'Status' => false));
}


?>
