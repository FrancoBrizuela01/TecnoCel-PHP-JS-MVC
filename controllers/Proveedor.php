<?php

// ..controllers/Proveedor.php

require '../fw/fw.php';
require '../models/Proveedor.php';
require '../views/listaProveedor.php';
require '../html/partials/session.php';

$p = new Proveedor();
$c = new Proveedor();
$t = new Proveedor();

if (isset($_POST['cancelar'])) {
    header('Location: ../controllers/Proveedor.php');
}

if (isset($_POST['nuevo'])) {

	$a = $c->ExisteCuit($_POST['cuit']);
	$b = $t->ExisteTelefonoProveedor($_POST['telefono']);

	if($a){
		if($b){
 		$p->NuevoProveedor($_POST['nombre_empresa'], $_POST['razon_social'], $_POST['cuit'], 
    	$_POST['direccion'], $_POST['altura'], $_POST['telefono']);
    	header('location: ../controllers/Proveedor.php');
		}else {
            echo '<script type="text/JavaScript"> 
             alert("No se puede repetir el mismo TELEFONO para dos proveedores distintos");
             </script>';
           	$v = new listaProveedor();
    		$v->proveedores = $p->GetProve();
            }
	}else {
            echo '<script type="text/JavaScript"> 
             alert("No se puede repetir el mismo CUIT para dos proveedores distintos");
             </script>';
            $v = new listaProveedor();
    		$v->proveedores = $p->GetProve();
            }
   
} else {
    $v = new listaProveedor();
    $v->proveedores = $p->GetProve();
}

$v->render();
