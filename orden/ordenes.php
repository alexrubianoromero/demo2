<?php
// session_start();
date_default_timezone_set('America/Bogota');
$raiz = dirname(dirname(__file__));
// echo $raiz;
// die();
require_once($raiz.'/valotablapc.php');  
require_once($raiz.'/funciones.php'); 
require_once($raiz.'/orden/controlador/ordenControlador.php');
$orden = new ordenControlador($conexion);
?>