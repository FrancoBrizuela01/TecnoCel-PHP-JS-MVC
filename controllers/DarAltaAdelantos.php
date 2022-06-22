<?php

// controllers/AltaAdelantos.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../models/Adelantos.php';
require '../views/altaadelanto.php';
require '../html/partials/session.php';

$a = new AdelantosModel();

$empleado = $_POST["empleado"];
$monto = $_POST["monto"];
$fecha = $_POST["fecha"];

$a->crearAdelantoFechaDeterminada(
    $empleado,
    $monto,
    $fecha
);