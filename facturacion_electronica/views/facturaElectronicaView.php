<?php
require_once($raiz.'/clientes/modelo/ClientesModelo.class.php');


class facturaElectronicaView
{
    protected $modelCliente; 

    public function __construct()
    {
        $this->modelCliente = new ClientesModelo();
    }    
    public function preguntarANombredeQuien($idOrden)
    {
        ?>
        <div class="row:">

            <label class="col-lg-3">Orden No: </label>
            <div class="col-lg-4">
                <input type="text" id="idOrden"  class="form-control" value="<?php    echo  $idOrden; ?>" onfocus="Blur();">
            </div>
        </div>
        <div>
            <select id="idTipoCLiente" class="form-control" onchange="verifiqueTipoCLiente(<?php  echo $idOrden?>);">
                <option value="">Selecione...</option>
                <option value="1">Cliente Ocacional</option>
                <option value="2">A nombre del cliente</option>

            </select>
        </div>
        <div id="div_tipo_cliente">

        </div>
        <?php
    }

    public function muestreInfoCliente($idCliente)
    {
        $infoCliente = $this->modelCliente->traerDatosClienteIdNew($idCliente);
        if($infoCliente['idCreacionSiigo']=='')
        {

        }

        // echo '<pre>';  
        // print_r($infoCliente);
        // echo '</pre>';
        // die(); 
        ?>
        <br>
        <div>
            <div class="col-lg-4">
                <label>Identi:</label>
                <input class="form-control" type="text" id="identiFac" value="<?php   echo $infoCliente['identi'] ?>">
            </div>
            <div class="col-lg-4">
                <label>Nombre:</label>
                <input class="form-control" type="text" id="nombreFac" value="<?php   echo $infoCliente['nombre'] ?>">
            </div>
            <div class="col-lg-4">
                <label>Apellido:</label>
                <input class="form-control" type="text" id="apellidoFac" value="<?php   echo $infoCliente['apellido'] ?>">
            </div>
            <div class="col-lg-4">
                <label>Telefono:</label>
                <input class="form-control" type="text" id="telefonoFac" value="<?php   echo $infoCliente['telefono'] ?>">
            </div>
            <div class="col-lg-6">
                <label>direccion:</label>
                <input class="form-control" type="text" id="direccionFac" value="<?php   echo $infoCliente['direccion'] ?>">
            </div>
            <div class="col-lg-6">
                <label>email:</label>
                <input class="form-control" type="text" id="emailFac" value="<?php   echo $infoCliente['email'] ?>">
            </div>
        </div>
        <?php   
         if($infoCliente['idCreacionSiigo']=='')
         {
          ?>
            <br><br>
            <div class="mt-3">
                <br>
                <button class="btn btn-primary" onclick="actualizarClienteFacElectronica(<?php  echo $idCliente ?>)">Continuar</button>
            </div>
            <!-- <div class="mt-3">
                <br>
                <button class="btn btn-primary" onclick="crearJsonFactura();">CrearFactura </button>
            </div> -->
          <?php   
         }
         else{
            echo '<div style="color:red;">Ya esta creado en Siigo</div> ';
         }
        ?>

        <?php

    }
}


?>