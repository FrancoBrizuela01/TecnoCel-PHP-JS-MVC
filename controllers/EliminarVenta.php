<?php

require '../fw/fw.php';
require '../models/Venta.php';
require '../models/Producto.php';
require '../views/ventas.php';
require '../html/partials/session.php';

$v = new Venta();

if (!empty($_GET['id'])) {

    $id_venta = $_GET['id'];
    $v->EliminarVenta($id_venta);

    header('location: ../controllers/Ventas.php');
}
