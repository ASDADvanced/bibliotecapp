<?php 
    include "../controllers/usuarios-create-controller.php";

    class usuarioCreteServices{    

        function saveCliente($datos){
            include "../config/config.php";
            
            if(isset($datos["ced"])){//verificar la existencia de envio de datos
                $objDB = new usuariosCreateController();

            

                $data = array(
                    "ced"=> $datos["ced"],
                    "nom"=> $datos["nom"],
                    "tel"=> $datos["tel"],
                    "dir"=> $datos["dir"],
                    "emai"=> $datos["emai"],
                    "carr"=> $datos["carr"],
                    "use"=> $datos["use"],
                    "pas"=> $datos["pas"],
                    "fk_tipo"=> $datos["fk_tipo"]
                );
            

                $ejecucion = $objDB->saveUsuario($data);
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