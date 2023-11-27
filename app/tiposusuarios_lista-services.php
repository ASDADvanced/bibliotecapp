<?php 
    include "../controllers/controller_consultas_api.php";

    class tipousuariosGetServices{

        function tipousuariosGet(){
            $objDB = new tipousuariosGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])){
                $data = $objDB->tipousuariosById($_GET["id"]);
            }else{
                $data = $objDB->listadousuariostipo();
            }

            //Creamos Array que entregara un Json de resultado
            $tipousuario = array();
            $tipousuario["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "code" => $row["cod"],
                        "name" => $row["nombre"],
                        
                    );
                    array_push($tipousuario["data"], $item);  //  montamos el array temporal en JSON            
                }
                $tipousuaro["msg"] = "OK";
                $tipousuario["error"] = "0";
                echo json_encode($tipousuario); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>
