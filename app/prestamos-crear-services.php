<?php 
    include "../controllers/prestamos-create-controller.php";

    class prestamosCreteServices{    

        function saveCliente($datos){
            include "../config/config.php";
            
            if(isset($datos["ced"])){//verificar la existencia de envio de datos
                $objDB = new prestamosCreateController();

                $data = array(
                    "cod"=> $datos["cod"],
                    "fecha"=> $datos["fecha"],
                    "hora"=> $datos["hora"],
                    "fecha_devolucion"=> $datos["fecha_devolucion"],
                    "observacion"=> $datos["observacion"],
                    "sancion"=> $datos["sancion"],
                    "fk"=> $datos["observacion"],
                    "observacion"=> $datos["observacion"],
                    "fk_id_usuario"=> $datos["fk_id_usuario"],
                     "fk_id_libro"=> $datos["fk_id_libro"],
                );

                $ejecucion = $objDB->savePrestamos($data);
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
