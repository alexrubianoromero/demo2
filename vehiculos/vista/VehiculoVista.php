<?php
// require_once('../funciones.class.php');

class VehiculoVista{


    public function pantallaCreacionVehiculo(){
        ?>
            <div>
                <?php $this->infoMoto($datosMoto); ?>
                    <button class="btn btn-default">GRABAR VEHICULO</button>
                </div>

            </body>
        <?php

    }


    public function pantallainicialVehiculos($datosVehiculos){
        ?>
           <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">  
                <link rel="stylesheet" href="../css/estilosresponsivos.css">  
                <title>Document</title>
            </head>
            <body>
            <div id="div_vehiculos" class="container">
                <div id="divBotonesvehiculo">
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        VEHICULOS
                    </div>
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <button class="btn btn-primary" onclick="pintarOrdenes();">Listar</button>
                    </div>
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <button class="btn btn-primary" onclick="nuevaPlaca();" >Nuevo</button>
                        <br><br>
                    </div>
                    </div>
                </div>
                <div align = "center" id="divResultadosVehiculos">
                    <?php   $this->verVehiculos($datosVehiculos);  ?>        
                </div>
                <?php  $this->modalClientes(); ?>
            </div>
            </body>
            </html>
            <script src = "../js/jquery-2.1.1.js"> </script>    
            <script src="../js/bootstrap.min.js"></script>
            <script src="../vehiculos/js/vehiculos.js"></script>
            <script src="../orden/js/orden.js"></script>
        <?php        
    }
    public function modalClientes(){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div class="modal fade" id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function infoMoto($datosMoto){
        ?>
          <table border="0" class="table">
                     <tr>
                         <td><label>Placa:</label></td>
                         <td><?php echo strtoupper($datosMoto['placa']) ?></td>
                         <td><label>Marca:</label></td>
                         <td><?php echo strtoupper($datosMoto['marca']) ?></td>
                     </tr>
                     <!-- <tr>
                     </tr> -->
                     <tr>
                         <td><label>Linea:</label></td>
                         <td><?php echo strtoupper($datosMoto['tipo']) ?></td>
                         <td><label>Modelo:</label></td>
                         <td><?php echo strtoupper($datosMoto['modelo']) ?></td>
                     </tr>
                     <!-- <tr>
                     </tr> -->
                     <tr>
                         <td><label>Color:</label></td>
                         <td><?php echo strtoupper($datosMoto['color']) ?></td>
                     </tr>
                  </table>
        <?php
    }

    public function verVehiculos($datosVehiculos){
        // echo '<pre>';
        // print_r($datosVehiculos);
        // echo '</pre>';
        if($datosVehiculos['filas']>0)
        {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>PLACA</th>
                        <th>MARCA</th>
                        <th>LINEA</th>
                        <th>NOMBRE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($datosVehiculos['datos'] as $vehi){
                            echo '<tr>';
                            echo '<td>'.strtoupper($vehi['placa']).'</td>';
                            echo '<td>'.strtoupper($vehi['marca']).'</td>';
                            echo '<td>'.strtoupper($vehi['tipo']).'</td>';
                            echo '<td>'.strtoupper($vehi['nombre']).'</td>';
                            echo '</tr>';
                        }
                        ?>
                </tbody>
                
            </table>
            <?php
        }
    }
    public function nuevaPlaca(){
        ?><div id="divPregunteDatos">
            <div id="divPreguntePlaca">
                <div class="col-xs-4">
                    <label>Placa</label>
                 
                </div>
                <div class="col-xs-4">
                
                    <input 
                        class = "form-control" 
                        type="text" 
                        id="placaPeritaje" 
                        size="3" 
                        value="" 
                        size = "10"
                        placeholder = 'PLACA'
                        >
                </div>
                <div class="col-xs-4">
                    <button 
                        class="btn btn-primary " 
                        onclick="buscarPlacaPeritaje();"  
                        id="btnBuscarPlaca"
                        placeholder = "PLACA"
                        >
                    <i class="fas fa-search"></i>
                    <!-- <i class="fas fa-search"></i> -->
                    </button>
                </div>

            </div>
            <div id="divResultadobusqueda">

            </div>
        </div>

        <?
    }

    
    public function mostrarDatosPlaca($datosPlaca,$datosCliente0)
    {
        ?>
        <div class="row" class="linea">
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
               
                <table class="table">
                <tr>
                    <td>
                    <input type="hidden" id="idCarroPeritaje" value = "<?php  echo $datosPlaca[0]['idcarro']; ?>">
                       <label> Propietario: </label>
                    </td>
                    <td><?php   echo $datosCliente0[0]['nombre']; ?></td>
                </tr>    
                <tr>
                    <td><label>Marca:</label></td>
                    <td><?php   echo $datosPlaca[0]['marca']; ?></td>
                </tr>    
                <tr>
                    <td><label>Color:</label></td>
                    <td><?php   echo $datosPlaca[0]['color']; ?></td>
                </tr>    
                <tr>
                    <td><label>VenciSoat:</label></td>
                    <td><?php   echo $datosPlaca[0]['vencisoat']; ?></td>
                </tr>    
                
            </table>
            </div>
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
            <table class="table">
            <tr>
                <td><label>Modelo:</label></td>
                <td><?php   echo $datosPlaca[0]['modelo']; ?></td>
            </tr>    
            <tr>
                <td><label>PLaca:</label></td>
                <td><?php   echo $datosPlaca[0]['placa']; ?></td>
            </tr>    
            </table>
            </div>
        </div>

     <?php
    }    
    public function preguntarDatosPlaca($placa,$propietarios){
        ?>
        <div class= "row" id="div_pregunte_datos_placa">
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                <table class="table">
                    <tr>
                        <td><label>Placa</label></td>
                        <td><?php echo $placa  ?>
                            <input type="hidden" id="placa" value = "<?php echo $placa ?>">
                    
                        </td>
                    </tr>
                    <tr>
                        <td><label>Propietario</label></td>
                        <td>
                            <select style="background:transparent;" name="selectPropietario" id="selectPropietario" class="form-control">
                            <?php  funciones::select_general($propietarios,'idcliente','nombre'); ?>
                            </select>
                            <button data-toggle="modal" data-target="#myModalClientes" onclick= "nuevoPropietarioDesdeVehiculo();" class="btn btn-primary"><i class="fas fa-plus-square"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Marca</label></td>
                        <td> <input type="text" id="marca" ></td>
                    </tr>
                    <tr>
                        <td><label>Linea</label></td>
                        <td> <input type="text" id="linea"></td>
                    </tr>
                    <tr>
                        <td><label>Modelo</label></td>
                        <td> <input type="text" id="modelo"></td>
                    </tr>
                
                </table>
            </div>
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                <table class="table">
                    <tr>
                        <td><label>Color</label></td>
                        <td> <input type="text" id="color"></td>
                    </tr>
                    <tr>
                        <td><label>Venci Soat</label></td>
                        <td> <input type="date" id="vencisoat"></td>
                    </tr>
                    <tr>
                        <td><label>Venci Tecno</label></td>
                        <td> <input type="date" id="revision"></td>
                    </tr>
                    <tr>
                        <td><label>Chasis</label></td>
                        <td> <input type="text" id="chasis"></td>
                    </tr>
                
                    <tr>
                        <td><label>Motor</label></td>
                        <td> <input type="text" id="motor"></td>
                    </tr>
                
                </table>
            </div>
            <div>
                <button class = "btn btn-primary btn-block btn-lg" onclick="grabarVehiculo();" >Grabar </button>
            </div>
        </div>
        <?php
    }
    public function preguntarDatosPlacaDesdeOrden($placa,$propietarios){
        ?>
        <div class= "row" id="div_pregunte_datos_placa">
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                <table class="table">
                    <tr>
                        <td><label>Placa</label></td>
                        <td><?php echo $placa  ?>
                            <input type="hidden" id="placa" value = "<?php echo $placa ?>">
                    
                        </td>
                    </tr>
                    <tr>
                        <td><label>Propietario</label></td>
                        <td>
                            <select style="background:transparent;" name="selectPropietario" id="selectPropietario" class="form-control">
                            <?php  funciones::select_general($propietarios,'idcliente','nombre'); ?>
                            </select>
                            <button data-toggle="modal" data-target="#myModalClientes" onclick= "nuevoPropietarioDesdeVehiculo();" class="btn btn-primary"><i class="fas fa-plus-square"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Marca</label></td>
                        <td> <input type="text" id="marca" ></td>
                    </tr>
                    <tr>
                        <td><label>Linea</label></td>
                        <td> <input type="text" id="linea"></td>
                    </tr>
                    <tr>
                        <td><label>Modelo</label></td>
                        <td> <input type="text" id="modelo"></td>
                    </tr>
                
                </table>
            </div>
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                <table class="table">
                    <tr>
                        <td><label>Color</label></td>
                        <td> <input type="text" id="color"></td>
                    </tr>
                    <tr>
                        <td><label>Venci Soat</label></td>
                        <td> <input type="date" id="vencisoat"></td>
                    </tr>
                    <tr>
                        <td><label>Venci Tecno</label></td>
                        <td> <input type="date" id="revision"></td>
                    </tr>
                    <tr>
                        <td><label>Chasis</label></td>
                        <td> <input type="text" id="chasis"></td>
                    </tr>
                
                    <tr>
                        <td><label>Motor</label></td>
                        <td> <input type="text" id="motor"></td>
                    </tr>
                
                </table>
            </div>
            <div>
                <button class = "btn btn-primary btn-block btn-lg" onclick="grabarVehiculoDesdeOrden();" >Grabar </button>
            </div>
        </div>
        <?php
    }
}

?>