<?php 
    include "../prestamo_controller_consultas_backend_api.php";


    class prestamosAPI{

        function getAllusuario(){
            $objDB = new ExtraerDatos();
            $data = array();

            if (isset($_GET["id"])){
                $data = $objDB->prestamosDetalle($_GET["id"]);
            }else{
                $data = $objDB->listadoprestamos();
            }

            $usuario = array();
            $usuario["data"] = array();

            if($data){
                foreach($data as $row){
                    $item = array(
                        "Codigo" => $row["cod"],
                        "Fecha" => $row["fecha"],                    
                        "Hora" => $row["hora"],
                        "Fecha Devolucion" => $row["fechadevolucion"],
                        "Observaciones" => $row["observacion"],
                        "Sanciones" => $row["sancion"],
                        
                    );
                    array_push($prestamo["data"], $item);                
                }
                $usuario["msg"] = "OK";
                $usuario["error"] = "0";
                echo json_encode($prestamos);
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"1", "msg"=>"NO hay datos", ));
            }
        }

        function saveEmpleado(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Guardar", ));
        }

        function updateEmpleado(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Actualizar", ));
        }

        function deleteEmpleado(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Eliminar", ));
        }

        function nullRequest(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Solicitud Nula", ));
        }




        
    }

?>
