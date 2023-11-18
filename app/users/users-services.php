<?php
include "../../controllers/users/controller_consultas_users_api.php";
include '../../validations/validateCampos.php';
include '../../saveImages/saveImage.php';

class usersAPI
{

    function getAllUsers()
    {
        $objDB = new ExtraerDatos();
        $data = array();

        if (isset($_GET["id"])) {
            $data = $objDB->usersDetalle($_GET["id"]);
        } else {
            $data = $objDB->listadoUsers();
        }

        $users = array();
        $users["data"] = array();

        if ($data) {
            foreach ($data as $row) {
                $item = array(
                    "pk" => $row["pk_user"],
                    "usu" => $row["usuario"],
                    "pass" => $row["password"],
                    "photo" => $row["foto_user"],
                    "rolUser" => $row["rol"],
                );
                array_push($users["data"], $item);
            }
            $users["msg"] = "OK";
            $users["error"] = "0";
            echo json_encode($users);
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "NO hay datos de usuarios",));
        }
    }

    function searchUser()
    {
        $objDB = new ExtraerDatos();
        $data = array();

        if (isset($_GET["search"])) {
            $data = $objDB->usersSearch($_GET["search"]);


            $users = array();
            $users["data"] = array();

            if ($data) {
                foreach ($data as $row) {
                    $item = array(
                        "pk" => $row["pk_user"],
                        "usu" => $row["usuario"],
                        "pass" => $row["password"],
                        "photo" => $row["foto_user"],
                        "rolUser" => $row["rol"],
                    );
                    array_push($users["data"], $item);
                }
                $users["msg"] = "OK";
                $users["error"] = "0";
                echo json_encode($users);
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "NO hay datos de usuarios",));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Debe enviar el search",));
        }
    }

    function saveUser()
    {
        $objDB = new ExtraerDatos();

        $usuario = validarCampo('user', 'user');
        $password = validarCampo('pass', 'pass');
        // $foto = validarCampo('photo', 'photo');
        $rolUser = validarCampo('rol', 'rol');
        if (isset($_FILES["photo"]["name"]) && $_FILES["photo"]["name"] != null) {
            $foto = $_FILES["photo"];
            $folder = "usuarios";
            $rutafoto = handleFileUpload($foto, $folder);

            $ejecucion = $objDB->saveUser($usuario, $password, $rutafoto, $rolUser);

            // echo json_encode(array($usuario, $password, $foto, $rolUser));
            if ($ejecucion) {
                echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario registrado :)",));
            } else {
                echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo registrar :(",));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Debe enviar una imagen (photo) :(",));
        }
    }

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

    function updatePassword()
    {
        $objDB = new ExtraerDatos();

        $password = validarCampo('pass', 'pass');
        $id = validarCampo('iduser', 'iduser');


        $ejecucion = $objDB->updatePasswordUser($id, $password);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Contraseña actualizada :)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "La contraseña no se pudo actualizar :(",));
        }
    }

    function deleteUser($datos)
    {
        // echo json_encode(array("idsd" => $datos['id']));

        $id = $datos['id'];

        $objDB = new ExtraerDatos();

        // $id = validarCampo('iduser', 'iduser');

        $ejecucion = $objDB->deleteUser($id);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario eliminado :)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo eliminar :(",));
        }
    }

    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
