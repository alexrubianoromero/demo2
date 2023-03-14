<?php

class cajaVista
{
    public function cajaVistaPrincipal()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
            <div>
                <div id="divBotonesCaja">
                    <div class="row">
                        <div class="col-xs-3">
                            <button 
                                data-toggle="modal" data-target="#myModalCaja"    
                                class ="btn btn-primary" onclick="entradaCaja(1);">Entradas</button>
                        </div>
                        <div class="col-xs-3">
                            <button class ="btn btn-primary">Salidas</button>
                        </div>
                        <div class="col-xs-3">
                            <button class ="btn btn-primary">Diario</button>
                        </div>
                        <div class="col-xs-3">
                            <button class ="btn btn-primary">Gen</button>
                        </div>
                        
                    </div>
                </div>
                <div id="divResultadosCaja">
                    
                    </div>
                </div>
            </body>
            </html>
             <?php $this->modalCaja(); ?>   
            <?php
    }
    
    public function modalCaja ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade" id="myModalCaja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Caja</h4>
                  </div>
                  <div id="cuerpoModalCaja" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function formuCajaEntrada($request)
    {
        if($request['tipo']==1){
            $titulo = 'Entrada';
        }
        else{
            $titulo = 'Salida';
        }
        ?>
        <div style="color:black">
        <h3><?php  echo $titulo;  ?></h3>
            <input type="hidden" id="tipo" value = "<?php echo $request['tipo']   ?>" >
            <div class="row">
                <div class ="col-xs-4"><label class ="form-control">Valor:</label></div>
                <div class="col-xs-8"><input type="text" id="txtValor" class ="form-control"></div>
            </div>
            <div class="row">
                <div class ="col-xs-4"><label class ="form-control">Pagado a:</label></div>
                <div class="col-xs-8"><input type="text" id="txtAquien" class ="form-control"></div>
            </div>
            <div class="row">
                <div class ="col-xs-4"><label class ="form-control">Concepto:</label></div>
                <div class="col-xs-8"><input type="text" id="txtConcepto" class ="form-control"></div>
            </div>
            <div class="row">
                <div class ="col-xs-4"><label class ="form-control">Observaciones:</label></div>
                <div class="col-xs-8"><input type="text" id="txtObservacion" class ="form-control"></div>
            </div>
            <div class="row">
                <div class="col-xs-12"><button  class ="btn btn-primary" onclick="grabarRecibo();">Registrar</button></div>
            </div>
        </div>

        <?php
    }
}


?>