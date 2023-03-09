<?php

class TecnicosModelo{

    public function __construct(){

    }
    public function traerTecnicos($conexion){
     
        $sql = "SELECT * FROM tecnicos "; 
        // echo '<br>'.$sql;
        // die();
        $consulta = mysql_query($sql,$conexion);
        return $consulta;  
    }
}



?>