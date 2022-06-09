<?php

//controllers/Empleados.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../views/listadoEmpleados.php';
require '../html/partials/session.php';


$e = new Empleado();

if (isset($_POST['cancelar'])) {
    header('Location: ../controllers/Empleados.php');
}


// if (isset($_POST['Modificar'])) {
//     $e->ModificarEmpleado(
//         $_POST['nombre'],
//         $_POST['apellido'],
//         $_POST['dni'],
//         $_POST['sueldo'],
//         $_POST['direccion'],
//         $_POST['altura'],
//         $_POST['telefono'],
//         $_POST['id']
//     );
//     // header('Location: ../controllers/Empleados.php');
// }


if (isset($_POST['nuevo'])) {
    if (!isset($_POST['nombre'])) die('Escribir nombre');
    if (!isset($_POST['apellido'])) die('Escribir apellido');
    if (!isset($_POST['dni'])) die('Escribir dni');

    $e->NuevoEmpleado(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['dni'],
        $_POST['sueldo'],
        $_POST['direccion'],
        $_POST['altura'],
        $_POST['telefono']
    );
    header('location: ../controllers/Empleados.php');
} else {
    $v = new listadoEmpleados();
    $v->empleados = $e->getTodos();
}

$v->render();
