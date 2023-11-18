<?php
include "../../app/controlinv/controlinv-services.php";
include '../../config/config.php';
$objAPI = new controlInvAPI();

$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: Application/json");
switch ($method) {

    case 'POST':
        $objAPI->updateControlInv();
        break;

    default:
        echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
        break;
}
