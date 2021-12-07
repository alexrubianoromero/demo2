<?php
require_once('../vehiculos/vista/VehiculoVista.php');
require_once('../vehiculos/modelo/VehiculosModelo.php');
// require_once('../funciones.class.php');
class vehiculoControlador{
    private $vehiculoVista;
    private $vehiculoModelo;
    
    public function __construct($conexion)
    {
        $this->vehiculoVista = new VehiculoVista();
        $this->vehiculoModelo = new VehiculosModelo();
        
        if(!isset($_REQUEST['opcion'])){
          $this->pantallainicialVehiculos($conexion);
        }
        if($_REQUEST['opcion']=='buscarPlaca'){
            $this->muestreVehiculos($conexion);
        }
        if($_REQUEST['opcion']=='crearVehiculo'){
          $this->creacionVehiculo($conexion);
      }

    }


    public function pantallainicialVehiculos($conexion){
        $datosVehiculos = $this->vehiculoModelo->traerVehiculos($conexion);
        $this->vehiculoVista->pantallainicialVehiculos($datosVehiculos);         
    }
    
    public function muestreVehiculos($conexion){
            $datosVehiculos = $this->vehiculoModelo->traerVehiculos($conexion);
            // echo 'asdasdas';
            $this->vehiculoVista->verVehiculos($datosVehiculos);
    }

    public function creacionVehiculo($placa,$conexion){

        $this->vehiculoVista->pantallaCreacionVehiculo($placa,$conexion); 
    }

}

?>