<?php
include "../controllers/deporte-create-controller.php";

class deprteCreteServices
{

    function saveDeporte($datos)
    {
        include "../config/config.php";

        if (isset($datos["cod"])) { //verificar la existencia de envio de datos clientes
            $objDB = new deprteCreateController();

            $data = array(
                "cod" => $datos["cod"],
                "nombre" => $datos["nombre"],
                "descripcion" => $datos["descripcion"],
                "reglas" => $datos["reglas"],
                "fechaCreacion" => $datos["fechaCreacion"]
            );

            $ejecucion = $objDB->saveDeport($data);
            if ($ejecucion) { // Todo se ejecuto correctamente
                echo json_encode(array("data" => null, "error" => "0", "msg" => $errorResponse[0]));
            } else { // Algo paso mal
                echo json_encode(array("data" => null, "error" => "10", "msg" => $errorResponse[10]));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "5", "msg" => $errorResponse[5]));
        }
    }
}
