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
	
	function savesoftware($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO software( name, systems, developer, requerimients, descripction,price) 
                values(".$data["cod"].", '".$data["name"]."', '".$data["system"]."', ".$data["developer"].", ".$data["requerimient"].", ".$data["des"].", ".$data["price"].") ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
