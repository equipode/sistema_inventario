<?php
include "../../app/users/users-services-update-password.php";
include "../../config/config.php";
$objAPI = new usersAPI();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'PUT':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $objAPI->updatePassword($_POST);
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
