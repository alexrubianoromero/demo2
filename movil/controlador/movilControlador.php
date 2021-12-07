<?php
$raiz = dirname(dirname(dirname(__file__)));
// echo $raiz;
// die();
 
require_once($raiz.'/movil/vista/movilVista.php');
// require_once($raiz.'/clientes/controlador/ClientesControlador.php');
require_once($raiz.'/clientes/modelo/ClientesModelo.class.php');
require_once($raiz.'/clientes/vista/ClientesVista.php');
require_once($raiz.'/vehiculos/modelo/VehiculosModelo.php');
require_once($raiz.'/vehiculos/vista/VehiculoVista.php');
require_once($raiz.'/orden/controlador/ordenControlador.php');


class movilControlador{
    private $vista;
    private $clientesModelo;
    private $clientesVista;
    private $carrosModelo;
    private $carrosVista; 
    private $ordenControlador; 
   

    public function __construct($conexion){
                //   echo '<pre>';
                //   print_r($_REQUEST);
                //   echo '</pre>';
                //   die();    
        $this->vista =  new movilVista();
        $this->clientesModelo =  new ClientesModelo();
        $this->clientesVista  =  new CLientesVista($conexion);
        $this->carrosModelo   =  new VehiculosModelo($conexion);
        $this->carrosVista    =  new VehiculoVista($conexion);
        $this->ordenControlador    =  new ordenControlador($conexion);


        if(!isset($_REQUEST['opcion'])){
             $this->pantallaLogueo();
        }       

        if($_REQUEST['opcion']=='menuPrincipal'){
             $this->menuPrincipal();
        }          
        if($_REQUEST['opcion']=='salirSistema'){
             $this->salirSistema();
        }  
        if($_REQUEST['opcion']=='clientes'){
             $this->clientes($conexion);
        }  
        if($_REQUEST['opcion']=='vehiculos'){
             $this->vehiculos($conexion);
        }  
        if($_REQUEST['opcion']=='ordenes'){
             $this->ordenes($conexion);
        }  
                
    }
    public function pantallaLogueo(){
        // echo 'buenas ';
        // die();
        $this->vista->pantallaLogueo();
    }
    public function menuPrincipal(){
        $this->vista->menuPrincipal();
    } 
    
    public function salirSistema(){
        $this->vista->pantallaLogueo();
    } 
    public function clientes($conexion){
        $clientes =$this->clientesModelo->traerDatosCliente0($conexion);
        $this->clientesVista->pantallaInicialClientes($clientes);
    }
    public function vehiculos($conexion){
        $vehiculos =$this->carrosModelo->traerVehiculos($conexion);
        $this->carrosVista->pantallainicialVehiculos($vehiculos);
    }
    public function ordenes($conexion){
        $this->ordenControlador->pantallaConsultas($conexion);  
    }

}

?>