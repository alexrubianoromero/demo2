<?php

class CLientesVista{



    public function pantallaInicialClientes($clientes){
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
                 <?php   $this->verClientes($clientes);  ?>        
             </div>
         </div>
         </body>
         </html>
         <script src = "../js/jquery-2.1.1.js"> </script>    
         <script src="../js/bootstrap.min.js"></script>
         <script src="../js/vehiculos.js"></script>
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



}


?>