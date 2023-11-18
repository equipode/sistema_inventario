<?php
include "../../controllers/users/controller_consultas_users_delete.php";

class usersAPI
{
    function deleteUser($datos)
    {



        if ($datos) {

            if (isset($datos['iduser'])) {
                $id = $datos['iduser'];
                $objDB = new ExtraerDatos();

                $ejecucion = $objDB->deleteUser($id);

                if ($ejecucion) {
                    echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario eliminado :)",));
                } else {
                    echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo eliminar :(",));
                }
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "Falta el iduser",));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Faltan datos",));
        }
    }
}
