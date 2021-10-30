<?php

class ConsultaOrdenesVista
{
    public function __construct(){
    }

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
                <title>Document</title>
            </head>
            <body>
                <div align = "center">   
                    <div id="titulo">
                        <h3>LISTADO ORDENES</h3>
                    </div>
                    <div id="div_mostrar_ordenes " class = "resultadosValidacion">
                        <table class="table">
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
                <?php  $this->modal(); ?>


            </body>
            </html>
            <script src = "../js/jquery-2.1.1.js"> </script>    
            <script src="../js/bootstrap.min.js"></script>
            <script src="../orden/js/orden.js"></script>

         <?php
     }

     public function pintarOrdenes($arregloOrdenes){
         
         for ($i=0; $i <= sizeof($arregloOrdenes);$i++ ){
            echo '<tr>';
            echo '<td><button  onclick="muestreDetalleOrden('.$arregloOrdenes[$i]['id'].');" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">'.$arregloOrdenes[$i]['id'].'</button></td>';
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


       public function mostrarInfoOrden($arregloOrden){
           echo 'buenaaaaaaaaaaaa';
             echo 'Orden '.$arregloOrden['orden'];
       }

}

?>