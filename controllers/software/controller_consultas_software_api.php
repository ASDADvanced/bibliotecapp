<?php
session_start();
require_once( "../../models/models_admin.php");
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
			

	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
    //MUESTRA LISTADO DE EMPLEADOS
	function listadoSoftware($start=0, $regsCant = 0){
		$sql = "SELECT * FROM software";
		if ($regsCant > 0 )
			 $sql = "SELECT * from software $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function softwareDetalle($idu){
		$sql = "SELECT * from software where cod=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	function saveSotfware($name, $systema, $developer, $requeriments, $description, $price){
		$objDBO = new DBConfig();
        $objDBO->config();
        $objDBO->conexion();

		$ejecucion = $objDBO->operaciones("INSERT INTO software(name, systems, developer, requeriments, description, price)
														values('$name', '$systema', '$developer','$requeriments', '$description', $price)");

		return $ejecucion;
	}

	

	function updateSoftware($name, $systema, $developer, $requeriments, $description, $price){
		$objDBO = new DBConfig();
        $objDBO->config();
        $objDBO->conexion();

		$ejecucion = $objDBO->operaciones("UPDATE software SET name='$name', systems='$systema', developer='$developer', requeriments='$requeriments', description='$description', price=$price WHERE cod=$codigo");

		return $ejecucion;
	}

	function deleteSoftware($codigo){
		$objDBO = new DBConfig();
        $objDBO->config();
        $objDBO->conexion();

		$ejecucion = $objDBO->operaciones("DELETE FROM software WHERE cod=$codigo");

		return $ejecucion;
	}
		
	
}//fin CLASE

?>