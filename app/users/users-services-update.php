<?php
include "../../controllers/users/controller_consultas_users_update.php";
include '../../validations/validateCampos.php';
include '../../saveImages/saveImage.php';

class usersAPI
{
    function updateUser()
    {
        $objDB = new ExtraerDatos();

        $usuario = validarCampo('user', 'user');
        $rolUser = validarCampo('rol', 'rol');
        $id = validarCampo('iduser', 'iduser');

        if (isset($_FILES["photo"]["name"]) && $_FILES["photo"]["name"] != null) {
            $foto = $_FILES["photo"];
            $folder = "usuarios";
            $rutafoto = handleFileUpload($foto, $folder);

            $ejecucion = $objDB->updateUserfoto($id, $usuario, $rutafoto, $rolUser);

            if ($ejecucion) {
                echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario actualizado :)",));
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo actualizar :(",));
            }
        } else {
            $ejecucion = $objDB->updateUser($id, $usuario, $rolUser);

            if ($ejecucion) {
                echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario actualizado :)",));
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo actualizar :(",));
            }
        }
    }

}
