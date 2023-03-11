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
            $consulta = mysql_query($sql,$conexion);
            echo 'Codigo Grabado'; 
        }

        public function saveMoreInvent($request)
        {
            $infoCode = $this->getInfoCodeById($request['id']);
            // echo 'desde el modelo<pre>'; 
            // print_r($infoCode);
            // echo '</pre>';
            // die();
            $conexion = $this->connectMysql();
            $infoActual = $this->getInfoCodeById($request['id']);
            $saldo = $infoActual['cantidad'] +  $request['cantidad'];
            $sql = "update productos set cantidad = '".$saldo ."' 
            where id_codigo = '".$request['id']."'   "; 
            // die($sql);
    
            $consulta = mysql_query($sql,$conexion);   

            echo 'Saldo actualizado !!!!'; 
        }

    }




?>