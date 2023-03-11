<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/inventario_codigos/vista/inventarioCodigosVista.php');
require_once($raiz.'/inventario_codigos/modelo/CodigosInventarioModelo.php');
require_once($raiz.'/inventario_codigos/modelo/MovimientosInventarioModelo.php');

class CodigosInventarioControlador{
    private $vista; 
    private $modelo;
    private $movimientosModelo;  


    public function __construct(){

        // echo '<pre>'; 
        // print_r($_REQUEST);
        // echo '</pre>';
        // die(); 
        $this->vista =  new inventarioCodigosVista();
        $this->modelo = new CodigosInventarioModelo();
        $this->movimientosModelo = new MovimientosInventarioModelo();
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
            if($_REQUEST['opcion'] == 'aumentarDisminuirInventario'){
      
                $this->moreLessInvent($_REQUEST);
            }
         
            if($_REQUEST['opcion'] == 'grabarEntradaSalidaInventario'){
      
                $this->saveMoreLessInvent($_REQUEST);
            }

            
         
    }
    public function showVistaPrincipal(){
        // echo 'llego a vista principal '; 
        // die();
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
        
        public function morelessInvent($request){
            $infoCode = $this->modelo->getInfoCodeById($request['id']);
            $this->vista->pregunteInfoAumentarInvent($infoCode,$request['tipoMov']);   
        }
     

        public function saveMoreLessInvent($request)
        {
            // echo 'llego aca savemore'; 
            // die();
            $this->modelo->saveMoreLessInvent($request);
            $this->movimientosModelo->registerMov($request); 
        }
}

?>