<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/caja/model/ConceptoModel.php');

class cajaVista
{
    protected $modeloConcep; 

    public function __contruct()
    {
        $this->modeloConcep = new ConceptoModel(); 
    }

    public function cajaVistaPrincipal($saldoActual)
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
                <h2> Saldo Actual : <?php  echo number_format($saldoActual,0,",","."); ?></h2>
                <div id="divBotonesCaja">
                    <div class="row">
                        <div class="col-xs-3">
                            <button 
                                data-toggle="modal" data-target="#myModalCaja"    
                                class ="btn btn-primary" onclick="entradaCaja(1);">Entradas</button>
                        </div>
                        <div class="col-xs-3">
                            <button 
                               data-toggle="modal" data-target="#myModalCaja"   
                               class ="btn btn-primary" onclick="entradaCaja(2);">Salidas</button>
                            </div>
                            <div class="col-xs-3">
                                <button 
                                data-toggle="modal" data-target="#myModalCajaMovimientos"   
                            class ="btn btn-primary" onclick="mostrarMovimientosDia(1);">Diario</button>
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
             <?php $this->modalCajaMovimientos(); ?>   
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
                  <div id="cuerpoModalCaja" class="modal-body" style="color:black">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pantallaPrincipalCaja();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalCajaMovimientos ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade" id="myModalCajaMovimientos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Caja</h4>
                  </div>
                  <div id="cuerpoModalCajaMovimientos" class="modal-body" style="color:black">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pantallaPrincipalCaja();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function formuCajaEntrada($request,$conceptos=[],$tecnicos = [])
    {
        if($request['tipo']==1){
            $titulo = 'Entrada';
            $dequien = 'Recibido de:';
        }
        else{
            $titulo = 'Salida';
            $dequien = 'Pagado a:';
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
                <div class ="col-xs-4"><label class ="form-control"><?php  echo  $dequien;  ?></label></div>
                <div class="col-xs-8"><input type="text" id="txtAquien" class ="form-control"></div>
            </div>
            <div class="row">
                <div class ="col-xs-4"><label class ="form-control">Concepto:</label></div>
                <div class="col-xs-8">
                    <!-- <input type="text" id="txtConcepto" class ="form-control"> -->
                    <select  id="txtConcepto" 
                        class = "form-control"
                    >
                        <option value="0">Seleccione Concepto</option>
                        <?php $this->mostrarConceptos($conceptos); ?>
                    </select>
                </div>
            </div>
            <div id="divPregunteTecnico" class="row">
                <div class ="col-xs-4"><label class ="form-control">Tecnico:</label></div>
                <div class="col-xs-8">
                    <!-- <input type="text" id="txtConcepto" class ="form-control"> -->
                    <select  id="idTecnico" 
                        class = "form-control"
                    >
                        <option value="0">Seleccione Tecnico</option>
                            <?php $this->mostrarTecnicos($tecnicos); ?>
                    </select>
                </div>
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

    public function formuCajaEntrada_ante($request)
    {
        if($request['tipo']==1){
            $titulo = 'Entrada';
            $dequien = 'Recibido de:';
        }
        else{
            $titulo = 'Salida';
            $dequien = 'Pagado a:';
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
                <div class ="col-xs-4"><label class ="form-control"><?php  echo  $dequien;  ?></label></div>
                <div class="col-xs-8"><input type="text" id="txtAquien" class ="form-control"></div>
            </div>
            <div class="row">
                <div class ="col-xs-4"><label class ="form-control">Concepto:</label></div>
                <div class="col-xs-8">
                    <input type="text" id="txtConcepto" class ="form-control">
                </div>
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

    public function mostrarRecibos($recibos)
    {
        
        echo '<div class="row">';
        echo '<table class="table" >';
        echo '<tbody>';
        echo '<tr>';
        echo '<th>Fecha</th>';
        echo '<th>Tipo</th>';
        echo '<th>Nombre</th>';
        echo '<th>Concepto</th>';
        echo '<th>Valor</th>';
        // echo '<th>Descontar</th>';
        echo '</tr>';
        echo '</tbody>';
        $total = 0;
        while($recibo = mysql_fetch_assoc($recibos))
        {
            echo '<tr>';
            echo '<td>'.$recibo['fecha_recibo'].'</td>';
            echo '<td>'.$recibo['tipo_recibo'].'</td>';
            echo '<td>'.$recibo['dequienoaquin'].'</td>';
            echo '<td>';
            // $concepto = $this->modeloConcep->traerConceptoConId($recibo['idConcepto']); 
            echo $recibo['idConcepto'];
            // echo $concepto;
            echo '</td>';
            echo '<td align="right">'.number_format($recibo['lasumade'],0,",",".").'</td>';
            echo '</tr>';

            $total = $total + $recibo['lasumade'];

        }
        echo '<tr>';
        echo '<td colspan= "3"></td>';
        echo '<td>Total:</td>';
        echo '<td align="right">'.number_format($total,0,",",".").'</td>';
        echo '</tr>';
        
        echo '</table>';
        echo '</div>';
    }
    public function mostrarConceptos($conceptos)
    {
            foreach($conceptos as $concepto)
            {
                echo '<option value = "'.$concepto['idConcepto'].'">'.$concepto['concepto'].'</option>';
            }
    }
        
    public function mostrarTecnicos($tecnicos)
    {
        foreach($tecnicos as $tecnico)
        {
            echo '<option value = "'.$tecnico['idcliente'].'">'.$tecnico['nombre'].'</option>';
        }
            
    }
}


?>