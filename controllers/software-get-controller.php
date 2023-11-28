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
class softwareUpdateController extends DBOperations
{
	
	function updateSoftware($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				UPDATE oftware 
				SET 
					cod='".$data["cod"]."', 
					name='".$data["name"]."', 
					systems='".$data["systems"]."', 
					developer='".$data["developer"]."',
					requirements='".$data["requirements"]."',
					descripction='".$data["descripction"]."',
					price='".$data["price"]."',
				WHERE id=".$data["cod"]."
				");

				
		return $ejecucion;													   		
	}
	
}//fin CLASE



?>