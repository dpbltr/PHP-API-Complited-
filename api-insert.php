<?php

// header('Content-Type : application/json');
// header('Access-Control-Allow-Origin: *');
// header('Access-Cotrol-Allow-Method : POST');
// header('Access-Control-Allow-Headers:  Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');

// $data = json_decode(file_get_contents("php://input"), true);

// $Name = $data =  ['Name'];
// $Marks = $data = ['Marks'];
// $Grade = $data = ['Grade'];
// $City = $data =  ['City'];

// include "config.php";

// $sql = "INSERT INTO example (Name, Marks, Grade, City ) VALUES('$Name',$Marks,'$Grade','$City')";
// if (mysqli_query($conn, $sql)) {
//     echo json_encode(array('Massage' => 'Student Record Inserted .', 'status' => true));
// } else {
//     echo json_encode(array('Massage' => 'Student Record Not Inserted : ', 'status' => false));
// }





header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$Name = isset($data['Name']) ? $data['Name'] : '';
$Marks = isset($data['Marks']) ? $data['Marks'] : '';
$Grade = isset($data['Grade']) ? $data['Grade'] : '';
$City = isset($data['City']) ? $data['City'] : '';

include "config.php";

$sql = "INSERT INTO example (Name, Marks, Grade, City) VALUES('$Name', '$Marks', '$Grade', '$City')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('Message' => 'Student Record Inserted.', 'status' => true));
} else {
    echo json_encode(array('Message' => 'Student Record Not Inserted:', 'status' => false));
}



?>