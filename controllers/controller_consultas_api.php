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

	function Operaciones($sql)
	{
		$obj = new DBConfig();

		$obj->config();
		$obj->conexion();

		$records = $obj->Operaciones($sql);

		$obj->close();
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
	//TAREA DE GUETTE
	function get_all_software()
	{
		$sql = 
			"SELECT
				*
			FROM
				software";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//INSERTAR SOFTWARE
	function insert_software($name, $systems, $developer, $requirements, $description, $price)
	{
		$sql = "INSERT INTO software 
					(name, systems, developer, requirements, description, price) 
				VALUES 
					('$name', '$systems', '$developer', '$requirements', '$description', $price)";
		return $this->Operaciones($sql);
	}

	//CONSULTAR SOFTWARE
	function get_software_by_id($id)
	{
		$sql = 
			"SELECT
				*
			FROM
				software
			WHERE
				cod = $id";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//ELIMINAR SOFTWARE
	function delete_software($id)
	{
		$sql = 
			"DELETE FROM
				software
			WHERE
				cod = $id";
		return $this->Operaciones($sql);
	}

}//fin CLASE

?>
