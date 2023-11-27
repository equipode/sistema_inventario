<?php
include "../../app/users/users-services.php";
include "../../config/config.php";
$objAPI = new usersAPI();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $objAPI->getAllUsers();
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
