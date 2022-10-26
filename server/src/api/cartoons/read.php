<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/cartoons.php";

$database = new Database();
$db = $database->getConnection();
$cartoon = new Cartoons($db);

$stmt = $cartoon->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    http_response_code(200);
    echo json_encode($result);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Мультфильмы не найдены."), JSON_UNESCAPED_UNICODE);
}