<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

    class CodigosInventarioModelo extends Conexion
    {
        public function __construct(){
         
        }

       public function getInfoCode($codigo,$conexion)
        {
            $sql = "select * from productos where codigo = '".$codigo."'  ";
        }
        
        public function mostrarCodigosInventarios(){
            $conexion = $this->connectMysql();
            $sql = "select * from productos order by id_codigo desc ";
            $consulta = mysql_query($sql,$conexion);
            
            return $consulta; 
        } 
        
        public function getInfoCodeById($id)
        {
            $conexion = $this->connectMysql();
            $sql = "select * from productos where id_codigo = '".$id."'   ";
            // die($sql); 
            $consulta = mysql_query($sql,$conexion);
            $infoCode = mysql_fetch_assoc($consulta);
            return $infoCode; 
            
        }
        public function saveCode($request){
            $conexion = $this->connectMysql();
            $sql = "insert into productos (codigo_producto,descripcion,cantidad,precio_compra,valorventa)   
            values ('".$request['codigo']."'
            ,'".$request['descripcion']."'
            ,'".$request['cantidad']."'
            ,'".$request['precioCompra']."'
            ,'".$request['precioVenta']."'
            
            )";
            // echo $sql;
            $consulta = mysql_query($sql,$conexion);
            echo 'Codigo Grabado'; 
        }

    }




?>