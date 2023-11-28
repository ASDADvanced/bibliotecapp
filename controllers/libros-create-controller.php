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
class librosCreateController extends DBOperations
{
	
	function saveLibros($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO libros(isbn, titulo, descripcion, autor, edicion, ejemplar, estado)
                values(".$data["isbn"].", ".$data["titulo"].", ".$data["descripcion"].", ".$data["autor"].", ".$data["edicion"].", ".$data["ejemplar"].", ".$data["estado"]." ) ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
