<?php

//controllers/Empleados.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../views/listadoEmpleados.php';
require '../html/partials/session.php';


$e = new Empleado();

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dni = $_POST["dni"];
$sueldo = $_POST["sueldo"];
$direccion = $_POST["direccion"];
$altura = $_POST["altura"];
$telefono = $_POST["telefono"];
$id = $_POST["id"];

$e->ModificarEmpleado(
    $nombre,
    $apellido,
    $dni,
    $sueldo,
    $direccion,
    $altura,
    $telefono,
    $id
);
