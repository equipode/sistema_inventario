<?php
include "../../controllers/users/controller_consultas_users_delete.php";

class usersAPI
{
    function deleteUser($datos)
    {

        $id = $datos['iduser'];

        $objDB = new ExtraerDatos();

        $ejecucion = $objDB->deleteUser($id);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario eliminado :)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo eliminar :(",));
        }
    }
}
