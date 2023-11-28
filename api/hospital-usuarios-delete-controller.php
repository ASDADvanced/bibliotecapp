?php 
    include "../controllers/usuarios-delete-controller.php";    

    class usuariosDeleteServices{    

        function deleteUsuarios($datos){
            include "../config/config.php";
            
            if(isset($datos["idc"])){//verificar la existencia de envio de datos
                $objDB = new usuariosDeleteController();

                $data = array(
                    "idc"=> $datos["idc"]
                );

                $ejecucion = $objDB->deleteUsuarios($data);
                if($ejecucion){ // Todo se ejecuto correctamente
                    echo json_encode(array("data"=>null, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("data"=>null, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("data"=>null, "error"=>"5", "msg"=>$errorResponse[5]));
            }
        }

    }

?>
