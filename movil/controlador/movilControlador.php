<?php

$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/movil/vista/movilVista.php');
require_once($raiz.'/movil/model/UsuarioModel.php');



class movilControlador{

    private $vista;
    private $model; 

    public function __construct($conexion){

                //   echo '<pre>';

                //   print_r($_REQUEST);

                //   echo '</pre>';

                //   die();    

        $this->vista =  new movilVista();
        $this->model =  new UsuarioModel();

        

        if(!isset($_REQUEST['opcion'])){

             $this->pantallaLogueo();

        }       



        if($_REQUEST['opcion']=='menuPrincipal'){

             $this->menuPrincipal();

        }          
        if($_REQUEST['opcion']=='verificarCredenciales'){

             $this->verificarCredenciales($_REQUEST);

        }          

        if($_REQUEST['opcion']=='salirSistema'){

             $this->salirSistema();

        }  

    }

    public function pantallaLogueo(){

        $this->vista->pantallaLogueo();

    }

    public function menuPrincipal(){

        $this->vista->menuPrincipal();

    } 

   

    public function salirSistema(){

        $this->vista->pantallaLogueo();

    } 
    public function verificarCredenciales($request){

       $validacion =  $this->model->verificarCredenciales($request);
       $validacion = 1;
       if($validacion == 1)
       {
        $this->menuPrincipal();
       }
       else{
        $this->vista->htmlLogueo();
       }

    } 

}



?>