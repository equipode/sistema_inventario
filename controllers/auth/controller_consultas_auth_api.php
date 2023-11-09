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
    function verificarLogin($idu)
    {
        $sql = "SELECT *
		        FROM usuarios p 
		        WHERE p.usuario='$idu'";
        $lista = $this->consulta_generales($sql);
        return $lista;
    }
}//fin CLASE