<?php

// controllers/Ventas.php;

require '../fw/fw.php';
require '../models/Venta.php';
require '../models/Producto.php';
require '../views/ventas.php';
require '../html/partials/session.php';

$ven = new Venta();
$p = new Producto();

if (count($_POST) > 0) {

    $ven->AgregarVenta($_POST['fecha'], $_POST['cantidad'], $_POST['codigo']);
    $p->VentaRealizada($_POST['codigo'], $_POST['cantidad']);

    header('location: ../controllers/Ventas.php');
} else {
    $v = new ventas();
    $v->vendido = $ven->GetVentas();
    $v->productos = $p->getTodosProdu();
}

$v->render();
