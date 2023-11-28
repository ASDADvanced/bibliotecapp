<?php
include "../../controllers/software/controller_consultas_software_api.php";
include "../../validations/validateCampos.php";

class softwareAPI
{

    function getAllSoftware()
    {
        $objDB = new ExtraerDatos();
        $data = array();

        if (isset($_GET["cod"])) {
            $data = $objDB->softwareDetalle($_GET["cod"]);
        } else {
            $data = $objDB->listadoSoftware();
        }

        $products = array();
        $products["data"] = array();

        if ($data) {
            foreach ($data as $row) {
                $item = array(
                    "cod_software" => $row["cod"],
                    "nom" => $row["name"],
                    "sistema" => $row["systems"],
                    "dev" => $row["developer"],
                    "req" => $row["requeriments"],
                    "descr" => $row["description"],
                    "precio" => $row["price"]
                );
                array_push($products["data"], $item);
            }
            $products["msg"] = "OK";
            $products["error"] = "0";
            echo json_encode($products);
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "NO hay datos de productos :(",));
        }
    }

    function saveSoftware()
    {
        $objDB = new ExtraerDatos();

        $name = validarCampo('nom', 'nom');
        $systema = validarCampo('sistema', 'sistema');
        $developer = validarCampo('dev', 'dev');
        $requeriments = validarCampo('req', 'req');
        $description = validarCampo('descr', 'descr');
        $price = validarCampo('precio', 'precio');

        $ejecucion = $objDB->saveSoftware($name, $systema, $developer, $requeriments, $description, $price);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Producto Guardado",));
        } else {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "error al guardar",));
        }
    }

    function updateSoftware()
    {
        $objDB = new ExtraerDatos();

        $codigo = validarCampo('cod', 'cod');
        $name = validarCampo('nom', 'nom');
        $systema = validarCampo('sistema', 'sistema');
        $developer = validarCampo('dev', 'dev');
        $requeriments = validarCampo('req', 'req');
        $description = validarCampo('descr', 'descr');
        $price = validarCampo('precio', 'precio');

        $ejecucion = $objDB->updateSoftware($name, $systema, $developer, $requeriments, $description, $price);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Producto actualizado :)",));
        } else {

            echo json_encode(array("data" => null, "error" => "0", "msg" => "error al Actualizar",));
        }
    }

    function deleteSoftware()
    {
        $objDB = new ExtraerDatos();

        $codigo = validarCampo('cod_software', 'cod_software');

        $ejecucion = $objDB->deleteSoftware($codigo);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "producto eliminado :)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo eliminar el producto :(",));
        }
    }
    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
