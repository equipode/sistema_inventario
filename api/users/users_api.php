<?php
    include "../../app/users/users-services.php";
    $objAPI = new usersAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllUsers();                        
            break;

        case 'POST':
            $objAPI->saveProduct();
            break;

        case 'PUT':
            $objAPI->updateProduct();
            break;

        case 'DELETE':
            $objAPI->deleteProduct();
            break;

        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>