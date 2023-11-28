<?php 
    include "../controllers/usuario-get-controller.php";

    class usuarioGetServices{

        function softwareGet(){
            $objDB = new usuarioGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])){
                $data = $objDB->softwareById($_GET["id"]);
            }else{
                $data = $objDB->listadousuario();
            }

            //Creamos Array que entregara un Json de resultado
            $softwares = array();
            $softwares["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "ced" => $row["ced"],
                        "nombre" => $row["nom"],
                        "cama" => $row["cama"],
                        "habitacion" => $row["habitacion"],
                        "procedimientos" => $row["procedimientos"],
                        "entidad" => $row["entidad"],
                        "prestador" => $row["prestador"]
                    );
                    array_push($softwares["data"], $item);  //  montamos el array temporal en JSON            
                }
                $softwares["msg"] = "OK";
                $softwares["error"] = "0";
                echo json_encode($programa); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>
