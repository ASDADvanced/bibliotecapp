<?php 
    include "../controllers/software-create-controller.php";

    class softwareCreteServices{    

        function saveSoftware($datos){
            include "../config/config.php";
            
            if(isset($datos["name"])){//verificar la existencia de envio de datos
                $objDB = new softwareCreateController();

                $data = array(
                    "name"=> $datos["name"],
                    "systems"=> $datos["systems"],
                    "developer"=> $datos["developer"],
                    "requiriments"=> $datos["requiriments"],
                    "price"=> $datos["price"]
                ); 

                $ejecucion = $objDB->saveSoftware($data);
                if($ejecucion){ // Todo se ejecuto correctamente
                    echo json_encode(array("data"=>$data, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("data"=>$data, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("data"=>$data, "error"=>"5", "msg"=>$errorResponse[5] ));
            }
        }

    }

?>