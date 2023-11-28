<?php 
    include "../controllers/software-crear-controller.php";

    class crearServices{    

        function savecrear($datos){
            include "../config/config.php";
            
            if(isset($datos["cod"])){//verificar la existencia de envio de datos
                $objDB = new crearController();

                $data = array(
                    "code"=> $datos["cod"],
                    "name"=> $datos["name"],
                    
                );

                $ejecucion = $objDB->savecrear($data);
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