<?php
$raiz = dirname(dirname(dirname(__file__)));
// die($raiz);
require_once($raiz.'/vista/vista.php');

class registroClientesView extends vista
{

    public function __construct(){

    
    }

    public function pantallaInicialRegistroCliente()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body>
            <div class="col-lg-6 offset-3">
                    <div align="center">
                        <img src="../logos/logokaymo.png" width="300" height="300">
                        <h2>Registro Clientes</h2>
                    </div>
                <div id="div_principal_registro">
                    <?php  $this->pantallaRegistro();  ?>
                </div>

            </div>
        </body>
        </html>
        <script src="../registroclientes/js/registro.js"></script>
       
        <?php    
    } 


    public function pantallaRegistro()
    {
        ?>
        <div>

            <div class="row">
                <span style="color:red; font-size:30px;" id="spanmensaje"></span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label>Identi: </label>
                    <input type="text"  id="identi" class="form-control" onkeyup="reviseIdenti();">
                </div>
                <div class="col-lg-6">
                    <label>Nombre: </label>
                    <input type="text"  id="nombre" class="form-control">
                </div>
                <div class="col-lg-6">
                    <label>Celular: </label>
                    <input type="text"  id="celular" class="form-control">
                </div>
                <div class="col-lg-6">
                    <label>Email: </label>
                    <input type="text"  id="email" class="form-control">
                </div>
                <!-- <div class="col-lg-6">
                    <label>clave: </label>
                    <input type="password"  id="clave" class="form-control">
                </div> -->
            </div>
            <div class="row">
                <button id="btnRegistrar" class="btn btn-primary mt-3" onclick = "registrarCliente();">Registrar </button>
            </div>
        </div>
            
            <?php
    }
    public function muestreInfoCliente($infoCliente)
    {
        ?>
        <div>

            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label>Identi: </label>
                    <span><?php echo $infoCliente['identi']   ?></span>
                </div>
                <div class="col-lg-6">
                    <label>Nombre: </label>
                    <span><?php echo $infoCliente['nombre']   ?></span>
                </div>
                <div class="col-lg-6">
                    <label>Celular: </label>
                    <span><?php echo $infoCliente['telefono']   ?></span>
                </div>
                <div class="col-lg-6">
                    <label>Email: </label>
                    <span><?php echo $infoCliente['email']   ?></span>
                </div>
               
            </div>
            <div class="row">
            </div>
        </div>
            
            <?php
    }


}    