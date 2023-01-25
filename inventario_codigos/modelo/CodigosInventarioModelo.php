<?php


    class CodigosInventarioModelo
    {
        public function __construct()
        {

        }
       public function getInfoCode$codigo,$conexion)
        {
                $sql = "select * from productos where codigo = '".$codigo."'   ";
        }
    }




?>