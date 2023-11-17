<?php

function validarCampo($campo, $nombreCampo)
{
    if (isset($_POST[$campo]) && !empty($_POST[$campo])) {
        return $_POST[$campo];
    } else {

        echo json_encode(array("data" => null, "error" => "1", "msg" => "El campo $nombreCampo es requerido",));
        exit();
    }
}
