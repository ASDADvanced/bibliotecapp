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
				
					cod='".$data["codigo"]."', 
					nombre='".$data["nombre"]."', 
					sistema='".$data["sistema"]."', 
					developer='".$data["developer"]."',
					requerimientos='".$data["requerimientos"]."',
					descriptions='".$data["descripcion"]."',
					precio='".$data["precio"]."',
					
				");

				
		return $ejecucion;													   		
	}
	
}//fin CLASE



?>