<?php
require_once('../funciones.class.php');

class VehiculosModelo{

    public function verificarPlaca($conexion,$placa){
        $sql_verificar_placa = "SELECT  * FROM  carros WHERE placa = '".$placa."' ";
        $consulta_placa = mysql_query($sql_verificar_placa,$conexion);
        return $consulta_placa;
    }

    public function traerVehiculos($conexion){
        $sql = "SELECT  c.placa,c.marca,c.tipo,c.color,c.idcarro,cli.nombre  as nombre
                FROM  carros  c
                LEFT OUTER JOIN cliente0 cli ON cli.idcliente = c.propietario ";
        $consulta = mysql_query($sql,$conexion);
        $filas = mysql_num_rows($consulta);
        $datos = funciones::table_assoc($consulta);
        $resp['filas']=$filas;
        $resp['datos']=$datos;
        return $resp;
    }

}

?>