<?php
$raiz = dirname(dirname(dirname(__file__)));
// echo $raiz;
// die();
require_once($raiz.'/clientes/vista/ClientesVista.php');
require_once($raiz.'/clientes/modelo/ClientesModelo.class.php');

class ClientesControlador{
    private $conexion; 
    private $modelo;
    private $vista;

    public function __construct($conexion){

        $this->modelo = new ClientesModelo();
        $this->vista = new ClientesVista();
        $this->conexion = $conexion;


        if(!isset($_REQUEST['opcion'])){
            // die('llego aca '); 
            $this->pantallainicialClientes($conexion);
          }
        if($_REQUEST['opcion']=='verClientes'){
            $this->verClientes($conexion);
          }
          if($_REQUEST['opcion']=='nuevoPropietario'){
            $this->nuevoPropietario($this->conexion);
        }  
          if($_REQUEST['opcion']=='nuevoPropietarioDesdeVehiculo'){
            $this->nuevoPropietarioDesdeVehiculo($this->conexion);
        }  
        if($_REQUEST['opcion']=='grabarPropietario'){
            //     echo '<pre>';
            // print_r($_REQUEST);
            // echo '</pre>';
            // die();
                    $this->grabarPropietario($this->conexion,$_REQUEST);
            }
            if($_REQUEST['opcion']=='validarIdenti'){
                $this->validarIdenti($this->conexion,$_REQUEST['identi']);
            }   
            if($_REQUEST['opcion']=='cargarUltimoPropietario'){
                $this->cargarUltimoPropietario($conexion);
            }
        
    }

    public function pantallainicialClientes($conexion){
        
        $this->vista->pantallaInicialClientes();
    }
    public function verClientes($conexion){
        $clientes = $this->modelo->traerDatosCliente0($conexion);
        $this->vista->verClientes($clientes);

    }
    public function nuevoPropietario(){
        $this->vista->nuevoPropietario();
    }
    public function nuevoPropietarioDesdeVehiculo(){
        $this->vista->nuevoPropietarioDesdeVehiculo();
    }

    public function grabarPropietario($conexion,$request){
            $this->modelo->grabarPropietario($conexion,$request);
            $this->vista->propietarioGrabado();
    }
  

    public function cargarUltimoPropietario($conexion){
        $maxId = $this->modelo->traerMaxIdCLiente0($conexion);
        funciones::select_general_condicion('cliente0',$conexion,'idcliente','nombre' , $maxId);
    }
    
    public function validarIdenti($conexion,$identi){
        $validacion = $this->modelo->validarPropietario($conexion,$identi);
        if($validacion >0){
            echo '<p class="alerta1">Esta identidad ya existe en la base de datos</p> ';
        }
    }
    



}

?>