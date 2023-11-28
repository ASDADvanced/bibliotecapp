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
	
	function updateUsuarios($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				UPDATE usuario 
				SET 
					user='".$data["user"]."', 
					pass='".$data["pass"]."', 
					correo='".$data["correo"]."', 
					cc='".$data["cc"]."',
					nombre='".$data["nombre"]."',
					telefono='".$data["telefono"]."',
					direccion='".$data["direccion"]."',
					programa='".$data["programa"]."'
				WHERE id=".$data["id"]."
				");

				
		return $ejecucion;													   		
	}
	
}//fin CLASE



?>
