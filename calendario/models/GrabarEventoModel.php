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

    public function traerAgendaProximosdias($dias)
    {
        $sql = "    SELECT * FROM citas
                    WHERE fecha = DATE_ADD(CURDATE(), INTERVAL ".$dias." DAY)";
         $consulta = mysql_query($sql,$this->connectMysql());
         $filas = mysql_num_rows($consulta); 
         $eventos = $this->get_table_assoc($consulta);
         $respu['filas']=$filas; 
         $respu['info']=$eventos; 
         return $respu;
    }

}


?>