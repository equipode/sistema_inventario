<?php
include "../../controllers/users/controller_consultas_users_api.php";


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

    function validarCampo($campo, $nombreCampo)
{
    if (isset($_POST[$campo]) && !empty($_POST[$campo])) {
        return $_POST[$campo];
    } else if ($_POST[$campo] == '0') {
        return $_POST[$campo];
    } else {
        $resp = array("error" => "El campo '" . $nombreCampo . "' es requerido.");
        echo json_encode($resp);
       exit();
    }
}

    function saveUser()
    {
        $objDB = new ExtraerDatos();

        $usuario = $this->validarCampo('user', 'user');
        $password = $this->validarCampo('pass', 'pass');
        $foto = $this->validarCampo('photo', 'photo');
        $rolUser = $this->validarCampo('rol', 'rol');

        $ejecucion = $objDB->saveUser($usuario,$password,$foto,$rolUser);

        // echo json_encode(array($usuario,$password,$foto,$rolUser));
        if($ejecucion){
            echo json_encode(array("data"=>null, "error" => "0", "msg" => "Usuario registrado :)",));
        }else{
            echo json_encode(array("data"=>null, "error" => "1", "msg" => "No se pudo registrar :(",));
        }
    }

    function updateUser()
    {
        $objDB = new ExtraerDatos();

        $usuario = $this->validarCampo('user', 'user');
        $password = $this->validarCampo('pass', 'pass');
        $foto = $this->validarCampo('photo', 'photo');
        $rolUser = $this->validarCampo('rol', 'rol');
        $id = $this->validarCampo('iduser', 'iduser');

        $ejecucion = $objDB->updateUser($id,$usuario,$password,$foto,$rolUser);

        if($ejecucion){
            echo json_encode(array("data"=>null, "error" => "0", "msg" => "Usuario actualizado :)",));
        }else{
            echo json_encode(array("data"=>null, "error" => "1", "msg" => "No se pudo actualizar :(",));
        }
    }

    function deleteUser()
    {
        $objDB = new ExtraerDatos();

        $id = $this->validarCampo('iduser', 'iduser');

        $ejecucion = $objDB->deleteUser($id);

        if($ejecucion){
            echo json_encode(array("data"=>null, "error" => "0", "msg" => "Usuario eliminado :)",));
        }else{
            echo json_encode(array("data"=>null, "error" => "1", "msg" => "No se pudo eliminar :(",));
        }
    }

    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
