<?php

class inventarioCodigosVista {

    public function __construct(){

    
    }

    public function inventariosMainVista($codigos)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/6f07c5d6ff.js" crossorigin="anonymous"></script>
            <title>Document</title>
        </head>
        <body class = "container" width ="95%">
            <div >
                <div>
                <button data-toggle="modal" data-target="#myModalProducto" class="btn btn-primary" onclick="pregunteNuevoCodigo(); ">NUEVO CODIGO</button>
            
            </div>
                <div id = "divResultadosInventarios"> <?php $this->mostrarCodigos($codigos); ?></div>
            </div>
            <?php $this->modalClientes(); ?>
            <?php $this->modalProducto(); ?>
            <?php $this->modalAumentarProducto(); ?>
        </body>
        </html>

        <?php
    }

    public function mostrarCodigos($codigos){
        echo '<div class="row">';
        echo '<table class="table" >';
        echo '<tbody>';
        echo '<tr>';
        echo '<th>Codigo</th>';
        echo '<th>Descripcion</th>';
        echo '<th>Cantidad</th>';
        echo '<th>Accion</th>';
        // echo '<th>Descontar</th>';
        echo '</tr>';
        echo '</tbody>';
        while($codigo = mysql_fetch_assoc($codigos)){
            echo '<tr>'; 
            echo '<td align="right"><button onclick="mostrarInfoCodigo('.$codigo['id_codigo'].');" class="btn btn-primary" data-toggle="modal" data-target="#myModalClientes">'.$codigo['codigo_producto'].'</button></td>';
            echo '<td>'.$codigo['descripcion'].'</td>';
            echo '<td>'.$codigo['cantidad'].'</td>';
            echo '<td><button onclick = "aumentarInventario('.$codigo['id_codigo'].'); "  data-toggle="modal" data-target="#myModalAumentarProducto" id="btnAdicionarExistencias" class="btn btn-primary"><i class="fas fa-plus"></i></button>';
            echo  '<button id="btnRetirarExistencias" class="btn btn-info"
                    onclick = "disminuirInventario('.$codigo['id_codigo'].'); "
                    data-toggle="modal" data-target="#myModalAumentarProducto" id="btnAdicionarExistencias"
                    >
                <i class="fas fa-minus"></i>
                </button>
            </td>';
            // echo '<td><button id="btnRetirarExistencias" class="btn btn-info"><i class="fas fa-minus"></i></button></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }

    public function modalClientes ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Consultar</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body" style="color:black;">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="verTalleres();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalProducto ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                  </div>
                  <div id="cuerpoModalProducto" class="modal-body" style="color:black;">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="verTalleres();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalAumentarProducto ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalAumentarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Inventario</h4>
                  </div>
                  <div id="cuerpoModalAumentarProducto" class="modal-body" style="color:black;">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pantallaInventario();">Cerrar</button>
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function pantallaCodigo($datosCodigo)
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
            <div class="row">
                <div class="form-group" >
                    <div align="left"class="col-md-3">Codigo:</div>    
                    <div align="left" class="col-md-9"><?php echo $datosCodigo['codigo_producto'] ?></div>
                </div>
                <div class="form-group" >
                    <div align="left" class="col-md-3">Descripcion:</div>    
                    <div align="left"  class="col-md-9"><?php echo $datosCodigo['descripcion'] ?></div>
                </div>
                <div class="form-group" >
                    <div align="left" class="col-md-3">Cantidad Inicial:</div>    
                    <div align="left"  class="col-md-9"><?php echo $datosCodigo['cantidad'] ?></div>
                </div>

            </div>
        </body>
        </html>
        <?php
    }
    public function pantallaPregunteCodigo(){
        ?>
        <div>
            <div class="form-group">
                <div class="col-md-3" >Codigo</div>
                <div class="col-md-9" ><input type="text" id="inputCodigo"></div>
            </div>
            <div class="form-group">
                <div class="col-md-3" >Descripcion</div>
                <div class="col-md-9" ><input type="text" id="inputDescripcion"></div>
            </div>
            <div class="form-group">
                <div class="col-md-3" >Cantidad</div>
                <div class="col-md-9" ><input type="text" id="inputCantidad"></div>
            </div>
            <div class="form-group">
                <div class="col-md-3" >Precio Compra</div>
                <div class="col-md-9" ><input type="text" id="inputPrecioCompra"></div>
            </div>
            <div class="form-group">
                <div class="col-md-3" >Precio Venta</div>
                <div class="col-md-9" ><input type="text" id="inputPrecioVenta"></div>
            </div>
            <br><br>
            <button data-dismiss="modal" class="btn btn-primary btn-block" id="btnProducto" onclick="grabarProducto();" >Grabar Producto</button>
        </div>
        <?php
    }

    public function pregunteInfoAumentarInvent($infoCode,$tipo){
        ?>
         <div >
            <input type="hidden" id="tipo" value = "<?php  echo $tipo ?>">
            <h3>
                <?php
                if($tipo == 1){
                       echo 'ENTRADA'; 
                    }else{
                        echo 'SALIDA'; 
                }    

                ?>    
            </h3>
            <!-- <form> -->
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label>Codigo:</label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                        <input class="form-control" onfocus="blur();"  value = "<?php echo $infoCode['descripcion']  ?>">
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php 
                            if($tipo == 1){
                                echo '<label>Factura No:</label>';
                            }else{
                                echo '<label>Venta No:</label>';
                            } 

                        ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                        <input class="form-control"  id = "factura">
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label>Cantidad</label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                        <input class="form-control"  id = "cantidad">
                    </div>
                </div>
                    <br><br>
                    <button class="btn btn-primary" onclick="grabarEntradaSalidaInventario(<?php  echo $infoCode['id_codigo']; ?>);">Grabar Movimiento</button>

            <!-- </form> -->
         </div>   

        <?php
    }
}

?>