<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$sid = isset($data['sid']) ? $data['sid'] : '';
$Name = isset($data['Name']) ? $data['Name'] : '';
$Marks = isset($data['Marks']) ? $data['Marks'] : '';
$Grade = isset($data['Grade']) ? $data['Grade'] : '';
$City = isset($data['City']) ? $data['City'] : '';

include 'config.php';

if (!empty($sid)) {
    $sql = "UPDATE example SET Name = '{$Name}', Marks = '{$Marks}', Grade = '{$Grade}', City = '{$City}' WHERE id = '{$sid}'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('Message' => 'Student Records UPDATED.', 'Status' => true));
    } else {
        echo json_encode(array('Message' => 'Student Records Not UPDATED.', 'Status' => false));
    }
} else {
    echo json_encode(array('Message' => 'Student ID not provided.', 'Status' => false));
}
?>

