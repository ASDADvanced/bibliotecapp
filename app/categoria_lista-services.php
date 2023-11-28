<?php 
    include "../controllers/controller_consultas_api.php";

    class categoriaGetServices{

        function categoriaGet(){
            $objDB = new categoriaGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])){
                $data = $objDB->categoriaById($_GET["id"]);
            }else{
                $data = $objDB->listadocategoria();
            }

            //Creamos Array que entregara un Json de resultado
            $categoria = array();
            $categoria["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "code" => $row["cod"],
                        "name" => $row["nombre"],
                        
                    );
                    array_push($categoria["data"], $item);  //  montamos el array temporal en JSON            
                }
                $categoria["msg"] = "OK";
                $categoria["error"] = "0";
                echo json_encode($categoria); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>