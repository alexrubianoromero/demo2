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
        if($request['idOrden']==''){ $request['idOrden']=0;}

        $sql = "insert into recibos_de_caja  (dequienoaquin,lasumade,porconceptode,observaciones,
        fecha_recibo,tipo_recibo,idTecnico,idConcepto,efectivo,t_debito,t_credito,id_orden)   
                values('".$request['txtAquien']."'
                    ,'".$request['txtValor']."'
                    ,'".$request['txtConcepto']."'
                    ,'".$request['txtObservacion']."'
                    ,now()
                    ,'".$request['tipo']."'
                    ,'".$request['idTecnico']."'
                    ,'".$request['txtConcepto']."'
                    ,'".$request['txtEfectivo']."'
                    ,'".$request['txtDebito']."'
                    ,'".$request['txtCredito']."'
                    ,'".$request['idOrden']."'
                ) ";
         $consulta = mysql_query($sql,$this->conexion );    
         echo 'Registro grabado<br>';    
         $this->afectarSaldo($request);
    }

    public function  afectarSaldo($request)
    {
        $saldoActual = $this->traerSaldoActual();
        if($request['tipo']==1)
        {
            $nuevoSaldo = $saldoActual + $request['txtValor'];
        }else{
            $nuevoSaldo = $saldoActual - $request['txtValor'];
        }
        $sql = "update empresa set saldocajamenor = '".$nuevoSaldo."'  "; 
        $consulta = mysql_query($sql,$this->conexion ); 
        echo '<br>saldo actualizado';
    }

    public function traerSaldoActual()
    {
        $sql= "select saldocajamenor from empresa ";
        $consulta = mysql_query($sql,$this->conexion );
        $arrSaldo = mysql_fetch_assoc($consulta);
        $saldo = $arrSaldo['saldocajamenor'];
        return $saldo; 
    }

    public function informeCaja($request)
    {
        $fechapan =  time();
        $fechapan =  date ( "Y/m/j" , $fechapan );

        $sql = "select * from recibos_de_caja where 1=1   ";

        if(isset($request['tipoInforme']))
        {
            $sql .= "  and  fecha_recibo =  '".$fechapan."'  " ;  
        }

        $consulta = mysql_query($sql,$this->conexion);
        return $consulta;
    }


}



?>