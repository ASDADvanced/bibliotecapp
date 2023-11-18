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
	
	function saveClientes($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO prestamos(codigo, fecha, hora, fechadevolucion, observacion, sancion, fk__id_usuario, fk_id_libro) 
                values(".$data["cod"].", '".$data["fecha"]."', '".$data["hora"]."', ".$data["fecdev"].", ".$data["obs"].",  ".$data["san"]." ) ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
