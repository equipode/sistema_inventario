<?php
    include "../../app/products/products-services.php";
    $objAPI = new productsAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {

        case 'POST':
            $objAPI->updateProduct();
            break;

        default:
            $objAPI->nullRequest();
            break;
    }    
?>