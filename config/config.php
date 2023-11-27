<?php

// Configurar encabezados CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type"); // Encabezados permitidos
header("Content-Type: Application/json");

$errorResponse = array(
    0 => "Operación satisfactoria",
    1 => "No conecta al servidor",
    2 => "Registro ya Existe",
    3 => "Acceso a API con metodo incorrecto",
    4 => "No hay registros",
    5 => "Datos incompletos",
    10 => "Error de Operación"
);
