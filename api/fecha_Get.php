<?php
    include "../app/fecha-get-services.php";
    include "../config/config.php";
    
    $objAPI = new fechaGetServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'GET') {
            $objAPI->fechaGet();                          
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }    
?>