<?php
    include "../../app/products/products-services.php";
    $objAPI = new productsAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllProducts();                        
            break;

        case 'POST':
            $objAPI->saveProduct();
            break;

        default:
            $objAPI->nullRequest();
            break;
    }    
?>