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

    // function searchUser()
    // {
    //     $objDB = new ExtraerDatos();
    //     $data = array();

    //     if (isset($_GET["search"])) {
    //         $data = $objDB->usersSearch($_GET["search"]);
        

    //     $users = array();
    //     $users["data"] = array();

    //     if ($data) {
    //         foreach ($data as $row) {
    //             $item = array(
    //                 "pk" => $row["pk_user"],
    //                 "usu" => $row["usuario"],
    //                 "pass" => $row["password"],
    //                 "photo" => $row["foto_user"],
    //                 "rolUser" => $row["rol"],
    //             );
    //             array_push($users["data"], $item);
    //         }
    //         $users["msg"] = "OK";
    //         $users["error"] = "0";
    //         echo json_encode($users);
    //     } else {
    //         echo json_encode(array("data" => null, "error" => "1", "msg" => "NO hay datos de usuarios",));
    //     }
    // }else {
    //         echo json_encode(array("data" => null, "error" => "1", "msg" => "Debe enviar el search",));
    //     }
    // }

    function saveControlInv()
    {
        $objDB = new ExtraerDatos();

        $salida = validarCampo('salid', 'salid');
        $producfk= validarCampo('fkproducto', 'fkproducto');

    
    $ejecucion = $objDB->saveControlinventario($salida, $producfk);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "salida reportada:)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo reportar salida:(",));
        }

    }

    function updateUser()
    {
        $objDB = new ExtraerDatos();

        $usuario = validarCampo('user', 'user');
        // $password = validarCampo('pass', 'pass');
        // $foto = validarCampo('photo', 'photo');
        $rolUser = validarCampo('rol', 'rol');
        $id = validarCampo('iduser', 'iduser');
        if(isset($_FILES["photo"]["name"]) && $_FILES["photo"]["name"] != null){
            $foto = $_FILES["photo"];
            $folder = "usuarios";
            $rutafoto = handleFileUpload($foto, $folder);

        $ejecucion = $objDB->updateUserfoto($id, $usuario, $rutafoto, $rolUser);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario actualizado :)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo actualizar :(",));
        }

    }else{
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

    function deleteUser()
    {
        $objDB = new ExtraerDatos();

        $id = validarCampo('iduser', 'iduser');

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