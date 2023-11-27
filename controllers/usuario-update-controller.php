<?php
session_start();
require_once( "../models/models_admin.php");

class DBOperations extends DBConfig {

	function dbOperaciones($sql){
		$this->config();
		$this->conexion(); 
		  
  		$records = $this->Operaciones($sql);		 		  		  		  

  		$this->close();		
		return $records;				
	}
}

/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class usuarioUpdateController extends DBOperations
{
	
	function updateUsuario($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
        INSERT INTO usuario(user, pass, correo, rol) 
        values('".$data["user"]."', '"."', '".$data["email"]."', '".$data["rol"]."' ) ");
return $ejecucion;													   		
	}
	
}//fin CLASE



?>
