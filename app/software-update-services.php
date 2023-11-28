<?php 
    include "../controllers/software-update-controller.php";    

    class softwaresUpdateServices{    

        function updateSoftware($datos){
            include "../config/config.php";
            if(isset($datos["cod"])){//verificar la existencia de envio de datos
                $objDB = new softwaresUpdateController();

                $data = array(
                    "cod"=> $datos["cod"],
                    "name"=> $datos["name"],
                    "systems"=> $datos["systems"],
                    "developer"=> $datos["developer"],
                    "requirements"=> $datos["requirements"],
                    "descripction"=> $datos["descripction"],
                    "price"=> $datos["price"]
                );

                $ejecucion = $objDB->updateSoftwares($data);
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