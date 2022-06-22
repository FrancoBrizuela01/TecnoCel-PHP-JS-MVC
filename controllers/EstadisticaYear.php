<?php

// controllers/EstadisticaYear.php

require '../fw/fw.php';
require '../views/estadisticasAnio.php';
require '../models/Venta.php';
require '../html/partials/session.php';

$e = new estadisticasAnio;
$v = new Venta;

if (isset($_POST['anio'])) {
    $anio = $_POST['anio'];
}

if (!isset($_POST['anio'])) {
    $anio = date('Y');
}

$e->totalAño = $v->totalAño($anio);
$e->mesMin = $v->mesMin($anio);
$e->mesMax = $v->mesMax($anio);
$e->AnioSelect = $v->añoSeleccionado($anio);

$e->render();
