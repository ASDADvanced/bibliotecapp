<?php
session_start();
require_once( "../models/models_admin.php");

class ConsultasDB extends DBConfig {
    					
	function consulta_generales($sql){
		$this->config();
		$this->conexion(); 
		  
  		$records = $this->Consultas($sql);		 		  		  		  

  		$this->close();		
		return $records;				
	}
}


/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class ExtraerDatos extends ConsultasDB
{

		
	//MUESTRA LISTADO DE USUARIOS
	function listadoprestamos($start=0, $regsCant = 0){
		$sql = "SELECT * FROM prestamos";
		if ($regsCant > 0 )
			 $sql = "SELECT * from prestamo $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE USUARIOS SELECICONADA SEGUN ID
	function prestamosDetalle($idu){
		$sql = "SELECT * from prestamos where cod=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	//MUESTRA LISTADO DE EMPLEADOS
	function listadousuario($start=0, $regsCant = 0){
		$sql = "SELECT * FROM prestamos";
		if ($regsCant > 0 )
			 $sql = "SELECT * from prestamos $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function usuarioDetalle($idu){
		$sql = "SELECT * from prestamos where cod=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	

	
    function usuarios($usu){
		$sql = "SELECT * from user where usu=$usu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	
}//fin CLASE

?>