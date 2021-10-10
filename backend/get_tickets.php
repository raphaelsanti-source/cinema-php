<?php
require '../config/config.php';

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$sql = "SELECT * FROM tickets";
$result = mysqli_query($link, $sql);

$response = array();
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}
echo json_encode($response);
