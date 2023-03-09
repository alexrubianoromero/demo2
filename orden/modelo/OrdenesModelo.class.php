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
        $consulta = mysql_query($sql,$conexion);
        $arreglo= mysql_fetch_assoc($consulta);
        return $arreglo;
    }
    public function traerDatosEmpresa($conexion){
        $sql="SELECT * FROM empresa";
        $consulta = mysql_query($sql,$conexion);
        $arreglo = mysql_fetch_assoc($consulta);
        return $arreglo;  

    }
    public function traerNumeroOrdenActual($conexion){
        $sql="SELECT contaor FROM empresa " ; 
        $consulta = mysql_query($sql,$conexion);
        $arreglo = mysql_fetch_assoc($consulta);
        $contaor = $arreglo['contaor'];
        return $contaor;
    } 
    public function actualizarContadorOrdenes($conexion,$siguienteNumero){
        $sql ="UPDATE empresa  SET contaor = '".$siguienteNumero."'";
        // echo '<br>'.$sql;
        // die();
        $consulta = mysql_query($sql,$conexion);
    } 
    
    public function grabarOrden($conexion,$datos){
        $datosEmpresa = $this->traerDatosEmpresa($conexion);
        $id_empresa = $datosEmpresa['id_empresa'];
        $numeroActual = $this->traerNumeroOrdenActual($conexion);
        $siguienteNumero =  $numeroActual + 1;
        // echo '<br>'.$siguienteNumero;
        // die(); 
        $sql = "insert into ordenes
        (orden,placa,fecha,observaciones,id_empresa,estado,kilometraje,mecanico,tipo_orden,
        tipo_medida_kms_millas_horas) 
        values (
            '".$siguienteNumero."',
            '".$datos['placa']."',
            now(),
            '".$datos['descripcion']."',
            '".$id_empresa."',
            '0',
            '".$datos['kilometraje']."',
            '".$datos['mecanico']."',
            '1',
            '".$datos['tipo_medida']."'
            )";
            // echo '<br>'.$sql;
            // die();
            $consulta = mysql_query($sql,$conexion);    
            $this->actualizarContadorOrdenes($conexion,$siguienteNumero);  
            return $siguienteNumero; 
        }

    public function traerEmailCLiente($placa,$conexion){
          $sql  = "SELECT  cli.email as email FROM  carros ca 
                   INNER JOIN cliente0 cli ON  cli.idcliente = ca.propietario ";
          $consulta = mysql_query($sql,$conexion);
          $arreglo = mysql_fetch_assoc($consulta);
          $email = $arreglo['email']; 
          return $email;            
    }
}
?>