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
class softwaresDeleteController extends DBOperations
{
	function deleteSoftwares($data){
        $ejecucion = $this->dbOperaciones("DELETE FROM Softwares WHERE cod= ".$data["cod"]);
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
