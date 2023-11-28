<?php 
    include "../controllers/softwareupdate-controller.php";    

    class SoftwareUpdateServices{    

        function updateSoftware($datos){
            include "../config/config.php";
            if(isset($datos["cod"])){//verificar la existencia de envio de datos
                
                $objDB = new softwareUpdateController();

                $datos = array(
                    "cod"=>$datos["cod"], 
                    "nombre"=> $datos["name"],
                    "systema"=> $datos["sistema"],
                    "developer"=> $datos["developer"],                    
                    "requerimientos"=>$datos["requerimientos"], 
                    "descriptions"=>$datos["descripcion"], 
                    "precio"=>$datos["precio"],
                 
                );

                $ejecucion = $objDB->UpdateSotfware($datos);
                if($ejecucion){ // Todo se ejecuto correctamente
                    echo json_encode(array("data"=>$datos, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("data"=>$datos, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("data"=>$datos, "error"=>"5", "msg"=>$errorResponse[5] ));
            }
        }

    }

?>