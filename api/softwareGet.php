<?php
    include "../app/sotware-listados-service.php";
    include "../config/config.php";
    
    $objAPI = new softwareGetServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'GET') {
            $objAPI->softwareGet();                          
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }    
?>      

        