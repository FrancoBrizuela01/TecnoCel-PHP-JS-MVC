<?php

//controllers/EliminarAdelanto.php

require '../fw/fw.php';
require '../models/Adelantos.php';
require '../html/partials/session.php';

$a = new Adelantos();

if (!empty($_GET['id'])) {

    $id_adelanto = $_GET['id'];
    $a->EliminarAdelanto($id_adelanto);

    header('location: ../controllers/Adelantos.php');
}