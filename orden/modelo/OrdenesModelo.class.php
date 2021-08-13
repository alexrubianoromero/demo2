<?php

Class OrdenesModelo{
    
    public function __construct(){
     include('../valotablapc.php');  
     include('../funciones.php'); 
     $this->tabla4 = $tabla4;
     $this->conexion = $conexion;
 }
    public function verificarPlaca(){
            $sql_verificar_placa = "select * from ".$this->tabla4." where placa = '"
            .$_REQUEST['placa123']."' and id_empresa = '".$_SESSION['id_empresa']."' ";
            echo $sql_verificar_placa;
            die();
            $consulta_placa = mysql_query($sql_verificar_placa,$this->conexion);
            $filas_verificar_placa = mysql_num_rows($consulta_placa); 
            echo '<pre>';
            print_r($filas_verificar_placa);
            echo '</pre>';
            if($filas_verificar_placa==0)
            {
                echo '<h1 style="color:red">Esta placa no existe por favor verifique</h1>';
            }
    }




}
?>