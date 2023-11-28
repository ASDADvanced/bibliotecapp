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
    //MUESTRA LISTADO DE CLIENTES
	function softwareClientes($start=0, $regsCant = 0){
		$sql = "SELECT * FROM software";
		if ($regsCant > 0 )
			 $sql = "SELECT * from software $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE Clientes SELECICONADA SEGUN ID
	function sofwaretesById($idu){
		$sql = "SELECT * from software where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}	
	
}//fin CLASE



?>
