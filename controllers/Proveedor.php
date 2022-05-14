<?php

// ..controllers/Proveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/proveedor.php';
require '../html/partials/session.php';

$p = new Proveedor();

if (isset($_POST['cancelar'])) {
    header('Location: ../controllers/CrMdRProveedor.php');
}

if (isset($_POST['Modificar'])) {

    $p->ModificarProveedor($_POST['razon_social'], $_POST['nombre'], $_POST['id']);
    header('Location: ../controllers/CrMdRProveedor.php');
}

if (isset($_POST['nuevo'])) {

    if (!isset($_POST['nombre'])) die('Ingrese el nombre');
    if (!isset($_POST['razon_social'])) die('Ingrese la razón social');

    $p->NuevoProveedor($_POST['razon_social'], $_POST['nombre']);

    header('location: ../controllers/CrMdRProveedor.php');
} else {
    $v = new proveedor();
    $v->proveedores = $p->GetProve();
}

$v->render();
