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

class fechaGetController extends ConsultasDB
{
	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
    //MUESTRA LISTADO DE prestamos
	function listadofecha($start=0, $regsCant = 0){
		$sql = "SELECT * FROM prestamos";
		if ($regsCant > 0 )
			 $sql = "SELECT * from prestamos $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE prestamos SELECICONADA SEGUN fecha
	function fechaByfecha($idu){
		$sql = "SELECT * from prestamos where fecha=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}	



}//fin CLASE



?>


