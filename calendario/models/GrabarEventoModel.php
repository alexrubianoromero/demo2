<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/conexion/Conexion.php');
// die($raiz);

class GrabarEventoModel extends Conexion
{
    // public function __construct(){
    //     if(!($request['opcion'])){
    //         $this->traerEventos();
    //     }
    // }
    
    public function grabarEvento($request)
    {
        $sql = "INSERT INTO citas (fecha, placa,hora,email,servicio) 
        VALUES ('".$request['fecha']."','".$request['placa']."'
        ,'".$request['hora']."','".$request['email']."','".$request['servicio']."')";
        $consulta = mysql_query($sql,$this->connectMysql());
    }

    public function actualizarEvento($request)
    {
        $sql = "update  citas set fecha =  '".$request['nuevaFecha']."' where id =   '".$request['id']."'";
        $consulta = mysql_query($sql,$this->connectMysql());
    }

}


?>