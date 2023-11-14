<?php
    include "../../app/controlinv/controlinv-services.php";
    $objAPI = new controlInvAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {

        case 'POST':
            $objAPI->updateControlInv();
            break;
        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>