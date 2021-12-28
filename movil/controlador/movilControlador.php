<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/movil/vista/movilVista.php');

class movilControlador{
    private $vista;
    public function __construct($conexion){
                //   echo '<pre>';
                //   print_r($_REQUEST);
                //   echo '</pre>';
                //   die();    
        $this->vista =  new movilVista();
        
        if(!isset($_REQUEST['opcion'])){
             $this->pantallaLogueo();
        }       

        if($_REQUEST['opcion']=='menuPrincipal'){
             $this->menuPrincipal();
        }          
        if($_REQUEST['opcion']=='salirSistema'){
             $this->salirSistema();
        }  
    }
    public function pantallaLogueo(){
        $this->vista->pantallaLogueo();
    }
    public function menuPrincipal(){
        $this->vista->menuPrincipal();
    } 
    
    public function salirSistema(){
        $this->vista->pantallaLogueo();
    } 
}

?>