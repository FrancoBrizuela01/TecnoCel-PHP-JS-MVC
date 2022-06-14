<?php

// controllers/AltaAdelantos.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../models/Adelantos.php';
require '../views/altaadelanto.php';
require '../html/partials/session.php';

$e = new Empleado();

$v = new altaadelanto();    // este llama a la vista de alta de adelantos.
$v->empleados = $e->getTodos();


$v->render();
