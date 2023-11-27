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
class usuariosCreateController extends DBOperations
{
	
	function saveUsuario($data){

		$ced = $data['ced'];
		$nom = $data['nom'];
		$tel = $data['tel'];
		$dir = $data['dir'];
		$emai = $data['emai'];
		$carr = $data['carr'];
		$use = $data['use'];
		$pas = $data['pas'];
		$fk_tipo = $data['fk_tipo'];
		
        $ejecucion = $this->dbOperaciones("INSERT INTO usuarios(cc, nombre, telefono, direccion, email, carrera, user, pasw, fk_cod_tipousuario) 
                values('$ced', '$nom', '$tel', '$dir', '$emai', '$carr', '$use', '$pas', $fk_tipo)");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
