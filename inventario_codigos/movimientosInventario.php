<?php

// echo 'codigos de inventario '; 
// die('LLEGO ACA');
// session_start();
date_default_timezone_set('America/Bogota');
$raiz = dirname(dirname(__file__));
// echo $raiz;
// die();
require_once($raiz.'/inventario_codigos/controladores/MovimientosInventarioController.php');
// $orden = new ordenControlador($conexion);
$codigos = new MovimientosInventarioController();

?>