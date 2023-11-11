<?php
    include "../../app/users/users-services.php";
    $objAPI = new usersAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->searchUser();                        
            break;
        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>