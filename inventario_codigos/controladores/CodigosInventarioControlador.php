<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/inventario_codigos/vista/inventarioCodigosVista.php');
require_once($raiz.'/inventario_codigos/modelo/CodigosInventarioModelo.php');

class CodigosInventarioControlador{
    private $vista; 
    private $modelo;


    public function __construct(){

        // echo '<pre>'; 
        // print_r($_REQUEST);
        // echo '</pre>';
        // die(); 
        $this->vista =  new inventarioCodigosVista();
        $this->modelo = new CodigosInventarioModelo();
            if($_REQUEST['opcion'] == 'vistaPrincipalInventarios'){
                $this->showVistaPrincipal();
            } 
            if($_REQUEST['opcion'] == 'mostrarCodigo'){
                $this->showCode($_REQUEST['idCodigo']);
            }
            
            if($_REQUEST['opcion'] == 'pregunteNuevoCodigo'){
                $this->askNewCode();
            }
            if($_REQUEST['opcion'] == 'grabarCodigo'){
                $this->saveCode($_REQUEST);
            }
            
    }
    public function showVistaPrincipal(){
        // echo 'llego a vista principal '; 
            $codigos = $this->modelo->mostrarCodigosInventarios();
            $this->vista->inventariosMainVista($codigos);
    } 
    public function showCode($idCodigo){
            // echo 'codigo '.$idCodigo;
            $infoCode = $this->modelo->getInfoCodeById($idCodigo);
            //       echo '<pre>'; 
            // print_r($infoCode);
            // echo '</pre>';
            // die();
            $this->vista->pantallaCodigo($infoCode);            
        }
        
        public function askNewCode(){
            // die('llego aca');
            $this->vista->pantallaPregunteCodigo();    
        }
        
        public function saveCode($request)
        {
            $infoCode = $this->modelo->saveCode($request);
        }
}



?>