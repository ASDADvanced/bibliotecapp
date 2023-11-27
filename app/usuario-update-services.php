<?php 
    include "../controllers/usuario-update-controller.php";    

    class usuarioUpdateServices{    

        function updateUsuario($datos){
            include "../config/config.php";
            if(isset($datos["1"])){//verificar la existencia de envio de datos
                $objDB = new usuarioUpdateController();

                $datos = array(
                    "cc"=>$datos["ced"], 
                    "user"=> $datos["user"],
                    "correo"=> $datos["email"],
                    "pass"=> $datos["pass"],
                    "rol"=> $datos["rol"],
                    
                    "nombre"=>$datos["nom"], 
                    "direccion"=>$datos["dir"], 
                    "telefono"=>$datos["tel"],
                    "programa"=>$datos["prog"],
                    "id"=>$datos["id"]
                );

                $ejecucion = $objDB->updateUsuario($datos);
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