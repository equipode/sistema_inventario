<?php
include "../../app/users/users-services.php";
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
        $objAPI->nullRequest();
        break;
}
