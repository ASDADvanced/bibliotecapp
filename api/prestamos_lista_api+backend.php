<?php
include "../app/html_head.php";
include "../app/prestamos_lista_api+backend-services.php";
include "../config/config.php";

$objAPI = new prestamoGetServices();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = $objAPI->prestamoGet();
    renderHTML($data);
} else {
    echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
}

function renderHTML($data)
{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
            }

            #container {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            #logo {
                max-width: 100%;
                height: auto;
            }

            h1, p {
                text-align: center;
                margin-bottom: 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
        <title>Lista de Préstamos</title>
    </head>
    <body>
        <div id="container">
            <img id="logo" src="../logo/infotep.png" alt="Logo de la universidad">
            <h1>Lista de Préstamos</h1>
            <p>IES INFOTEP | Desarrollado por Jeiner Cantillo</p>
            <table>
                <thead>
                    <tr>
                        <?php
                        foreach ($data[0] as $key => $value) {
                            echo "<th>{$key}</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $prestamo) {
                        echo "<tr>";
                        foreach ($prestamo as $value) {
                            echo "<td>{$value}</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
}
?>
