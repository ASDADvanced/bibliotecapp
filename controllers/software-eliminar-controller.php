<?php
session_start();
require_once( "../models/models_admin.php");

class dbsistema extends DBSoftware{

	function dbSistema($sql){
		$this->sotware();
		$this->conexion(); 
		  
  		$records = $this->dbSistema($sql);		 		  		  		  

  		$this->close();		
		return $records;				
	}
}

/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class softwareliminarController extends dbSistema
{
	function eliminarSoft($data){
        $ejecucion = $this->dbSistema("DELETE FROM SOTFWARE WHERE id= ".$data["idc"]);
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
