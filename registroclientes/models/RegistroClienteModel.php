<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

    class RegistroClienteModel extends Conexion
    {
        public function __construct(){
         
        }

        public function grabarCliente($request)
        {
            $sql ="insert into cliente0 (identi,nombre,telefono,email) 
            values (
                '".$request['identi']."'
                ,'".$request['nombre']."'
                ,'".$request['telefono']."'
                ,'".$request['email']."'
            )"; 
            $consulta = mysql_query($sql,$this->connectMysql());
            $ultId =  $this->traerUltimoIdCliente0();
        }
        
        public function traerUltimoIdCliente0()
        {
            $sql = "select max(idcliente) as maxId from cliente0";
            $consulta = mysql_query($sql,$this->connectMysql());
            $arrId = mysql_fetch_assoc($consulta);
            $maxId = $arrId['maxId'];
            return $maxId;
        }
        
        public function traerInfoClienteId($id)
        {
            $sql = "select * from cliente0 where idcliente = '".$id."'  "; 
            $consulta = mysql_query($sql,$this->connectMysql());
            $arrCliente = mysql_fetch_assoc($consulta); 
            return $arrCliente;
        }
        public function traerInfoClienteIdenti($identi)
        {
            $sql = "select * from cliente0 where identi = '".$identi."'  "; 
            $consulta = mysql_query($sql,$this->connectMysql());
            $filas = mysql_num_rows($consulta); 
            $arrCliente = mysql_fetch_assoc($consulta); 
            $respu['filas'] = $filas; 
            $respu['data'] = $arrCliente; 
            return $respu;
        }




    }