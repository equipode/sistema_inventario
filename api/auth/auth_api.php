<?php
include "../../app/auth/auth-services.php";
$objAPI = new authAPI();

$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: Application/json");
switch ($method) {
    case 'POST':
        $objAPI->auth();
        break;

    default:
        $objAPI->nullRequest();
        break;
}
