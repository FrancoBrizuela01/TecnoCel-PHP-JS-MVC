<?php

// controllers/Inicio.php

require '../fw/fw.php';
require '../views/inicio.php';

session_start();

if (!isset($_SESSION['logueado'])) {
    header("Location: ListaAdministradores.php");
    exit;
}

$v = new inicio();
$v->render();
