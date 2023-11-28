<?php
session_start();
require_once("../../models/models_admin.php");
class DBOperations extends DBConfig
{

	// GET
	function consulta_generales($sql)
	{
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
class ExtraerDatos extends DBOperations
{


	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
	//MUESTRA LISTADO DE EMPLEADOS
	function listadoSoftware($start = 0, $regsCant = 0)
	{
		$sql = "SELECT * FROM software";
		if ($regsCant > 0)
			$sql = "SELECT * FROM software $start,$regsCant";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function softwareDetalle($idu)
	{
		$sql = "SELECT * FROM software where cod=$idu ";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
}//fin CLASE