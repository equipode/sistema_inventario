<?php
include "../../app/products/products-services.php";
include "../../config/config.php";
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
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
