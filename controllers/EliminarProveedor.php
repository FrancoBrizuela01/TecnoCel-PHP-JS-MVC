<?php

// ..controllers/EliminarProveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../html/partials/session.php';

$p = new Proveedor();

if (!empty($_GET['id'])) {

    $id_produ = $_GET['id'];
    $p->EliminarProveedor($id_produ);

    header('location: ../controllers/Proveedor.php');
}