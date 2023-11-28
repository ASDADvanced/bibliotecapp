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
class softwaresUpdateController extends DBOperations
{
	
	function updateSoftwares($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				UPDATE software 
                SET name='".$data["name"]."', 
                    systems='".$data["systems"]."', 
                    developer=".$data["developer"].", 
                    requirements=".$data["requirements"].",
                    descripction='".$data["descripction"]."',
                    price='".$data["pricesssssss"]."'
                WHERE cod=".$data["cod"]."
                ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
