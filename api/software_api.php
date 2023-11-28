<?php
    include "../app/usuarios-get-services.php"; // Asegúrate de tener el servicio correcto
    include "../config/config.php";

    $objAPI = new UsuariosGetServices(); // Asegúrate de tener el servicio correcto

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");

    if ($method == 'DELETE') {
        $objAPI->deleteSoftware();
    } else {
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
    }
?>
