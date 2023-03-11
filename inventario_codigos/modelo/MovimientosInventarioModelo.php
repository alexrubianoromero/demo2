<?php
    $raiz = dirname(dirname(dirname(__file__)));
    require_once($raiz.'/conexion/Conexion.php');

    class MovimientosInventarioModelo extends Conexion
    {
        public function __construct(){
         
        }

        public function registerMov($data)
        {
            $conexion = $this->connectMysql();
            if($data['tipo']==1)
            { $campo = 'facturacompra';}
            else{ $campo = 'id_factura_venta';}
            
             $sql = "insert into movimientos_inventario 
                    (fecha_movimiento,cantidad,tipo_movimiento,".$campo.",id_codigo_producto)
                    values( now(), '".$data['cantidad']."','".$data['tipo']."'
                    ,'".$data['factura']."'
                    ,'".$data['id']."'
                    ) "; 
            $consulta = mysql_query($sql,$conexion);  
            echo '<br>Movimiento grabado';        
        }


    }


?>