<?php
include "../../app/controlinv/controlinv-services.php";
include "../../config/config.php";
$objAPI = new controlInvAPI();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $objAPI->getAllControlInvs();
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
