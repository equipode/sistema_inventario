<?php
include "../../controllers/users/controller_consultas_users_search.php";
include "../../config/config.php";

class usersAPI
{
    function searchUser()
    {
        include '../../config/config.php';
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
                echo json_encode(array("data" => null, "error" => "4", "msg" => $errorResponse[4]));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "Debe enviar el search",));
        }
    }
}
