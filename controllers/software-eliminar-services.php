<?php 
    include "../controllers/software-eliminar-controller.php";    

    class SoftwareEliminarServices{    

        function eliminarSoftware($nomb){
            include "../config/config.php";
            
            if(isset($nomb["cods"])){//verificar la existencia de envio de datos
                $objDB = new SoftwareEliminarController();

                $nomb = array(
                    "cods"=> $nomb["cods"]
                    
                );

                $ejecucion = $softDB->eliminarSoftware($nomb);
                if($ejecucion){ // Todo se ejecuto correctamente
                    echo json_encode(array(""=>null, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("nomb"=>null, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("nomb"=>null, "error"=>"5", "msg"=>$errorResponse[5]));
            }
        }

    }

?>