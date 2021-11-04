<?php
session_start();
date_default_timezone_set('America/Bogota');
require_once('../valotablapc.php');  
require_once('../funciones.php'); 
require_once('../vehiculos/controlador/vehiculoControlador.php');
$vehiculo = new vehiculoControlador();
if(!isset($_REQUEST['placa'])){

    $vehiculo->muestreVehiculos($conexion);
}else{

    $vehiculo->muestreVehiculoPlaca($_REQUEST['placa'],$conexion);
}
// $vehiculo->creacionVehiculo($_REQUEST['placa'],$conexion);
?>