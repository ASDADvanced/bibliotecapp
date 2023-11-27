<?php 
    include "../controllers/prestamos_consultas_api.php";

    class prestamoGetServices{

        function prestamoGet(){
            $objDB = new prestamoGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])){
                $data = $objDB->prestamoById($_GET["id"]);
            }else{
                $data = $objDB->listadoprestamo();
            }

            //Creamos Array que entregara un Json de resultado
            $prestamos = array();
            $prestamos["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "Codigo" => $row["cod"],
                        "Fecha" => $row["fecha"],                    
                        "Hora" => $row["hora"],
                        "Fecha Devolucion" => $row["fechadevolucion"],
                        "Observaciones" => $row["observacion"],
                        "Sanciones" => $row["sancion"],
                        "id usuario" => $row["fk_id_usuario"],
                        "id libro" => $row["fk_id_libro"],
                        
                    );
                    array_push($prestamos["data"], $item);  //  montamos el array temporal en JSON            
                }
                $prestamos["msg"] = "OK";
                $prestamos["error"] = "0";
                echo json_encode($prestamos); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>
