<?php
$raiz = dirname(dirname(dirname(__file__)));
//  die('controller'.$raiz);
require_once($raiz.'/empresa/modelo/EmpresaModelo.php');


class EmpresaController{

    protected $model;

    public function __construct(){
        $this->model = new EmpresaModelo(); 


    }

        

    

    public function traerInfoEmpresa($conexion){

        $sql = "select * from empresa ";

        $consulta = mysql_query($sql,$conexion);

        $arreglo = mysql_fetch_assoc($consulta);

        return $arreglo;  

    }

    public function pruebaEmpresa(){



        echo 'llego aca ';

    }

}



?>