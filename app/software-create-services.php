<?php 
    include "../controllers/software-create-controller.php";

    class softwareCreteServices{    

        function saveSoftware($datos){
            include "../config/config.php";
            
            if(isset($datos["id"])){//verificar la existencia de envio de datos
                $objDB = new softwareCreateController();

            

                $data = array(
                    
                    "id"=> $datos["id"],
                    "nom"=> $datos["nom"],
                    "sys"=> $datos["sys"],
                    "dev"=> $datos["dev"],
                    "req"=> $datos["req"],
                    "des"=> $datos["des"],
                    "pri"=> $datos["pri"]
                  
                );
            

                $ejecucion = $objDB->saveSoftware($data);
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