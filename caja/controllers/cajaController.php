<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/caja/vista/cajaVista.php');
require_once($raiz.'/caja/model/ReciboCajaModelo.php');
require_once($raiz.'/caja/model/ConceptoModel.php');
require_once($raiz.'/tecnicos/modelo/TecnicosModelo.php');

class cajaController
{
    protected $vista;
    protected $model;
    protected $modelConcepto;  
    protected $modelTecnico;

    public function __construct()
    {
        $this->vista = new cajaVista(); 
        $this->model = new ReciboCajaModelo();
        $this->modelConcepto = new ConceptoModel();
        $this->modelTecnico = new TecnicosModelo(); 

        if($_REQUEST['opcion']=='menuPrincipalCaja')
        {
            $this->menuPrincipalCaja();
        }
        if($_REQUEST['opcion']=='pregunteEntradaCaja')
        {
            $conceptos = $this->modelConcepto->traerConceptos();
            $tecnicos = $this->modelTecnico->traerTecnicosNew();
            $this->vista->formuCajaEntrada($_REQUEST,$conceptos,$tecnicos);
        }
        if($_REQUEST['opcion']=='grabarRecibo')
        {
            $this->grabarRecibo($_REQUEST);
        }
        if($_REQUEST['opcion']=='informeCaja')
        {
            $this->informeCaja($_REQUEST);
        }
    }


    public function menuPrincipalCaja()
    {
        $saldoActual = $this->model->traerSaldoActual();
        $this->vista->cajaVistaPrincipal($saldoActual);
    }
    public function grabarRecibo($request)
    {
        $this->model->grabarRecibo($request);
    }
    
    public function informeCaja($request)
    {
        $recibos = $this->model->informeCaja($request);
        $this->vista->mostrarRecibos($recibos);
        
    }

}
?>




