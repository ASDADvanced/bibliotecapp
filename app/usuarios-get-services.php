<?php 
    include "../controllers/usuarios-get-controller.php"; // Asegúrate de tener el controlador correcto

    class UsuariosGetServices {
        
        function obtenerUsuarios() {
            $objDB = new UsuariosController(); // Asegúrate de tener el controlador correcto
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])) {
                $data = $objDB->usuarioid($_GET["id"]);
            } else {
                $data = $objDB->listadoUsuarios();
            }

            $usuarios = array();
            $usuarios["data"] = array();

            if ($data) {
                foreach ($data as $row) {
                    $item = array(
                        "id" => $row["id"],
                        "nombre" => $row["nombre"],
                        "correo" => $row["correo"],
                        "cedula" => $row["cc"],
                        "telefono" => $row["telefono"],
                        "direccion" => $row["direccion"],
                        "carrera" => $row["carrera"],
                        "user" => $row["user"],
                        "pasw" => $row["pasw"],
                        "fk_cod_tipousuario" => $row["fk_cod_tipousuario"]
                    );
                    array_push($usuarios["data"], $item);                
                }
                $usuarios["msg"] = "OK";
                $usuarios["error"] = "0";
                echo json_encode($usuarios);
                
            } else {
                $errorResponse = array(/* Define tus mensajes de error aquí */);
                echo json_encode(array("data" => null, "error" => "4", "msg" => $errorResponse[4]));
            }
        }
    }
?>
