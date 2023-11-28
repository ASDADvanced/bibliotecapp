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

class softwareGetController extends ConsultasDB
{
	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
    //MUESTRA LISTADO DE SOFTWARE
	function listadoSoftwares($start=0, $regsCant = 0){
		$sql = "SELECT * FROM Software";
		if ($regsCant > 0 )
			 $sql = "SELECT * from Software $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE SOFTWARE SELECICONADA SEGUN ID
	function SoftwaresById($cod){
		$sql = "SELECT * from Softwares where cod=$cod ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}	
	
}//fin CLASE



?>
