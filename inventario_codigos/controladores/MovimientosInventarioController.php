<?php
require_once($raiz.'/inventario_codigos/modelo/MovimientosInventarioModelo.php');
class  MovimientosInventarioController {
    private $vista; 
    private $modelo;

    public function __construct()
    {
        $this->modelo = new MovimientosInventarioModelo();
        if($_REQUEST['opcion'] == 'vistaPrincipalInventarios'){
            $this->registerMov($data);
        } 
    }
    public function registerMov($data)
    {
        $this->modelo->registerMov($data,'1');

    }
}

?>