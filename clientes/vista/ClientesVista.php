<?php

class CLientesVista{



    public function pantallaInicialClientes(){
        ?>
        <!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link rel="stylesheet" href="../css/bootstrap.min.css">  
             <link rel="stylesheet" href="../css/estilosresponsivos.css">  
             <link rel="stylesheet" href="../../movil/css/estilo.css">  
             <title>Document</title>
         </head>
         <body class="fondoPrograma">
         <div id="div_clientes" class="container"  align="center">
             <div id=" row divBotonesClientes">
                 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     CLIENTES
                 </div>
                 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <button class="btn btn-primary" onclick="mostrarClientes();">Listar</button>
                 </div>
                 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                     <button class="btn btn-primary" onclick="btnNuevoPropietario();"  data-toggle="modal" data-target="#myModalClientes">Nuevo</button>
                 </div>
             </div>
             <div align = "center" id="divResultadosClientes">
              
             </div>
             <?php  $this->modalClientes(); ?>   
         </div>
         </body>
         </html>
         <script src = "../js/jquery-2.1.1.js"> </script>    
         <script src="../js/bootstrap.min.js"></script>
         <script src="../clientes/js/clientes.js"></script>
     <?php           
    }
    public function modalClientes (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body">
                      
                      
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

    public function verClientes($clientes){
        // echo '<pre>';
        // print_r($clientes);
        // echo '</pre>';
        if($clientes['filas']>0)
        {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>IDENTI</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <!-- <th>DIRECCION</th>
                        <th>EMAIL</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($clientes['datos'] as $vehi){
                            echo '<tr>';
                            echo '<td>'.strtoupper($vehi['identi']).'</td>';
                            echo '<td>'.strtoupper($vehi['nombre']).'</td>';
                            echo '<td>'.strtoupper($vehi['telefono']).'</td>';
                            // echo '<td>'.strtoupper($vehi['direccion']).'</td>';
                            // echo '<td>'.$vehi['email'].'</td>';
                            echo '</tr>';
                        }
                        ?>
                </tbody>
                
            </table>
            <?php
        }
    }

    public function nuevoPropietario(){
        ?>
        <div id="div_pregunte_datos_propietario">
            <div id="infoVerificaciones"></div>
            <table class="table">
                <tr>
                    <td><label>Identidad</label></td>
                    <td> <input type="text" id="identi" onchange="validarIdentidad(this.value)"></td>
                </tr>
                <tr>
                    <td><label>Nombre</label></td>
                    <td> <input type="text" id="nombre"></td>
                </tr>
                <tr>
                    <td><label>Telefono</label></td>
                    <td> <input type="text" id="telefono"></td>
                </tr>
                <tr>
                    <td><label>Direccion</label></td>
                    <td> <input type="text" id="direccion"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td> <input type="text" id="email"></td>
                </tr>
                <tr>
                    <td><label>Observaciones</label></td>
                    <td> <input type="text" id="observaciones"></td>
                </tr>
                <tr>
                    <td colspan="2"> <button onclick="grabarPrpietario();"class="btn btn-primary btn-block btn-lg" ">GRABAR PROPIETARIO</button></td>
                </tr>
            </table>
            </div>
        <?php
    }    
    public function nuevoPropietarioDesdeVehiculo(){
        ?>
        <div id="div_pregunte_datos_propietario">
            <div id="infoVerificaciones"></div>
            <table class="table">
                <tr>
                    <td><label>Identidad</label></td>
                    <td> <input type="text" id="identi" onchange="validarIdentidad(this.value)"></td>
                </tr>
                <tr>
                    <td><label>Nombre</label></td>
                    <td> <input type="text" id="nombre"></td>
                </tr>
                <tr>
                    <td><label>Telefono</label></td>
                    <td> <input type="text" id="telefono"></td>
                </tr>
                <tr>
                    <td><label>Direccion</label></td>
                    <td> <input type="text" id="direccion"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td> <input type="text" id="email"></td>
                </tr>
                <tr>
                    <td><label>Observaciones</label></td>
                    <td> <input type="text" id="observaciones"></td>
                </tr>
                <tr>
                    <td colspan="2"> <button onclick="grabarPropietarioDesdeVehiculos();"class="btn btn-primary btn-block btn-lg" ">GRABAR PROPIETARIO</button></td>
                </tr>
            </table>
            </div>
        <?php
    }    

    public function propietarioGrabado(){
        
        echo '<div class= "avisoGrabado">La informacion del propietario se guardo de forma exitosa</div>';
    }

}


?>