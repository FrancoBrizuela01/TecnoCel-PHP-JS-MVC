<?php

//controllers/CompraInsumos.php

require '../fw/fw.php';
require '../views/pedidoInsumos.php';
require '../models/Producto.php';

$p = new Producto();

if (count($_POST) > 0) {

    $p->ComprarInsumos($_POST['codigo'], $_POST['stock']);
    header('location: ../controllers/Productos.php');
} else {
    $v = new pedidoInsumos();
    $v->insumos = $p->getTodosProdu();
    $v->compras = $p->getCompras();
}

$v->render();
