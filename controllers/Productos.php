<?php

// controllers/Productos.php

require '../fw/fw.php';
require '../views/productos.php';
require '../models/Producto.php';
require '../models/Proveedor.php';
require '../html/partials/session.php';

$p = new Producto();
$pr = new Proveedor();

if (isset($_POST['cancelar'])) {
    header('Location: ../controllers/Productos.php');
}

if (isset($_POST['nuevo'])) {
    $p->NuevoProducto($_POST['desc'], $_POST['precio_costo'], $_POST['precio_venta'], $_POST['stock']);

    header('location: ../controllers/Productos.php');
} else {
    $v = new productos();
    $v->productos = $p->getTodosProdu();
    $v->prove = $pr->GetProve();
}

$v->render();
