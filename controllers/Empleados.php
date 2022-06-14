<?php

//controllers/Empleados.php

require '../fw/fw.php';
require '../models/Empleado.php';
require '../views/listadoEmpleados.php';
require '../html/partials/session.php';


$e = new Empleado();
$dni = new Empleado();
$telefono = new Empleado();

if (isset($_POST['cancelar'])) {
    header('Location: ../controllers/Empleados.php');
}

if (isset($_POST['nuevo'])) {

    $a = $dni->ExisteDni($_POST['dni']);
    $b = $telefono->ExisteTelefono($_POST['telefono']);


    if($a){
        if($b){
        $e->NuevoEmpleado(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['dni'],
        $_POST['sueldo'],
        $_POST['direccion'],
        $_POST['altura'],
        $_POST['telefono']);
        header('location: ../controllers/Empleados.php');
        } else {
            echo '<script type="text/JavaScript"> 
             alert("No se puede repetir el mismo TELEFONO para dos empleados distintos");
             </script>';
            $v = new listadoEmpleados();
            $v->empleados = $e->getTodos();
            }
    }  else {
    echo '<script type="text/JavaScript"> 
     alert("No se puede repetir el mismo DNI para dos empleados distintos");
     </script>';
    $v = new listadoEmpleados();
    $v->empleados = $e->getTodos();
        }
} else {
    $v = new listadoEmpleados();
    $v->empleados = $e->getTodos();
}

$v->render();
