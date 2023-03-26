<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/caja/vista/cajaVista.php');
require_once($raiz.'/caja/model/ReciboCajaModelo.php');
require_once($raiz.'/caja/model/ConceptoModel.php');
require_once($raiz.'/tecnicos/modelo/TecnicosModelo.php');
// require_once($raiz.'/orden/modelo/itemsOrdenModelo.php');

class cajaController
{
    protected $vista;
    protected $model;
    protected $modelConcepto;  
    protected $modelTecnico;
    protected $modelItem;

    public function __construct()
    {
        $this->vista = new cajaVista(); 
        $this->model = new ReciboCajaModelo();
        $this->modelConcepto = new ConceptoModel();
        $this->modelTecnico = new TecnicosModelo(); 
        // $this->modelItem = new itemsOrdenModelo();

        if($_REQUEST['opcion']=='menuPrincipalCaja')
        {
            $this->menuPrincipalCaja();
        }
        if($_REQUEST['opcion']=='pregunteEntradaCaja')
        {
            $this->pregunteEntradaCaja($_REQUEST);

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
        // echo '<pre>'; 
        // print_r($request); 
        // echo '</pre>';
        // die(); 
        $this->model->grabarRecibo($request);
    }
    
    public function informeCaja($request)
    {
        $recibos = $this->model->informeCaja($request);
        $this->vista->mostrarRecibos($recibos);
        
    }
    public function  pregunteEntradaCaja($request)
    {
        // echo '<pre>'; 
        // print_r($request); 
        // echo '</pre>';
        // die();
        // $sumaItems =  $this->modelItem->sumarItemsIdOrden($request['idOrden']);
        // die($sumaItems);
        $conceptos = $this->modelConcepto->traerConceptos();
        $tecnicos = $this->modelTecnico->traerTecnicosNew();
        $this->vista->formuCajaEntrada($request,$conceptos,$tecnicos);
    }
}
?>




