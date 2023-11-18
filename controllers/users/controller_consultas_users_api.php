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
	//MUESTRA LISTADO DE EMPLEADOS
	function listadoUsers($start = 0, $regsCant = 0)
	{
		$sql = "SELECT * FROM usuarios";
		if ($regsCant > 0)
			$sql = "SELECT * from usuarios $start,$regsCant";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function usersDetalle($idu)
	{
		$sql = "SELECT * from usuarios where pk_user=$idu ";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}

	function usersSearch($usuario)
	{
		$sql = "SELECT * from usuarios where usuario LIKE '%$usuario%' ";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}

	function saveUser($usuario, $password, $foto, $rol)
	{
		$passw = sha1($password);

		$ejecucion = $this->dbOperaciones("INSERT INTO usuarios(usuario,password,foto_user,rol)
														values('$usuario', '$passw', '$foto', $rol)");

		return $ejecucion;
	}

	function updateUser($id, $usuario, $rol)
	{
		// $passw = sha1($password);

		$ejecucion = $this->dbOperaciones("UPDATE usuarios SET usuario='$usuario', rol=$rol WHERE pk_user=$id");

		return $ejecucion;
	}

	function updatePasswordUser($id, $password)
	{
		$passw = sha1($password);

		$ejecucion = $this->dbOperaciones("UPDATE usuarios SET password='$passw' WHERE pk_user=$id");

		return $ejecucion;
	}

	function updateUserfoto($id, $usuario, $foto, $rol)
	{

		$ejecucion = $this->dbOperaciones("UPDATE usuarios SET usuario='$usuario', foto_user='$foto', rol=$rol WHERE pk_user=$id");

		return $ejecucion;
	}

	function deleteUser($id)
	{

		$ejecucion = $this->dbOperaciones("DELETE FROM usuarios WHERE pk_user=$id");

		return $ejecucion;
	}
}//fin CLASE