<?php
Class OrdenesModelo{
  

    public function __construct(){
    }


     public function traerOrdenes($conexion){
         $sql = " SELECT o.id,o.orden,o.fecha,o.placa,c.tipo FROM ordenes o 
                  LEFT JOIN carros c on c.placa = o.placa 
                  ORDER BY  o.id DESC 
                  ";
         $consulta = mysql_query($sql,$conexion);
         $arreglo= '';
         $i=0;
         while($resul = mysql_fetch_assoc($consulta)){
                $arreglo[$i]['id'] = $resul['id'];
                $arreglo[$i]['orden'] = $resul['orden'];
                $arreglo[$i]['fecha'] = $resul['fecha'];
                $arreglo[$i]['placa'] = $resul['placa'];
                $arreglo[$i]['tipo'] = $resul['tipo'];
                $i++;
         }
         return $arreglo;
     }   


     public function traerOrdenId($id,$conexion){
        $sql = " SELECT o.orden,o.fecha,cli.telefono,o.kilometraje,o.observaciones,t.nombre as mecanico,o.id 
                 FROM ordenes o 
                 LEFT JOIN carros c on c.placa = o.placa
                 LEFT JOIN cliente0 cli on cli.idcliente = c.propietario 
                 LEFT JOIN tecnicos t on t.idcliente = o.mecanico
                 WHERE  o.id = '".$id."'
                 ORDER BY  o.id DESC 
        ";
        // echo '<br>'.$sql;
        // die();
        $consulta = mysql_query($sql,$conexion);
        $arreglo= mysql_fetch_assoc($consulta);
        return $arreglo;
     }

     
    
}
?>