<?php
    include "../app/prestamos_lista-services.php";
    $objAPI = new prestamosAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllprestamos();                        
            break;

        case 'POST':
            $objAPI->saveuprestamo();
            break;

        case 'PUT':
            $objAPI->updateprestamo();
            break;

        case 'DELETE':
            $objAPI->deleteprestamo();
            break;

        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>
