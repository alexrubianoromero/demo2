<?php
session_start();
date_default_timezone_set('America/Bogota');
// include('../valotablapc.php');  
// include('../funciones.php'); 
include('../orden/vista/CapturaOrden.class.php'); 
include('../orden/modelo/OrdenesModelo.class.php'); 
$formulario = new CapturaOrden();
$ordenesModelo = new OrdenesModelo();
$ordenesModelo->verificarPlaca(); 
?>
<!DOCTYPE html>
<html lang="es"  class"no-js">
<head>
    <meta charset="UTF-8">
	<title>Orden Captura Nueva  </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div id="div_total">
       <div class="row">
           <div class="col-sm-12 col-md-6">
                <?php $formulario->infoMoto(); ?>
            </div>

            <div class="col-sm-12 col-md-6">
                <?php $formulario->infoPersona(); ?>
            </div>

       </div> 
    </div>
</body>
</html>
