<?php

// controllers/Login.php

require '../fw/fw.php';
require '../models/Administrador.php';
require '../views/login.php';

$a = new Administrador();        //models

if (count($_POST) > 0) {

    session_start();

    if (!isset($_POST['email'])) die("Error, no ingreso su email");
    if (!isset($_POST['passwd'])) die("Error, no ingreso su contraseña");

    $todos = $a->getAdm($_POST['email'], $_POST['passwd']);

    if ($todos->numRows($todos) == 1) {
        $_SESSION['logueado'] = true;
        $fila = $todos->fetch($todos);
        $_SESSION['email'] = $fila['email'];
        header("Location: inicio.php");
        exit;
    }
}

$v = new login();                //views
$v->render();
