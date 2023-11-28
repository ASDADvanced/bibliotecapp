<?php 
    include "../controllers/software-create-controller.php";

    class softwareCreteServices{    

        function savesoftware($datos){
            include "../config/config.php";
            
            if(isset($datos["ced"])){//verificar la existencia de envio de datos
                $objDB = new softwareCreateController();

                $data = array(
                    "cod"=> $datos["cod"],
                    "name"=> $datos["name"],
                    "systems"=> $datos["systems"],
                    "developer"=> $datos["developer"],
                    "requerimets"=> $datos["requerimets"],
                    "descripction"=> $datos["descripction"],
                    "price"=> $datos["price"]
                );

                $ejecucion = $objDB->savesoftwares($data);
                if($ejecucion){ // Todo se ejecuto correctamente
                    echo json_encode(array("data"=>null, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("data"=>null, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("data"=>null, "error"=>"5", "msg"=>$errorResponse[5] ));
            }
        }

    }

?>