<?php

//controllers/CompraInsumos.php

require '../fw/fw.php';
require '../views/insumos.php';
require '../models/Produ.php';

$p = new Producto();

if (count($_POST) > 0) {

    if (!isset($_POST['codigo'])) die("Escribir codigo");
    if (!isset($_POST['stock'])) die("Escribir codigo");

    $p->ComprarInsumos($_POST['codigo'], $_POST['stock']);

    header('location: ../controllers/CrMdRProductos.php');
} else {
    $v = new insumos();
    $v->insu = $p->getTodosProdu();
}

$v->render();
