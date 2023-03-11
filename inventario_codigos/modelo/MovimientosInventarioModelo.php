<?php
    $raiz = dirname(dirname(dirname(__file__)));
    require_once($raiz.'/conexion/Conexion.php');

    class MovimientosInventarioModelo extends Conexion
    {
        public function __construct(){
         
        }

        public function registerMov($data,$tipo_movimiento)
        {
            $conexion = $this->connectMysql();
            $sql = "insert into movimientos_inventario 
                    (fecha_movimiento,cantidad,tipo_movimiento,facturacompra,id_codigo_producto)
                    values( now(), '".$data['cantidad']."','".$tipo_movimiento."'
                    ,'".$data['factura']."'
                    ,'".$data['factura']."'
                    ) "; 

            $consulta = mysql_query($sql,$conexion);  
            echo 'Movimiento grabado';        
        }


    }


?>