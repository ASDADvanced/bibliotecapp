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
class usuarioTipoController extends DBOperations
{
	
	function saveTUsuarios($data){
		
        $ejecucion = $this->dbOperaciones("
				UPDATE usuario
				SET rol=".$data["rol"]."
				WHERE id=".$data["id"]."
			");
		return $ejecucion;												   		
	} 
	
}//fin CLASE

//fin CLASE



?>
