<?php

require '../fw/fw.php';
require '../views/productos.php';
require '../models/Producto.php';
require '../models/Proveedor.php';
require '../html/partials/session.php';

$p = new Producto();

$p->CambiarPrecioVenta($_POST['porcentaje']);
$p->CambiarPrecioCosto($_POST['porcentaje']);