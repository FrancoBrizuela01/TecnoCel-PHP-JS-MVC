<?php

//controllers/ModificarAdelanto.php

require '../fw/fw.php';
require '../models/Adelantos.php';
require '../views/adelantos.php';
require '../html/partials/session.php';


$e = new Adelanto();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dni = $_POST["dni"];
$fecha = $_POST["fecha"];
$cantidad = $_POST["cantidad"];
$id = $_POST["id"];

$e->ModificarAdelanto($nombre, $apellido, $dni, $fecha, $cantidad, $id);