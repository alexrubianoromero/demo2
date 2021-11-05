<?php
require_once('../vehiculos/modelo/VehiculosModelo.php');
require_once('../funciones.class.php');
class VehiculoVista{


    public function pantallaCreacionVehiculo(){
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
                <div>
                    <?php $this->infoMoto($datosMoto); ?>
                    <button class="btn btn-default">GRABAR VEHICULO</button>

                </div>

            </body>
            </html>
            <script src = "../js/jquery-2.1.1.js"> </script>    
            <script src="../js/bootstrap.min.js"></script>
            <script src="../orden/js/orden.js"></script>    
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
        //    funciones::pintarTabla($datosVehiculos,1); 
        //    funciones::draw_table($datosVehiculos,1); 
        
    }

}

?>