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
		$sql = "SELECT controlinv.pk_control, controlinv.salida, controlinv.entrada, controlinv.fecha_salida, 
		DATE_FORMAT(controlinv.hora_salida, '%h:%i %p') AS hora_salida, controlinv.fecha_entrada, 
		DATE_FORMAT(controlinv.hora_entrada, '%h:%i %p') AS hora_entrada, controlinv.product_fk, 
		 product.nombre_producto, product.foto_product
		FROM contros_inventario AS controlinv
		INNER JOIN productos AS product ON controlinv.product_fk=product.pk_prod 
		ORDER BY controlinv.pk_control DESC";
		if ($regsCant > 0)
			$sql = "SELECT controlinv.pk_control, controlinv.salida, controlinv.entrada, controlinv.fecha_salida, 
			DATE_FORMAT(controlinv.hora_salida, '%h:%i %p') AS hora_salida, controlinv.fecha_entrada, 
			DATE_FORMAT(controlinv.hora_entrada, '%h:%i %p') AS hora_entrada, controlinv.product_fk, 
			 product.nombre_producto, product.foto_product
			FROM contros_inventario AS controlinv
			INNER JOIN productos AS product ON controlinv.product_fk=product.pk_prod 
			ORDER BY controlinv.pk_control DESC $start,$regsCant";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function controlDetalle($idu)
	{
		$sql = "SELECT controlinv.pk_control, controlinv.salida, controlinv.entrada, controlinv.fecha_salida, 
		DATE_FORMAT(controlinv.hora_salida, '%h:%i %p') AS hora_salida, controlinv.fecha_entrada, 
		DATE_FORMAT(controlinv.hora_entrada, '%h:%i %p') AS hora_entrada, controlinv.product_fk, 
		 product.nombre_producto, product.foto_product
		FROM contros_inventario AS controlinv
		INNER JOIN productos AS product ON controlinv.product_fk=product.pk_prod 
		WHERE controlinv.pk_control=$idu";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}

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