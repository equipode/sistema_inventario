<?php
include "../../controllers/users/controller_consultas_users_create.php";
include '../../validations/validateCampos.php';
include '../../saveImages/saveImage.php';

class usersAPI
{
    function saveUser()
    {
        $objDB = new ExtraerDatos();

        $usuario = validarCampo('user', 'user');
        $password = validarCampo('pass', 'pass');
        $rolUser = validarCampo('rol', 'rol');
        if (isset($_FILES["photo"]["name"]) && $_FILES["photo"]["name"] != null) {
            $foto = $_FILES["photo"];
            $folder = "usuarios";
            $rutafoto = handleFileUpload($foto, $folder);

            $ejecucion = $objDB->saveUser($usuario, $password, $rutafoto, $rolUser);

            if ($ejecucion) {
                echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario registrado :)",));
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo registrar :(",));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Debe enviar una imagen (photo) :(",));
        }
    }
}
