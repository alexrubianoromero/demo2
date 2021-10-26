<?php

Class CapturaOrden{

   public function infoMoto($datosMoto){
        ?>
          <table>
                     <tr>
                         <td>Fecha Recibida:</td>
                         <td></td>
                     </tr>
                     <tr>
                         <td>Placa:</td>
                         <td><?php echo $datosMoto['placa'] ?></td>
                     </tr>
                     <tr>
                         <td>Marca:</td>
                         <td><?php echo $datosMoto['marca'] ?></td>
                     </tr>
                     <tr>
                         <td>Linea:</td>
                         <td><?php echo $datosMoto['tipo'] ?></td>
                     </tr>
                     <tr>
                         <td>Modelo:</td>
                         <td><?php echo $datosMoto['modelo'] ?></td>
                     </tr>
                     <tr>
                         <td>Color:</td>
                         <td><?php echo $datosMoto['color'] ?></td>
                     </tr>
                  </table>
        <?php
    }
  
    public function infoPersona($datosCliente){
          ?>
           <table>
                      <tr>
                          <td>Nombre:</td>
                          <td><?php echo  $datosCliente['nombre']; ?></td>
                      </tr>
                      <tr>
                          <td>Cedula:</td>
                          <td><?php echo  $datosCliente['identi']; ?></td>
                      </tr>
                      <tr>
                          <td>Direccion:</td>
                          <td><?php echo  $datosCliente['direccion']; ?></td>
                      </tr>
                      <tr>
                          <td>Telefono:</td>
                          <td><?php echo  $datosCliente['telefono']; ?></td>
                      </tr>
                      <tr>
                          <td>Email:</td>
                          <td><?php echo  $datosCliente['email']; ?></td>
                      </tr>
                    
                  </table>
          <?php
    }
}

?>