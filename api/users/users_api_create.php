<?php
    include "../../app/users/users-services-create.php";
    include '../../config/config.php';
    $objAPI = new usersAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'POST':
            $objAPI->saveUser();
            break;
            
        default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
            break;
    }    
?>