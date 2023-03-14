<?php

$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');



class ReciboCajaModelo extends Conexion
{
    protected $conexion;

    public function __construct()
    {
        $this->conexion = $this->connectMysql();
    }

    public function grabarRecibo($request)
    {
        // echo '<pre>'; 
        // print_r($request); 
        // echo '</pre>';
        $sql = "insert into recibos_de_caja  (dequienoaquin,lasumade,porconceptode,observaciones,
        fecha_recibo,tipo_recibo)   
                values('".$request['txtAquien']."'
                    ,'".$request['txtValor']."'
                    ,'".$request['txtConcepto']."'
                    ,'".$request['txtObservacion']."'
                    ,now()
                    ,'".$request['tipo']."'
                ) ";
         $consulta = mysql_query($sql,$this->conexion );    
         echo 'Registro grabado';    
    }

}



?>