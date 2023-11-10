<?php

include '../env/enviroment.php';

function handleFileUpload($file, $folder)
{

    $ext = "";
    $msgfile = "";
    $logError = "";
    if (isset($file['name']) && $file['name'] != null) {
        $extens = array('.jpeg' => 'JPEG', '.JPEG' => 'JPEG', '.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
        $ext = strrchr(basename($file['name']), ".");
        if ($extens[$ext]) {
            if ($file['error'] == UPLOAD_ERR_OK) { //Si el archivo se paso correctamente Continuamos 
                $fotoUser = "imgs/$folder/";
                $postname = date("Y") . date("m") . date("d") . "_" . date("H") . date("i");
                $fullname = explode(".", basename($file['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                $NombreOriginal = $fullname[0]; //Obtenemos el nombre original del archivo
                $temporal = $file['tmp_name']; //Obtenemos la ruta Original del archivo
                $Destino = "../" . $fotoUser . $NombreOriginal . "_" . $postname . $ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                $fotoUser = $fotoUser . $NombreOriginal . "_" . $postname . $ext; //Esto se guarda en el campo imagend e la base de dato
                if (copy($temporal, $Destino)) { //Movemos el archivo temporal a la ruta especificada               
                    $msgfile = "Imagen subida.";
                } else {
                    $msgfile .= "<span class='label label-danger'>la imagen del Producto .</span>";
                    $logError = "No se pudo subir la imagen del Producto, puede ser por tamaño. \n";
                }
            } else {
                $msgfile .= "<span class='label label-danger'>Error al transferirse el archivo.</span> ";
            }
        } else {
            $msgfile .= "<span class='label label-danger'><i class='fa fa-file-o'></i> Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext].</span>";
            $logError .= "Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext]. \n";
        }
    }

    $urlServidor = urlServidor();
    $rutaFotoUser = $urlServidor . $fotoUser;

    return $rutaFotoUser;
}