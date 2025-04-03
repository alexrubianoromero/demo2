<?php

$raiz = dirname(dirname(dirname(__file__)));
// die($raiz); 
// require_once($raiz.'/controllers/modelo/EmpresaModelo.php');
require_once('../facturacion_electronica/controllers/facturacionElectronicaController.php'); 
$controller = new facturacionElectronicaController();
?>