<?php 
include "../controllers/prestamos_consultas_api.php";

class prestamoGetServices {

    function prestamoGet() {
        $objDB = new prestamoGetController();
        $data = array();
        include "../config/config.php";

        if (isset($_GET["id"])) {
            $data = $objDB->prestamoById($_GET["id"]);
        } else {
            $data = $objDB->listadoprestamo();
        }

        if ($data) {
            return $data;
        } else {
            return array();
        }
    }
}
?>
