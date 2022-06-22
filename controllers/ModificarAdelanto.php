<?php

//controllers/ModificarAdelanto.php

require '../fw/fw.php';
require '../models/Adelantos.php';
require '../views/adelantos.php';
require '../views/altaadelanto.php';
require '../html/partials/session.php';

$a = new AdelantosModel();

$id = $_POST["id_adelanto"];
$id_empleado = $_POST["id_empleado"];
$fecha = $_POST["fecha"];
$cantidad = $_POST["cantidad"];


$a->ModificarAdelanto(
    $id,
    $id_empleado,
    $fecha,
    $cantidad
);
