<?php

// controllers/Adelantos.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../views/adelantos.php';
require '../html/partials/session.php';


$a = new Empleado();
$todos = $a->getListaAdelantos();

$v = new adelantos();
$v->empleados = $todos;
$v->render();
