<?php
include "../../controllers/products/controller_consultas_products_api.php";


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
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Guardar",));
    }

    function updateProduct()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Actualizar",));
    }

    function deleteProduct()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Eliminar",));
    }

    function nullRequest()
    {
        echo json_encode(array("data" => null, "error" => "0", "msg" => "Solicitud Nula",));
    }
}
