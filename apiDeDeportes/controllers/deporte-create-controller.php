<?php
session_start();
require_once("../models/models_admin.php");

class DBOperations extends DBConfig
{

	function dbOperaciones($sql)
	{
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
class deprteCreateController extends DBOperations
{

	function saveDeport($data)
	{
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
		$ejecucion = $this->dbOperaciones("
				INSERT INTO libros(cod, nombre, descripcion, reglas, fechaCreacion) 
                values('" . $data["cod"] . "', '" . $data["nombre"] . "', '" . $data["descripcion"] . "', '" . $data["reglas"] . "', '" . $data["fechaCreacion"] . "' ) ");
		return $ejecucion;
	}
} //fin CLASE