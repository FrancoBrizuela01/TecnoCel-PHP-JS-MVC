<?php

// ..controllers/Proveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/listaProveedor.php';
require '../html/partials/session.php';


$p = new Proveedor();

$nombre_empresa = $_POST["nombre_empresa"];
$razon_social = $_POST["razon_social"];
$cuit = $_POST["cuit"];
$direccion = $_POST["direccion"];
$altura = $_POST["altura"];
$telefono = $_POST["telefono"];
$id = $_POST["id"];

$p->ModificarProveedor(
    $nombre_empresa,
    $razon_social,
    $cuit,
    $direccion,
    $altura,
    $telefono,
    $id
);
