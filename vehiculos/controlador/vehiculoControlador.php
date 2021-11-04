<?php
require_once('../vehiculos/vista/VehiculoVista.php');
require_once('../vehiculos/modelo/VehiculosModelo.php');
// require_once('../funciones.class.php');
class vehiculoControlador{
    private $vehiculoVista;
    private $vehiculoModelo;
    
    public function __construct()
    {
      $this->vehiculoVista = new VehiculoVista();
      $this->vehiculoModelo = new VehiculosModelo();
            
    }

    public function creacionVehiculo($placa,$conexion){

        $this->vehiculoVista->pantallaCreacionVehiculo($placa,$conexion); 
    }

    public function muestreVehiculos($conexion){
            $datosVehiculos = $this->vehiculoModelo->traerVehiculos($conexion);
            // echo 'asdasdas';
            $this->vehiculoVista->verVehiculos($datosVehiculos);
    }
}

?>