<?php

// ..controllers/Proveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/listaProveedor.php';
require '../html/partials/session.php';

$p = new Proveedor();

if (isset($_POST['cancelar'])) {
    header('Location: ../controllers/Proveedor.php');
}

// if (isset($_POST['Modificar'])) {

//     $p->ModificarProveedor($_POST['nombre_empresa'], $_POST['razon_social'], $_POST['cuit'], 
//     	$_POST['direccion'], $_POST['altura'], $_POST['telefono'], $_POST['id']);
//     header('Location: ../controllers/Proveedor.php');
// }

if (isset($_POST['nuevo'])) {

    if (!isset($_POST['nombre_empresa'])) die('Ingrese el nombre');
    if (!isset($_POST['razon_social'])) die('Ingrese la razón social');

    $p->NuevoProveedor($_POST['nombre_empresa'], $_POST['razon_social'], $_POST['cuit'], 
    	$_POST['direccion'], $_POST['altura'], $_POST['telefono']);

    header('location: ../controllers/Proveedor.php');
} else {
    $v = new listaProveedor();
    $v->proveedores = $p->GetProve();
}

$v->render();
