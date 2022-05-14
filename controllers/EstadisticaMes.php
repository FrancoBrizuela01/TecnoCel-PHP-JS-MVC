<?php

//controllers/EstadisticaMes.php

require '../fw/fw.php';
require '../views/estadisticames.php';
require '../models/Venta.php';
require '../models/ValidacionMes.php';
require '../html/partials/session.php';

$v = new Venta;
$m = new meses;
$e = new estadisticasMes;

if (isset($_POST['mes'])) {
    $mes  = $_POST['mes'];
    $anio = $_POST['anio'];
}

if (!isset($_POST['mes'])) {
    $mes  = date('m');
    $anio = date('Y');
}

$e->totalMes = $v->totalMes($mes, $anio);
$e->promedioDia = $v->promedioDia($mes, $anio);
$e->diaMax = $v->diaMax($mes, $anio);
$e->diaMin = $v->diaMin($mes, $anio);
$e->nombreMes = $m->nombreMes($mes);
$e->lista = $v->ListaVentasDelMes($mes, $anio);

$e->render();
