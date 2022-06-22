<?php

require '../fw/fw.php';
require '../views/productos.php';
require '../models/Producto.php';
require '../models/Proveedor.php';
require '../html/partials/session.php';

$p = new Producto();

$descripcion = $_POST["descripcion"];
$precio_costo = $_POST["precio_costo"];
$precio_venta = $_POST["precio_venta"];
$stock = $_POST["stock"];
$id = $_POST["id"];
$proveedor = $_POST["id_proveedor"];

$p->ModificarProducto(
    $descripcion,
    $precio_costo,
    $precio_venta,
    $stock,
    $id,
    $proveedor
);
