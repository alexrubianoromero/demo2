<?php

Class CapturaOrden{

   public function infoMoto($datosMoto){
        ?>
          <table border="1" class="table">
                     <tr>
                         <td><label>Placa:</label></td>
                         <td><?php echo $datosMoto['placa'] ?></td>
                         <td><label>Marca:</label></td>
                         <td><?php echo $datosMoto['marca'] ?></td>
                     </tr>
                     <!-- <tr>
                     </tr> -->
                     <tr>
                         <td><label>Linea:</label></td>
                         <td><?php echo $datosMoto['tipo'] ?></td>
                         <td><label>Modelo:</label></td>
                         <td><?php echo $datosMoto['modelo'] ?></td>
                     </tr>
                     <!-- <tr>
                     </tr> -->
                     <tr>
                         <td><label>Color:</label></td>
                         <td><?php echo $datosMoto['color'] ?></td>
                     </tr>
                  </table>
        <?php
    }
  
    public function infoPersona($datosCliente){
          ?>
           <table border="1" class="table">
                      <tr>
                          <td> <label>Nombre:</label></td>
                          <td><?php echo  $datosCliente['nombre']; ?></td>
                      </tr>
                      <tr></label>
                          <td><label>Cedula:</label></td>
                          <td><?php echo  $datosCliente['identi']; ?></td>
                      </tr>
                      <tr>
                          <td><label>Direccion:</label></td>
                          <td><?php echo  $datosCliente['direccion']; ?></td>
                      </tr>
                      <tr>
                          <td><label>Telefono:</label></td>
                          <td><?php echo  $datosCliente['telefono']; ?></td>
                      </tr>
                      <tr>
                          <td><label>Email:</label></td>
                          <td><?php echo  $datosCliente['email']; ?></td>
                      </tr>
                    
                  </table>
          <?php
    }
}

?>