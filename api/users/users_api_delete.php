<?php
    include "../../app/users/users-services.php";
    $objAPI = new usersAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'POST':
            $objAPI->deleteUser();
            break;
            
        default:
            $objAPI->nullRequest();
            break;
    }    
?>