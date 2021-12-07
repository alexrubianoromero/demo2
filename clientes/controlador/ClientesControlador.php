<?php
$raiz = dirname(dirname(dirname(__file__)));
// echo $raiz;
// die();
require_once($raiz.'/clientes/vista/ClientesVista.php');
require_once($raiz.'/clientes/modelo/ClientesModelo.class.php');

class ClientesControlador{
    private $modelo;
    private $vista;

    public function __construct($conexion){
        $this->modelo = new ClientesModelo();
        $this->vista = new ClientesVista();
        if(!isset($_REQUEST['opcion'])){
            $this->pantallainicialClientes($conexion);
          }
    }

    public function pantallainicialClientes($conexion){
        $clientes = $this->modelo->traerDatosCliente0($conexion);
        $this->vista->pantallaInicialClientes($clientes); 
    }

}

?>