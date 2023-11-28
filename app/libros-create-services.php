<?php 
    include "../controllers/libros-create-controller.php";

    class librosCreateServices{    

        function saveLibros($datos){
            include "../config/config.php";
            
            if(isset($datos["titulo"])){//verificar la existencia de envio de datos
                $objDB = new librosCreateController();

                $data = array(
                    "isbn"=> $datos["isbn"],
                    "titulo"=> $datos["titulo"],
                    "descripcion"=> $datos["descripcion"],
                    "autor"=> $datos["autor"],
                    "edicion"=> $datos["edicion"],
                    "ejemplar"=> $datos["ejemplar"],
                    "estado"=> $datos["estado"]
                );

                $ejecucion = $objDB->saveLibros($data);
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