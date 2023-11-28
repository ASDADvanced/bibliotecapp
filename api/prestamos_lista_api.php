<?php
    include "../app/prestamos_lista-services.php";
    include "../config/config.php";
    
    $objAPI = new prestamoGetServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'GET') {
            $objAPI->prestamoGet();                          
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }    
?>
