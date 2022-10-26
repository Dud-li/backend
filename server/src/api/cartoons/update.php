<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PATCH");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/cartoons.php";

$database = new Database();
$db = $database->getConnection();
$cartoon = new Cartoons($db);

$data = json_decode(file_get_contents("php://input"));

$cartoon->id = $_GET["id"] ?? die();

if (!empty($data->name)) {
    $cartoon->name = $data->name;
}
if (!empty($data->description)) {
    $cartoon->description = $data->description;
}

if ($cartoon->update()) {
    http_response_code(200);

    echo json_encode(array("message" => "Мультфильм был обновлён"), JSON_UNESCAPED_UNICODE);
} else {
    http_response_code(503);

    echo json_encode(array("message" => "Невозможно обновить мультфильм"), JSON_UNESCAPED_UNICODE);
}