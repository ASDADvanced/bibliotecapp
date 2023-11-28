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
class clientesCreateController extends DBOperations
{
	
	function savesoftware($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO software(cod, name, systems, developer, requeriments, description, price) 
                values(".$data["cod"].", '".$data["nam"]."', '".$data["dsysir"]."', ".$data["dev"].", ".$data["req"]."$data["des"]."$data["pri"]." ) ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
