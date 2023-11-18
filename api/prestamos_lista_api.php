<?php
    include "../app/prestamos_lista-services.php";
    $objAPI = new usuarioAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllprestamos();                        
            break;

        case 'POST':
            $objAPI->saveuprestamos();
            break;

        case 'PUT':
            $objAPI->updateprestamos();
            break;

        case 'DELETE':
            $objAPI->deleteprestamos();
            break;

        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>