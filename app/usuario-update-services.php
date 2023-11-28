<?php 
    include "../controllers/usuario-update-controller.php";    

    class usuarioUpdateServices{    

        function updateUsuario($datos){
            include "../config/config.php";
            if(isset($datos["id"])){//verificar la existencia de envio de datos
                
                $objDB = new usuarioUpdateController();

                $datos = array(
                    "cc"=>$datos["cc"], 
                    "user"=> $datos["user"],
                    "correo"=> $datos["correo"],
                    "pass"=> $datos["pass"],                    
                    "nombre"=>$datos["nombre"], 
                    "direccion"=>$datos["direccion"], 
                    "telefono"=>$datos["telefono"],
                    "programa"=>$datos["programa"],
                    "id"=>$datos["id"]
                );

                $ejecucion = $objDB->updateUsuarios($datos);
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