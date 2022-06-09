<?php

require '../fw/fw.php';
require '../views/pedidoInsumos.php';
require '../models/Producto.php';

$p = new Producto();

$stock = $_POST['stock'];
$id = $_POST['codigo_producto'];

$p->ComprarInsumos(
    $stock,
    $id
);
