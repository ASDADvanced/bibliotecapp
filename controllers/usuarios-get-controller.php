<?php
session_start();
require_once("../models/models_admin.php");

class UsuariosDB extends DBConfig {
    function consultaGenerales($sql){
        $this->config();
        $this->conexion(); 

        $records = $this->Consultas($sql);

        $this->close();        
        return $records;                
    }
}

class UsuariosController extends UsuariosDB {
    // Muestra el listado de usuarios
    function listadoUsuarios($start = 0, $regsCant = 0){
        $sql = "SELECT * FROM usuarios";
        if ($regsCant > 0 )
             $sql = "SELECT * FROM usuarios LIMIT $start, $regsCant";
        $lista = $this->consultaGenerales($sql);    
        return $lista;
    }

    // Detalle de usuario seleccionado por ID
    function usuarioid($id){
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $usuario = $this->consultaGenerales($sql);       
        return $usuario;
    }   
}

?>
