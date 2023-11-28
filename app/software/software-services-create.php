<?php
include "../../controllers/software/controller_consultas_software_create.php";

class softwaresAPI
{
    function saveSoftware($datos)
    {
        if ($datos) {

            if (isset($datos['name'])) {
                $objDB = new ExtraerDatos();

                $name = $datos['name'];
                $systems = $datos['systems'];
                $developer = $datos['developer'];
                $requirements = $datos['requirements'];
                $descripction = $datos['descripction'];
                $price = $datos['price'];

                $ejecucion = $objDB->saveSoftware($name, $systems, $developer, $requirements, $descripction, $price);

                if ($ejecucion) {
                    echo json_encode(array("data" => null, "error" => "0", "msg" => "Registro Guardado :)",));
                } else {
                    echo json_encode(array("data" => null, "error" => "1", "msg" => "error al registrar :(",));
                }
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "Falta el cod",));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Faltan datos",));
        }
    }
}
