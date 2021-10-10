<?php
require '../config/config.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$str = "";

foreach ($data as $key => $value) {
    if ($key == 0) $str .= "('$value->movie_id', '$value->user_id', '$value->seat')";
    else $str .= ",('$value->movie_id', '$value->user_id', '$value->seat')";
};

$sql = "INSERT INTO tickets (movie, user, seat) VALUES " . $str;
$result = mysqli_query($link, $sql);
echo $result;
