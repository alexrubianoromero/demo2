<?php
require_once('../funciones.class.php');

class VehiculosModelo{

    public function verificarPlaca($conexion,$placa){
        $sql_verificar_placa = "SELECT  * FROM  carros WHERE placa = '".$placa."' ";
        $consulta_placa = mysql_query($sql_verificar_placa,$conexion);
        return $consulta_placa;
    }
    public function traerVehiculos($conexion){
        $sql = "SELECT  c.placa,c.marca,c.tipo,cli.nombre 
                                FROM  carros  c
                                LEFT OUTER JOIN cliente0 cli on cli.idcliente = c.propietario    ";
        $consulta = mysql_query($sql,$conexion);
        $arreglo = funciones::table_assoc($consulta);
        //  funciones::printR($arreglo);
        return $arreglo;
    }
}

?>