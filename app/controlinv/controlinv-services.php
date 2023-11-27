<?php
include "../../controllers/controlinv/controller_consultas_controlinv_api.php";
include '../../validations/validateCampos.php';

class controlInvAPI
{

    function getAllControlInvs()
    {
        $objDB = new ExtraerDatos();
        $data = array();

        if (isset($_GET["id"])) {
            $data = $objDB->controlDetalle($_GET["id"]);
        } else {
            $data = $objDB->listadoControlinvetario();
        }

        $controlInvs = array();
        $controlInvs["data"] = array();

        if ($data) {
            foreach ($data as $row) {
                $item = array(
                    "pk_cont" => $row["pk_control"],
                    "cantidad_salida" => $row["salida"],
                    "cantidad_entrada" => $row["entrada"],
                    "fecha_ingreso" => $row["fecha_entrada"],
                    "hora_ingreso" => $row["hora_entrada"],
                    "fecha_egreso" => $row["fecha_salida"],
                    "hora_egreso" => $row["hora_salida"],
                    "productofk" => $row["product_fk"],
                    "nombre_product" => $row["nombre_producto"],
                    "photo_producto" => $row["foto_product"],
                );
                array_push($controlInvs["data"], $item);
            }
            $controlInvs["msg"] = "OK";
            $controlInvs["error"] = "0";
            echo json_encode($controlInvs);
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "NO hay  datos del control de inventario",));
        }
    }


    function saveControlInv()
    {
        $objDB = new ExtraerDatos();

        $salida = validarCampo('salid', 'salid');
        $producfk = validarCampo('fkproducto', 'fkproducto');


        $ejecucion = $objDB->saveControlinventario($salida, $producfk);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "salida reportada:)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo reportar salida:(",));
        }
    }




    function updateControlInv()
    {
        $objDB = new ExtraerDatos();

        $entrada = validarCampo('entrada', 'entrada');
        $id_control = validarCampo('id_control', 'id_control');


        $ejecucion = $objDB->updateControlInv($id_control, $entrada);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "entrada reportada:)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo reportar la entrada:(",));
        }
    }

    function deleteControlInv()
    {
        $objDB = new ExtraerDatos();

        $id_control = validarCampo('id_control', 'id_control');


        $ejecucion = $objDB->deleteControlInv($id_control);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "se eliminó el reporte:)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo eliminar el reporte:(",));
        }
    }



    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
