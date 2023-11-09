<?php

function validarCampo($campo, $nombreCampo)
{
    if (isset($_POST[$campo]) && !empty($_POST[$campo])) {
        return $_POST[$campo];
    } else if ($_POST[$campo] == '0') {
        return $_POST[$campo];
    } else {
        $resp = array("error" => "El campo '" . $nombreCampo . "' es requerido.");
        echo json_encode($resp);
        exit();
    }
}
