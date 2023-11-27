<?php 
    include "../controllers/fecha-get-controller.php";

    class fechaGetServices{

        function fechaGet(){
            $objDB = new fechaGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["fecha"])){
                $data = $objDB->fechaByfecha($_GET["fecha"]);
            }else{
                $data = $objDB->listadofecha();
            }

            //Creamos Array que entregara un Json de resultado
            $fecha = array();
            $fecha["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "cod" => $row["cod"],
                        "fec" => $row["fecha"],
                        "hora" => $row["hora"],
                        "fecd" => $row["fechadevolucion"],
                        "obs" => $row["observacion"],
                        "san" => $row["sancion"]
                    );
                    array_push($fecha["data"], $item);  //  montamos el array temporal en JSON            
                }
                $fecha["msg"] = "OK";
                $fecha["error"] = "0";
                echo json_encode($fecha); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>

