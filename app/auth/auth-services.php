<?php
include '../../controllers/auth/controller_consultas_auth_api.php';
include '../../validations/validateCampos.php';

class authAPI
{
    function auth()
    {
        $objDB = new ExtraerDatos();

        $usuario = validarCampo('user', 'user');
        $password = validarCampo('pass', 'pass');

        $usr = array();
        $usr = $objDB->verificarLogin($usuario);

        if ($usr) { //Existe el usuario en base de datos
            if ($usr[0]["password"] == sha1($password)) {

                $id_user = $usr[0]["pk_user"];
                $user = $usr[0]["usuario"];
                $rolUser = $usr[0]["rol"];
                $fotoUser = $usr[0]["foto_user"];

                $resp = array(
                    "ok" => 200,
                    "id_user" => $id_user,
                    "user" => $user,
                    "foto" => $fotoUser,
                    "rolUser" => $rolUser
                );

                // echo json_encode($resp);

                echo json_encode(array("data" => $resp, "error" => "0", "msg" => ":)",));
            } else {

                echo json_encode(array("data" => null, "error" => "1", "msg" => "Verifique sus credenciales :(",));
                // echo respuestaJson('contraseña incorreta', 'error');
            }
        } else {

            echo json_encode(array("data" => null, "error" => "1", "msg" => "Verifique sus credenciales :(",));
        }
    }

    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
