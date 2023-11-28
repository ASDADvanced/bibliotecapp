<?php 
    include "../controllers/software-listados-controller.php";

    class softwareGetServices{

        function softwareGet(){
            $objDB = new softwareGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["cod"])){
                $data = $objDB->SoftwareById($_GET["cod"]);
            }else{
                $data = $objDB->listadoSoftware();
            }

            //Creamos Array que entregara un Json de resultado
            $usuario = array();
            $usuario["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "cod" => $row["cod"],
                        "name" => $row["name"],
                        "systems" => $row["systems"],
                        "developer" => $row["developer"],
                        "requirements" => $row["requirements"],
                        "descripction" => $row["descripction"],
                    );
                    array_push($usuario["data"], $item);  //  montamos el array temporal en JSON            
                }
                $usuario["msg"] = "OK";
                $usuario["error"] = "0";
                echo json_encode($usuario); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>