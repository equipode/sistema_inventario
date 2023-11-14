<?php
session_start();
require_once("../../models/models_admin.php");
class ConsultasDB extends DBConfig
{

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
class ExtraerDatos extends ConsultasDB
{


	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
	//MUESTRA LISTADO DE EMPLEADOS
	function listadoControlinvetario($start = 0, $regsCant = 0)
	{
		$sql = "SELECT * FROM contros_inventario";
		if ($regsCant > 0)
			$sql = "SELECT * from contros_inventario $start,$regsCant";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function controlDetalle($idu)
	{
		$sql = "SELECT * from contros_inventario where pk_control=$idu ";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}


	// function usersSearch($usuario){
	// 	$sql = "SELECT * from usuarios where usuario LIKE '%$usuario%' ";
	// 	$lista = $this->consulta_generales($sql);	
	// 	return $lista;
	// }

	function saveControlinventario($salida, $fkProduc)
	{
		$objDBO = new DBConfig();
		$objDBO->config();
		$objDBO->conexion();

		$entrada = 0;
		$fecha_salida = date('Y-m-d');
		$hora_salida = date('H:i:s');
		$fecha_entrada = date('Y-m-d');
		$hora_entrada = date('H:i:s');

		$ejecucion = $objDBO->operaciones("INSERT INTO contros_inventario(salida, entrada, fecha_salida,  hora_salida, fecha_entrada, hora_entrada, product_fk)
														values($salida, $entrada, '$fecha_salida', '$hora_salida', '$fecha_entrada', '$hora_entrada', $fkProduc)");

		return $ejecucion;
	}

	function updateControlInv($id, $entrada)
	{
		$objDBO = new DBConfig();
		$objDBO->config();
		$objDBO->conexion();

		$fecha_entrada = date('Y-m-d');
		$hora_entrada = date('H:i:s');
		
		
		$ejecucion = $objDBO->operaciones("UPDATE contros_inventario SET entrada=$entrada, fecha_entrada='$fecha_entrada', hora_entrada='$hora_entrada' WHERE pk_control=$id");

		return $ejecucion;
	}

	

	function deleteControlInv($id)
	{
		$objDBO = new DBConfig();
		$objDBO->config();
		$objDBO->conexion();

		$ejecucion = $objDBO->operaciones("DELETE FROM contros_inventario WHERE pk_control=$id");

		return $ejecucion;
	}
}//fin CLASE