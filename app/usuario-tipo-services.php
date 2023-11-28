<?php 
    include "../controllers/usuario-tipo-controller.php";

    class usuarioTipoServices{    

        function saveTUsuario($datos){
            include "../config/config.php";

            error_log("Datos recibidos en saveTUsuario: " . json_encode($datos));
            
            if(isset($datos["id"])){//verificar la existencia de envio de datos
                $objDB = new usuarioTipoController();

                $data = array(
                    "id" => $datos["id"],
                    "rol" => $datos["rol"]
                );

                $ejecucion = $objDB->saveTUsuarios($data);
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