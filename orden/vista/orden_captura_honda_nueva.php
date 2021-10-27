<?php

require_once('CapturaOrden.class.php'); 
require_once('../clientes/modelo/ClientesModelo.class.php'); 
// $formulario = new CapturaOrden();

class orden_captura_honda_nueva{
    private $formulario;
    private $clientes;

    public function __construct(){
       $this->formulario =  new CapturaOrden();   
       $this->clientes = new ClientesModelo(); 
    }
    
    public function mostrarFormulario($datos,$tabla3,$tabla4,$conexion)
    {   
        $datosCliente =  $this->clientes->traerDatosClienteId($datos['propietario'],$tabla3,$conexion);
        echo '    
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
                    <div class="col-sm-12 col-md-6 linea" align="left">
                        '.  $this->formulario->infoMoto($datos).'
                    </div>

                    <div class="col-sm-12 col-md-6 linea" align="left">
                    '
                     .$this->formulario->infoPersona($datosCliente)
                     .
                    '
                    </div>
                </div> 
                <div>
                  <button >CREAR ORDEN</button>
                </div>
            </div>
        </body>
        </html>';
    }
}
?>