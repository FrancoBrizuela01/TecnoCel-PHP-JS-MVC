<?php

//controllers/EliminarProducto.php

require '../fw/fw.php';
require '../models/Producto.php';
require '../html/partials/session.php';

$p = new Producto();

if (!empty($_GET['id'])) {

    $id_produ = $_GET['id'];
    $p->EliminarProducto($id_produ);

    header('location: ../controllers/CrMdRProductos.php');
}
