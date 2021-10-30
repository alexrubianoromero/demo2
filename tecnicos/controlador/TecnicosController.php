<?php
require_once('../tecnicos/modelo/TecnicosModelo.php');
require_once('../tecnicos/vista/TecnicosVista.php');

class TecnicosController{
    private $tecnicos;
    // private $vista; 
      
    public function __construct(){
        $this->tecnicos = new TecnicosModelo();
        $this->vista = new TecnicosVista();
    }
    public function traerTecnicos($conexion){
      
       $arregloTecnicos = $this->tecnicos->traerTecnicos($conexion);
        if(mysql_num_rows($arregloTecnicos)>0);
        {
        
            echo json_encode()
                // $this->vista->mostrarTecnicos($arregloTecnicos);
        }
     

    //    return $arregloTecnicos; 
    }
}


?>