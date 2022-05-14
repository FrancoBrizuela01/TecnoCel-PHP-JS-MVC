<?php

//controllers/EliminarEmpleado.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../models/Adelantos.php';
require '../html/partials/session.php';

$e = new Empleado();
$a = new Adelantos();

if (!empty($_GET['id'])) {

    $id_emple = $_GET['id'];
    $e->EliminarEmpleado($id_emple);
    $a->EliminarAdelanto($id_emple);

    header('location: ../controllers/Empleados.php');
}