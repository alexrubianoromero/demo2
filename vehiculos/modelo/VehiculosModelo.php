<?php

class VehiculosModelo{

    public function verificarPlaca($conexion,$placa){
        $sql_verificar_placa = "SELECT  * FROM  carros WHERE placa = '".$placa."' ";
        $consulta_placa = mysql_query($sql_verificar_placa,$conexion);
        return $consulta_placa;
    }
}

?>