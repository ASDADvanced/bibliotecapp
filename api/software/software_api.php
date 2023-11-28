<?php
include "../../app/software/software-services.php";
include "../../config/config.php";
$objAPI = new productsAPI();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $objAPI->getAllSoftware();
        break;

    case 'POST':
        $objAPI->saveSoftware();
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
