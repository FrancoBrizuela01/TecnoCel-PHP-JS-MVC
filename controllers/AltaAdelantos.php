<?php

// controllers/AltaAdelantos.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../models/Adelantos.php';
require '../views/altaadelanto.php';
require '../html/partials/session.php';


$m = new Empleado();

if (count($_POST) > 0) {

    $ma = new Adelantos();
    if (!isset($_POST['fecha'])) die("Error validacion 1");

    $ma->crearAdelantoFechaDeterminada($_POST['empleado'], $_POST['monto'], $_POST['fecha']);

    header('location: ../controllers/AltaAdelantos.php');
} else {
    $v = new altaadelanto();    // este llama a la vista de alta de adelantos.
    $v->empleados = $m->getTodos();
}

$v->render();
