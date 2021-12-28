<?php 

$raiz = dirname(dirname(dirname(__file__)));
// echo $raiz;
// die();
// require_once($raiz.'/orden/vista/orden_captura_honda_nueva.php');
require_once($raiz.'/orden/modelo/itemsOrdenModelo.php');
require_once($raiz.'/orden/vista/OrdenesVista.php');
require_once($raiz.'/orden/modelo/OrdenesModelo.class.php');
require_once($raiz.'/orden/modelo/itemsOrdenModelo.php');
require_once($raiz.'/tecnicos/modelo/TecnicosModelo.php'); 
require_once($raiz.'/funciones/funciones.class.php'); 

//    echo '<pre>';
//    print_r($datos_placa);
//    echo '</pre>';
//    die();

class ordenControlador {
    private $vistaOrden;
    private $modeloOrden;
    private $itemsOrdenModelo;
    private $tecnicos;

    public function __construct($conexion)
    {
        // $this->vista = new orden_captura_honda_nueva();
        $this->vistaOrden = new OrdenesVista();
        $this->modeloOrden = new OrdenesModelo();
        $this->itemsOrdenModelo = new itemsOrdenModelo();
        $this->tecnicos = new TecnicosModelo(); 

        
        if($_REQUEST['opcion']=='ordenes'){
            $this->pantallaConsultas($conexion);
        }
        if($_REQUEST['opcion']=='pintarOrdenes'){
            $this->pintarOrdenes($conexion);
        }
     
        if($_REQUEST['opcion']=='verificarPlaca'){
            $this->verificarPlaca($conexion,$_REQUEST['placa']);
        }

        if(isset($_REQUEST['id'])){
            $this->mostrarInfoOrden($_REQUEST['id'],$conexion);
        }
        if($_REQUEST['opcion']=='grabarOrden'){
            $this->grabarOrden($conexion,$_REQUEST);
        }
        if($_REQUEST['opcion']=='crearOrden'){
            $this->formuCrearOrden($conexion);
        }

        if($_REQUEST['opcion']=='mostrarFormularioOrden'){
        //                echo '<pre>';
        //    print_r($_REQUEST);
        //    echo '</pre>';
        //    die();
        $this->mostrarFormularioOrden($conexion,$_REQUEST['placa']);
        }

}

public function mostrarFormularioOrden($conexion,$placa){
        $consultaTecnicos = $this->tecnicos->traerTecnicos($conexion); 
        // $arreglotecnicos = funciones::table_assoc($consultaTecnicos);
        //    echo '<pre>';
        //    print_r($arreglotecnicos);
        //    echo '</pre>';
        //    die();
        $this->vistaOrden->pedirDatosOrden($conexion,$placa,$consultaTecnicos);

    }

    public function  formuCrearOrden(){
        $this->vistaOrden->formuCrearOrden();
    }
    public function verificarPlaca($conexion,$placa){
       $resultado =   $this->modeloOrden->verificarPlaca($conexion,$placa);
       $filas = mysql_num_rows($resultado);
       if($filas==0)
       {
           echo '<h1 style="color:red">Esta placa no existe</h1>';
           //deberia preguntar si desea crear la placa 
           echo '<button class="btn btn-primary" onclick="crearVehiculo();">CREAR VEHICULO</button>';
        }
        else {
            $datos_placa = mysql_fetch_assoc($resultado);
            echo $this->vistaOrden->mostrarFormulario($datos_placa,$conexion);
            // echo  (json_encode($datos_placa));
        }
    }

    public function pantallaConsultas($conexion){
        $arregloOrdenes = $this->modeloOrden->traerOrdenes($conexion);
        $this->vistaOrden->pantallaInicial($arregloOrdenes);
    }
    
    public function mostrarInfoOrden($id,$conexion){
        $arregloOrden = $this->modeloOrden->traerOrdenId($id,$conexion);
        // $items = self::traerItemsOrden($id,$conexion);  
        $resultadoItems = $this->itemsOrdenModelo->traerItemsOrdenId($id,$conexion);
        // echo '<pre>';
        // print_r($items);
        // echo '</pre>';
        // die();
        $this->vistaOrden->mostrarInfoOrden($arregloOrden,$conexion,$resultadoItems);
    }

    // public static function traerItemsOrden($conexion,$id){
    //     // $itemsOrden = $this->itemsOrdenModelo->traerItemsOrdenId($id,$conexion);
    //     $itemsOrden = $this->itemsOrdenModelo->traerItemsOrdenId($id,$conexion);
    //     return $itemsOrden;
    // }

    public function crearOrden(){
        echo 'llego a crear orden';
    }
    public function grabarOrden($conexion,$datos){
       $orden =  $this->modeloOrden->grabarOrden($conexion,$datos);
        echo 'La orden '.$orden .' fue creada para la placa '.$datos['placa'];
    }

    public function pintarOrdenes($conexion){
        $arregloOrdenes = $this->modeloOrden->traerOrdenes($conexion);
        // echo '<pre>';
        // print_r($items);
        // echo '</pre>';
        // die();
        $this->vistaOrden->pintarOrdenes($arregloOrdenes);
    }
}



?>