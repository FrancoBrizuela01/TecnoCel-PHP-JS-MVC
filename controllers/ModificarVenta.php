<?php

require '../fw/fw.php';
require '../models/Venta.php';
require '../models/Producto.php';
require '../views/ventas.php';
require '../html/partials/session.php';

$v = new Venta();

$fecha = $_POST["fecha"];
$codigo_producto = $_POST["codigo_producto"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];

$v->ModificarVenta(
    $fecha,
    $cantidad,
    $codigo_producto,
    $id
);
