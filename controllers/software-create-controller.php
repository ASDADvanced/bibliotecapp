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

		$id = $data['id'];
		$nom = $data['nom'];
		$sys = $data['sys'];
		$dev = $data['dev'];
		$req = $data['req'];
		$des = $data['des'];
		$pri = $data['pri'];
				
        $ejecucion = $this->dbOperaciones("INSERT INTO software(cod, name, systems, devoloper, requirements, descripcion, price) 
                values($id, '$nom', '$sys', '$dev', '$req', '$des', '$pri')");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
