<?php

//controllers/CompraInsumos.php

require '../fw/fw.php';
require '../views/pedidoInsumos.php';
require '../models/Producto.php';

$p = new Producto();

if (count($_POST) > 0) {

    if (!isset($_POST['codigo'])) die("Escribir codigo");
    if (!isset($_POST['stock'])) die("Escribir codigo");

    $p->ComprarInsumos($_POST['codigo'], $_POST['stock']);

    header('location: ../controllers/Productos.php');
} else {
    $v = new pedidoInsumos();
    $v->insumos = $p->getTodosProdu();
}

$v->render();
