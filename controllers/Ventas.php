<?php

// controllers/Ventas.php;

require '../fw/fw.php';
require '../models/Venta.php';
require '../models/Producto.php';
require '../views/ventas.php';
require '../html/partials/session.php';

$ven = new Venta();
$p = new Producto();
$can = new Producto();


if (count($_POST) > 0) {

	$a = $can->CantidadStock($_POST['codigo'], $_POST['cantidad']);

	if($a){
   		$ven->AgregarVenta($_POST['fecha'], $_POST['cantidad'], $_POST['codigo']);
  	  	$p->VentaRealizada($_POST['codigo'], $_POST['cantidad']);
  	    header('location: ../controllers/Ventas.php');
	} else {
    echo '<script type="text/JavaScript"> 
     alert("xd");
     </script>';
    $v = new ventas();
    $v->vendido = $ven->GetVentas();    //ACA SERIA QUE NO SE PUEDE COMPRAR PQ NO HAY STO
    $v->productos = $p->getTodosProdu();
}

} else {
    $v = new ventas();
    $v->vendido = $ven->GetVentas();
    $v->productos = $p->getTodosProdu();
}

$v->render();
