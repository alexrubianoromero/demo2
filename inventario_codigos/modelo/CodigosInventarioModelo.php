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
        public function traerIdCodeConCode($code)
        {
            $sql ="select id_codigo from productos   where codigo_producto = '".$code."'  ";
            $consulta = mysql_query($sql,$this->connectMysql());
            $arrCodigo = mysql_fetch_assoc($consulta);
            $id_codigo = $arrCodigo['id_codigo']; 
            return $id_codigo; 
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
        public function getInfoCodeFiltros($request)
        {
            $conexion = $this->connectMysql();
            $sql = "select * from productos where 1=1 ";
            if($request['referencia'] != '' )
            {
               $sql .= "  and referencia like '%".$request['referencia']."%'   ";
            }
            
            if($request['descripcion'] != '' )
            {
               $sql .= "  and descripcion like '%".$request['descripcion']."%'   ";
            }
            // die($sql); 
            $consulta = mysql_query($sql,$conexion);
            return $consulta; 
        }


        public function saveCode($request){
            $conexion = $this->connectMysql();
            $sql = "insert into productos (codigo_producto,descripcion,cantidad,cantidad_inicial,precio_compra,valorventa,valor_unit,repman,referencia)   
            values ('".$request['codigo']."'
            ,'".$request['descripcion']."'
            ,'".$request['cantidad']."'
            ,'".$request['cantidad']."'
            ,'".$request['precioCompra']."'
            ,'".$request['precioVenta']."'
            ,'".$request['precioCompra']."'
            ,'".$request['tipoCod']."'
            ,'".$request['referencia']."'
            
            )";
            // die($sql); 
            $consulta = mysql_query($sql,$conexion);
            echo 'Codigo Grabado'; 
        }

        public function saveMoreLessInvent($request)
        {
            $infoCode = $this->getInfoCodeById($request['id']);
            // echo 'desde el modelo<pre>'; 
            // print_r($infoCode);
            // echo '</pre>';
            // die();
            $conexion = $this->connectMysql();
            $infoActual = $this->getInfoCodeById($request['id']);
            if($request['tipo']==1){
                $saldo = $infoActual['cantidad'] +  $request['cantidad'];
            }else{
                $saldo = $infoActual['cantidad'] -  $request['cantidad'];
            }

            $sql = "update productos set cantidad = '".$saldo ."' 
            where id_codigo = '".$request['id']."'   "; 
            // die($sql);
    
            $consulta = mysql_query($sql,$conexion);   

            echo 'Saldo actualizado !!!!'; 
        }

    }




?>