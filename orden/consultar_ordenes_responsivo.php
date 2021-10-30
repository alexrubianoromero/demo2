<?php

session_start();
date_default_timezone_set('America/Bogota');
require_once('../valotablapc.php'); 
require_once('../funciones.php'); 
require_once('../orden/controlador/ordenControlador.php');
$controlador =new ordenControlador();
if(isset($_REQUEST['id'])){
    $controlador->mostrarInfoOrden($_REQUEST['id'],$conexion);
}
else{
    $controlador->pantallaConsultas($conexion);
}
?>