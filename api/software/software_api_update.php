<?php
include "../../app/software/software-services.php";
include "../../config/config.php";
$objAPI = new productsAPI();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {

    case 'POST':
        $objAPI->updateSoftware();
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
