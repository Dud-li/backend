<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/cartoons.php";

$database = new Database();
$db = $database->getConnection();
$cartoon = new Cartoons($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->name) &&
    !empty($data->description)
) {
    $cartoon->name = $data->name;
    $cartoon->description = $data->description;

    if ($cartoon->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Мультфильм был создан"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Невозможно создать мультфильм"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Невозможно создать мультфильм. Данные неполные."), JSON_UNESCAPED_UNICODE);
}