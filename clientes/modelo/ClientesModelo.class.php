<?php
// require_once('../../valotablapc.php');  
class ClientesModelo{

        public function __construct(){
            // $this->tabla41 =  $tabla4;   
         }

         public function traerDatosClienteId($id,$tabla3,$conexion){
                $sql = "SELECT * FROM $tabla3 WHERE idcliente = '".$id."' ";
                // echo '<br>'.$sql; 
                // die();
                $consulta = mysql_query($sql,$conexion); 
                $datosCliente = mysql_fetch_assoc($consulta); 
                // echo '<pre>';
                // print_r($datosCliente);
                // echo '</pre>';
                // die();
                return $datosCliente; 
         }
}


?>