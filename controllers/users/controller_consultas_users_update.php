<?php
session_start();
require_once("../../models/models_admin.php");
class DBOperations extends DBConfig
{

	// CREAR, UPDATE, DELETE
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
class ExtraerDatos extends DBOperations
{


	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
	function updateUser($id, $usuario, $rol)
	{
		// $passw = sha1($password);

		$ejecucion = $this->dbOperaciones("UPDATE usuarios SET usuario='$usuario', rol=$rol WHERE pk_user=$id");

		return $ejecucion;
	}

	function updateUserfoto($id, $usuario, $foto, $rol)
	{

		$ejecucion = $this->dbOperaciones("UPDATE usuarios SET usuario='$usuario', foto_user='$foto', rol=$rol WHERE pk_user=$id");

		return $ejecucion;
	}

}//fin CLASE