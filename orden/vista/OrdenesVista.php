<?php

class OrdenesVista{

  
    public function pantallaInicial($arregloOrdenes){
        ?>
           <!DOCTYPE html>
           <html lang="en">
           <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="../css/bootstrap.min.css">  
               <link rel="stylesheet" href="../css/estilosresponsivos.css">  
               <link rel="stylesheet" href="../orden/css/ordenes.css">  
               <script src="https://kit.fontawesome.com/6f07c5d6ff.js" crossorigin="anonymous"></script>
               <title>Document</title>
               <style>
                   #div_pedir_datos_orden{
                       font-size: 20px;
                   }
               </style>
           </head>
           <body class="container">
               <div align = "center" id = "div_general_modulo_ordenes">   
                    <div id=" row divBotonesClientes">
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            ORDENES
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <button class="btn btn-primary" onclick="pintarOrdenes();">Listar</button>
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <button class="btn btn-primary" onclick = "iraCraerOrden();"  id= "btnCrearOrden">NUEVA</button>
                        </div>
                    </div>
                   
                   <div id="div_mostrar_ordenes" class = "resultadosValidacion">
                       <div>
                            <table class="table" >
                                <thead> 
                                <tr>
                                    <td>No</td>        
                                    <td>Fecha</td>        
                                    <td>Placa</td>        
                                    <td>Linea</td>        
                                </tr>
                                </thead>
                                <tbody>
                                    <?php  $this->pintarOrdenes($arregloOrdenes);  ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <div id="fomularioCracionOrden">
                        <!-- si la placa existe se visualizara el formulario de creacion de la orden -->
                        <!-- <button id="btn_mostrar_formulario_creacion_orden" onclick="mostrarFormularioCreacionOrden();">CREAR ORDEN </button> -->
                    </div>   
               </div>
               <?php  $this->modal(); ?>
               <?php  $this->modalClientes(); ?>
               <?php  $this->modalDatosOrden(); ?>


           </body>
           </html>
           <script src = "../js/jquery-2.1.1.js"> </script>    
           <script src="../js/bootstrap.min.js"></script>
           <script src="../orden/js/orden.js"></script>
           <script src="../vehiculos/js/vehiculos.js"></script>
           <script src="../clientes/js/clientes.js"></script>
           <script src="../inventario_codigos/js/codigosInventario.js"></script>

        <?php
    }

    
    public function pintarOrdenes($arregloOrdenes){
         
        for ($i=0; $i <= sizeof($arregloOrdenes);$i++ ){
           echo '<tr>';
           echo '<td><button  onclick="muestreDetalleOrden('.$arregloOrdenes[$i]['id'].');" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">'.$arregloOrdenes[$i]['orden'].'</button></td>';
           // echo '<td><button  onclick="muestreDetalleOrden('.$arregloOrdenes[$i]['id'].');" class="btn btn-primary" >'.$arregloOrdenes[$i]['orden'].'</button></td>';
           echo '<td>'.$arregloOrdenes[$i]['fecha'].'</td>';
           echo '<td>'.$arregloOrdenes[$i]['placa'].'</td>';
           echo '<td>'.$arregloOrdenes[$i]['tipo'].'</td>';
           echo '</tr>';
        }
    }

    public function modal (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Detalle Orden</h4>
                  </div>
                  <div id="cuerpoModal" class="modal-body">
                      el modal 
                      
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
    public function modalClientes (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade" id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    public function modalDatosOrden (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade" id="myModalDdatosOrden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevaOrden">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">CREACION DE ORDEN </h4>
                  </div>
                  <div id="cuerpoModalDatosOrden" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button onclick="pintarOrdenes();"  type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function mostrarInfoOrden($arregloOrden,$conexion,$resultadoItems){
        //  echo $arregloOrden['observaciones'];
        //  die();
    //     echo '<pre>';
    // print_r($arregloOrden);
    // echo '</pre>';
    // die();
        ?>
            <div id = "div_detalle_orden" >
                    <input type="hidden" id = "idOrden" value ="<?php echo $arregloOrden['id'];   ?>">
                    <div id="div_info_moto">
                    </div>
                    <div id="div_info_orden">
                         <table class="table table-striped">
                             <tr>
                                 <td>Orden No</td>
                                 <td><?php echo $arregloOrden['orden']; ?></td>
                             </tr>
                             <tr>
                                 <td>Fecha</td>
                                 <td><?php echo $arregloOrden['fecha']; ?></td>
                             </tr>
                        
                             <tr>
                                 <td>Telefono</td>
                                 <td><?php echo $arregloOrden['telefono']; ?></td>
                             </tr>
                             <tr>
                                 <td>Kilometraje</td>
                                 <td><?php echo $arregloOrden['kilometraje']; ?></td>
                             </tr>
                             <tr>
                                 <td>Mecanico</td>
                                 <td><?php echo $arregloOrden['mecanico']; ?></td>
                             </tr>
                             <tr>
                                 <td colspan= "2" align="center">Observaciones</td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                             <?php echo $arregloOrden['observaciones']; ?>
                                </td>
                             </tr>
                         </table>
                    </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-xs-12">
               
                        <button class="btn btn-primary" onclick="pregunteItems();">Agregar Item</button>
                    
                    </div>
                   
                </div>
            </div>
            <div id="divPregunteNuevoItem" style="color:black"></div>
            <div  id="div_items_orden">
                    <?php 
                    // echo $resultados['filas'] ;
                    // die();
                        if($resultadoItems['filas'] > 0){
                            $this->mostrarItemsOrden($arregloOrden['id'],$resultadoItems['datos']);  
                        }

                    ?>
            </div>
        <?php

   }
   public function mostrarItemsOrden($id,$items){
    // $items =  $this->itemsOrden->traerItemsOrdenId( $id,$conexion);
   // echo '<pre>';
   // print_r($items);
   // echo '</pre>';
   // die();
       ?>
       <table class="table table-striped">
           <thead>

               <tr>
                   <td>Codigo</td>
                   <td>Descripcion</td>
                   <td>Vr.Unit</td>
                   <td>Cant.</td>
                   <td>Vr.Total</td>
                   <td><i class="fas fa-trash"></i></td>
               </tr>
           </thead>
           <tbody>
               <?php
               $sumaItems = 0;
               for($i=0;$i<(sizeof($items));$i++)
               {
                    echo '<tr>';
                    echo '<td>'.$items[$i]["codigo"].'</td>';
                    echo '<td>'.$items[$i]["descripcion"].'</td>';
                    if($items[$i]["valor_unitario"] !=''){
                        echo '<td align="right">'.number_format($items[$i]["valor_unitario"], 0, ',', '.').'</td>';
                    }
                    else{
                        echo '<td></td>';
                    }
                   
                    echo '<td>'.$items[$i]["cantidad"].'</td>';
                    if($items[$i]["total_item"] !=''){
                        echo '<td align="right">'.number_format($items[$i]["total_item"], 0, ',', '.').'</td>';
                    }
                    else{
                        echo '<td></td>';
                    }
                    echo '<td><i class="fas fa-trash" onclick = "eliminarItemOrden('.$items[$i]["id_item"].');"></i></td>';

                    echo '</tr>';
                    $sumaItems += $items[$i]["total_item"];
               }
               echo '<tr>';
               echo '<td></td>';
               echo '<td></td>';
               echo '<td align="right">Total</td>';
               echo '<td></td>';
               echo '<td align="right">'.number_format($sumaItems, 0, ',', '.').'</td>';
               echo '</tr>';
               ?>
           </tbody>
       </table>


       <?php
  }
  
  
  /* funcion para mostrar el formu de creacion 
  /*
  */
  public function formuCrearOrden(){
      ?> 
      <br><br>
         Placa:
          <input type="text" class = "ingresoInformacion" 
            id="placaPeritaje" VALUE = "" 
            placeholder="PLACA" 
            onkeyup="convertMayusculas();"
            > 
        <!-- <button class="btn btn-primary" id = "consultarOrden" onclick="buscarPlacaPeritaje();"> -->
        <button class="btn btn-primary" id = "consultarOrden" onclick="buscarPlacaPeritajeDesdeOrden();">
        <i class="fas fa-search"></i>
        </button>
        <div id = "divResultadobusqueda" >

        </div>
        
      <?php
  }
  
  public function pedirDatosOrden($conexion,$placa,$consultaTecnicos){
      ?>
        <div id="div_pedir_datos_orden">

            <div class="row">
                <div class="form-group">
                    <label for="">Placa</label>
                    <?php echo $placa;  ?>
                </div>
            </div>
        <table>
                      
                        <tr>
                            <td>
                                <select id="tipo_medida">
                                   <option value = "1" selected > Klm</option> 
                                   <option value = "2"> Mil</option> 
                                   <option value = "3"> Hor</option> 
                                </select> 
                            </td>
                            <td>
                                <input id="kilometraje"type="text" size="6px">
                            </td>
                        </tr>
                        <tr>  
                            <td>  MECANICO:</td> </td>
                            <td> <select id ="mecanico" >
                                <?php
                                echo '<option value="-1"  >...</option>';
                                while($mecanicos = mysql_fetch_assoc($consultaTecnicos))
			                    {
			                        echo  '<option value = "'.$mecanicos['idcliente'].'"   > '.$mecanicos['nombre'].'  </option>';
			                    }
		                        ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">MOTIVO ORDEN</td>
                        </tr>
                        <tr> 
                            <div>

                                <td colspan="2"><textarea  id ="descripcion" cols = "25%" rows="5"></textarea></td>
                            </div>  
                        </tr>
                    </table>
                    
                    <button class = "btn btn-primary btn-block btn-lg" onclick="grabarordenMovil();">GRABAR ORDEN </button>

        </div>

      <?php
  }
  public function pregunteNuevoItem($id){
    ?> 
    <div>
        <button ><i class="fas fa-search"></i></button>
        <br>
        <input type = "hidden" value= "<?php echo $id ?>">
        <div class="row form-group">
            <div class="col-xs-3">
                <label >Codigo:</label>
            </div>
            <div class="col-xs-7">
                <!-- Codigo:<input type="text" id = "codNuevoItem" onblur="verifiqueCodigo();"> -->
                <input class ="form-control" 
                        type="text" 
                        id = "codNuevoItem" 
                        onblur="verificarSiExisteCodigo();"
                >
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-3">
                <label >Descripcion:</label>
            </div>
            <div class="col-xs-7">
                <input class ="form-control" type="text" id = "descripan" ">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-3">
                <label > Valor Unit:</label>
            </div>
            <div class="col-xs-7">
                <input class ="form-control" type="text" id = "valorUnitpan" ">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-3">
                <label > Cantidad: <span id="existencias" style="color:green;"></span><input type ="hidden" id="inputexistencias"></label>
            </div>
            <div class="col-xs-7">

                <input class ="form-control" 
                    type="text" 
                    id = "cantipan" 
                    onblur="generarTotalItem();"
                >
            </div>
        </div>
    
        <div class="row form-group">
            <div class="col-xs-3">
                <label > Total:</label>
            </div>
            <div class="col-xs-7">
                <input class ="form-control" type="text" id = "totalItem" onfocus="blur();" >
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-6">
                <button class="btn btn-primary"  onclick="cerrarVentanaNuevoItem();">Cancelar</button>
            </div>
            <div class="col-xs-6">
                <button class="btn btn-primary" id = "grabarNuevoItem" onclick="grabarNuevoItem(<?php echo $id ?>);">Grabar Item</button>
            </div>
        </div>
    </div>
    <?php
  }
}


?>