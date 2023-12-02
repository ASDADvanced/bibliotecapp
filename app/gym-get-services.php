<?php 
    include "../controllers/gym-get-controller.php";

    class gymGetServices{

        function gymGet(){
            $objDB = new gymGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["cod"])){
                $data = $objDB->planesBycod($_GET["cod"]);
            }else{
                $data = $objDB->planes();
            }

            //Creamos Array que entregara un Json de resultado
            $planes = array();
            $planes["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "cod" => $row["codigo"],
                        "Nomplan" => $row["nombrePlan"],
                        "feinic" => $row["fechaInicio"],
                        "fefin" => $row["fechaFin"],
                        "desc" => $row["descripcion"],
                        "obj" => $row["objetivo"],
                    
                    );
                    array_push($planes["data"], $item);  //  montamos el array temporal en JSON            
                }
                $planes["msg"] = "OK";
                $planes["error"] = "0";
                echo json_encode($planes); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>

