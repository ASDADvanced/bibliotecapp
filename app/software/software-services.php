<?php
include "../../controllers/software/controller_consultas_software_api.php";
include '../../validations/validateCampos.php';


class softwareAPI
{
    function getAllSoftware()
    {
        include '../../config/config.php';
        $objDB = new ExtraerDatos();
        $data = array();

        if (isset($_GET["id"])) {
            $data = $objDB->softwareDetalle($_GET["id"]);
        } else {
            $data = $objDB->listadoSoftware();
        }

        $software = array();
        $software["data"] = array();

        if ($data) {
            foreach ($data as $row) {
                $item = array(
                    "pk" => $row["cod"],
                    "nombre" => $row["name"],
                    "sistem" => $row["systems"],
                    "develop" => $row["developer"],
                    "requerimientos" => $row["requeriments"],
                    "descripcion" => $row["description"],
                    "price" => $row["price"],
                );
                array_push($software["data"], $item);
            }
            $software["msg"] = "OK";
            $software["error"] = "0";
            echo json_encode($software);
        } else {
            echo json_encode(array("data" => null, "error" => "4", "msg" => $errorResponse[4]));
        }
    }
}
