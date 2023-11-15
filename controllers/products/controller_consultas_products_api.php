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
	function listadoProducts($start=0, $regsCant = 0){
		$sql = "SELECT * FROM productos";
		if ($regsCant > 0 )
			 $sql = "SELECT * from productos $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function productsDetalle($idu){
		$sql = "SELECT * from productos where pk_prod=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	function saveProduc($referencia, $nombre_producto, $descripcion,$fotoproduct, $ubicacionBodega, $precio_product, $existencia, $stock, $estado){
		$objDBO = new DBConfig();
        $objDBO->config();
        $objDBO->conexion();

		$ejecucion = $objDBO->operaciones("INSERT INTO productos(referencia, nombre_producto, descripción, foto_produc, ubicacionBodega, precio_product, existencia, stock,estado)
														values('$referencia', '$nombre_producto', '$descripcion','$fotoproduct', '$ubicacionBodega', $precio_product, $existencia, $stock, $estado)");

		return $ejecucion;
	}

	function updateProduct($id,$usuario,$password,$foto,$rol){
		$objDBO = new DBConfig();
        $objDBO->config();
        $objDBO->conexion();
		$passw = sha1($password);

		$ejecucion = $objDBO->operaciones("UPDATE productos SET re='$usuario', password='$passw', foto_user='$foto', rol=$rol WHERE pk_user=$id");

		return $ejecucion;
	}

	function deleteUser($id){
		$objDBO = new DBConfig();
        $objDBO->config();
        $objDBO->conexion();

		$ejecucion = $objDBO->operaciones("DELETE usuarios WHERE pk_user=$id");

		return $ejecucion;
	}
		
	
}//fin CLASE

?>