<?php
    include "../../app/controlinv/controlinv-services.php";
    $objAPI = new controlInvAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllControlInvs();                        
            break;

        case 'POST':
            $objAPI->saveControlInv();
            break;
        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>