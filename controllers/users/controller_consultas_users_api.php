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
	function listadoUsers($start=0, $regsCant = 0){
		$sql = "SELECT * FROM users";
		if ($regsCant > 0 )
			 $sql = "SELECT * from users $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function usersDetalle($idu){
		$sql = "SELECT * from users where pk_user=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	
	
}//fin CLASE

?>
