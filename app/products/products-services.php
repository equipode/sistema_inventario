<?php
include "../../controllers/products/controller_consultas_products_api.php";
include "../../validations/validateCampos.php";

class productsAPI
{

    function getAllProducts()
    {
        $objDB = new ExtraerDatos();
        $data = array();

        if (isset($_GET["id"])) {
            $data = $objDB->productsDetalle($_GET["id"]);
        } else {
            $data = $objDB->listadoProducts();
        }

        $products = array();
        $products["data"] = array();

        if ($data) {
            foreach ($data as $row) {
                $item = array(
                    "pk" => $row["pk_prod"],
                    "refer" => $row["referencia"],
                    "nomProdu" => $row["nombre_producto"],
                    "descri" => $row["descripcion"],
                    "photo" => $row["foto_product"],
                    "ubicaciBodega" => $row["ubicacionBodega"],
                    "precio" => $row["precio_product"],
                    "stok" => $row["stock"],
                    "exist" => $row["existencia"],
                    "esta" => $row["estado"]
                );
                array_push($products["data"], $item);
            }
            $products["msg"] = "OK";
            $products["error"] = "0";
            echo json_encode($products);
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "NO hay datos de productos :(",));
        }
    }

    function saveProduct()
    {
        $objDB = new ExtraerDatos();

        $referencia = validarCampo('refer', 'refer');
        $nombre_producto = validarCampo('nomProdu', 'nomProdu');
        $descripcion = validarCampo('descri', 'descri');
        $foto_product = validarCampo('photo', 'photo');
        $ubicacionBodega = validarCampo('ubicaciBodega', 'ubicaciBodega');
        $precio_product = validarCampo('precio', 'precio');
        $stock = validarCampo('stok', 'stok');
        $existencia = validarCampo('exist', 'exist');
        $estado = validarCampo('esta', 'esta');

        $ejecucion = $objDB->saveProduc($referencia, $nombre_producto, $descripcion, $foto_product, $ubicacionBodega, $precio_product, $stock, $existencia, $estado );

        if($ejecucion){
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Producto Guardado",));
        }else{
            echo json_encode(array("data" => null, "error" => "0", "msg" => "error al guardar",));
        }
        
    }

    function updateProduct()
    {
        $objDB = new ExtraerDatos();

        $referencia = validarCampo('refer', 'refer');
        $nombre_producto = validarCampo('nomProdu', 'nomProdu');
        $descripcion = validarCampo('descri', 'descri');
        $foto_product = validarCampo('photo', 'photo');
        $ubicacionBodega = validarCampo('ubicaciBodega', 'ubicaciBodega');
        $precio_product = validarCampo('precio', 'precio');
        $stock = validarCampo('stok', 'stok');
        $existencia = validarCampo('exist', 'exist');
        $estado = validarCampo('esta', 'esta');

        $ejecucion = $objDB->saveProduc($referencia, $nombre_producto, $descripcion, $foto_product, $ubicacionBodega, $precio_product, $stock, $existencia, $estado );

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario actualizado :)",));
        } else {

        echo json_encode(array("data" => null, "error" => "0", "msg" => "Actualizar",));
    }

    function deleteProduct()
    {
        $objDB = new ExtraerDatos();

        $id = validarCampo('pk', 'pk+');

        $ejecucion = $objDB->deleteUser($id);

        if ($ejecucion) {
            echo json_encode(array("data" => null, "error" => "0", "msg" => "Usuario eliminado :)",));
        } else {
            echo json_encode(array("data" => null, "error" => "1", "msg" => "No se pudo eliminar :(",));
        }
    }
    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
}