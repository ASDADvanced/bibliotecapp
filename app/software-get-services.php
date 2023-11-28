<?php 
    include "../controllers/software-get-controller.php";

    class softwareGetServices{

        function softwareGet(){
            $objDB = new softwareGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])){
                $data = $objDB->softwareById($_GET["id"]);
            }else{
                $data = $objDB->listadosoftware();
            }

            //Creamos Array que entregara un Json de resultado
            $softwares = array();
            $softwares["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "codigo" => $row["cod"],
                        "nombre" => $row["name"],
                        "sistema" => $row["systems"],
                        "desarrolador" => $row["developer"],
                        "requerimientos" => $row["requeriments"],
                        "descripcion" => $row["descripction"],
                        "precio" => $row["price"]
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

