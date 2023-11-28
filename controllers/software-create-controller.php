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
				INSERT INTO softwares(codigo, nombre, systema, desarrollador, requerimientoss, descripcion, precio) 
                values(".$data["cod"].", '".$data["name"]."', '".$data["systems"]."', ".$data["developer"].", ".$data["requeriments"]."', ".$data["descripction"].", ".$data["price"]." ) ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
