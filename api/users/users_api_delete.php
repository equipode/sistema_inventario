<?php
include "../../app/users/users-services-delete.php";
include "../../config/config.php";
$objAPI = new usersAPI();

$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: Application/json");
switch ($method) {
    case 'DELETE':
        // $post = json_decode(file_get_contents('php://input'));
        $_POST = json_decode(file_get_contents('php://input'), true);

        // echo json_encode($post);
        $objAPI->deleteUser($_POST);
        break;

    default:
    echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
