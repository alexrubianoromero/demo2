<?php
require_once('../funciones.class.php');

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
                <div id="divBotonesvehiculo"></div>
                <div align = ""center id="divResultadosVehiculos">
                    <?php   $this->verVehiculos($datosVehiculos);  ?>        
                </div>
            </div>
            </body>
            </html>
            <script src = "../js/jquery-2.1.1.js"> </script>    
            <script src="../js/bootstrap.min.js"></script>
            <script src="../vehiculos/js/vehiculos.js"></script>
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

}

?>