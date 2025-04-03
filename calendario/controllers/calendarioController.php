<?php
 date_default_timezone_set('America/Bogota');
 $raiz = dirname(dirname(dirname(__file__)));
//  die($raiz);
 require_once($raiz.'/calendario/views/calendarioView.php');  
 require_once($raiz.'/calendario/models/GrabarEventoModel.php');  

 class calendarioController
 {
    protected $view;
    protected $model;

    public function   __construct()
    {
        $this->view = new calendarioView();
        $this->model = new GrabarEventoModel();
        // echo 'bienvenido calendario ';
        if(!$_REQUEST['opcion'])
        {
            $this->view->menuPrincipal(); 
        }

        if($_REQUEST['opcion']=='grabarEvento')
        {
            $this->model->grabarEvento($_REQUEST);        
        }
        if($_REQUEST['opcion']=='actualizarEvento')
        {
            $this->model->actualizarEvento($_REQUEST);        
        }
        
    }


 }



?>