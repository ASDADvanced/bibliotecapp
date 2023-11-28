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
class softwareCreateController extends DBOperations
{
	
	function saveSoftware($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO software(name, systems, developer, requiriments, descripction, price) 
                values('".$data["name"]."', '".$data["systems"]."', '".$data["developer"]."', '".$data["requiriments"]."','".$data["price"]."' ) ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
