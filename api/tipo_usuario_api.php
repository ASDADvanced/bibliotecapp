<?php
    include "../app/tiposusuarios_lista-services.php";
    include "../config/config.php";
    
    $objAPI = new tipousuariosGetServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'GET') {
            $objAPI->tipousuariosGet();                          
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }    
?>
