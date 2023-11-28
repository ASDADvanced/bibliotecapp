<?php
include "../../app/software/software-services-create.php";
include '../../config/config.php';
$objAPI = new softwaresAPI();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $objAPI->saveSoftware($_POST);
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
