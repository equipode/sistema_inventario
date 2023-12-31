<?php
include "../../controllers/users/controller_consultas_users_update_password.php";

class usersAPI
{
    function updatePassword($datos)
    {
        if ($datos) {

            if (isset($datos['pass']) && isset($datos['iduser'])) {
                $objDB = new ExtraerDatos();

                $password = $datos['pass'];
                $id = $datos['iduser'];

                $ejecucion = $objDB->updatePasswordUser($id, $password);

                if ($ejecucion) {
                    echo json_encode(array("data" => null, "error" => "0", "msg" => "Contraseña actualizada :)",));
                } else {
                    echo json_encode(array("data" => null, "error" => "1", "msg" => "La contraseña no se pudo actualizar :(",));
                }
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "Falta el pass y el iduser",));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Faltan datos",));
        }
    }
}
