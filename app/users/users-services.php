<?php 
    include "../../controllers/users/controller_consultas_users_api.php";


    class usersAPI{

        function getAllUsers(){
            $objDB = new ExtraerDatos();
            $data = array();

            if (isset($_GET["id"])){
                $data = $objDB->usersDetalle($_GET["id"]);
            }else{
                $data = $objDB->listadoUsers();
            }

            $users = array();
            $users["data"] = array();

            if($data){
                foreach($data as $row){
                    $item = array(
                        "pk" => $row["pk_user"],                    
                        "usu" => $row["usuario"],
                        "pass" => $row["password"],
                        "photo" => $row["foto"],
                    );
                    array_push($users["data"], $item);                
                }
                $users["msg"] = "OK";
                $users["error"] = "0";
                echo json_encode($users);
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"1", "msg"=>"NO hay datos de usuarios", ));
            }
        }

        function saveProduct(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Guardar", ));
        }

        function updateProduct(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Actualizar", ));
        }

        function deleteProduct(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Eliminar", ));
        }

        function nullRequest(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Solicitud Nula", ));
        }




        
    }

?>

