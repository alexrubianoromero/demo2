<?php
// require_once('../../valotablapc.php');  
require_once('../funciones.class.php');
class ClientesModelo{

       public function __construct(){
              // $this->tabla41 =  $tabla4;   
           }

        public function traerDatosCliente0($conexion)
        {
              $sql = "SELECT * FROM cliente0  ";
              $consulta = mysql_query($sql,$conexion); 
              $filas = mysql_num_rows($consulta);
              $datos = funciones::table_assoc($consulta);
              $resp['filas'] = $filas;
              $resp['datos'] = $datos;
              return $resp; 
        }

           //no tocar esta funcion porque ya la estoy usando en otro lado    
           public function traerDatosClienteId($id,$tabla3,$conexion){
                  $sql = "SELECT * FROM $tabla3 WHERE idcliente = '".$id."' ";
                  // echo '<br>'.$sql; 
                  // die();
                  $consulta = mysql_query($sql,$conexion); 
                  $datosCliente = mysql_fetch_assoc($consulta); 
                  // echo '<pre>';
                  // print_r($datosCliente);
                  // echo '</pre>';
                  // die();
                  return $datosCliente; 
           }

           public function validarPropietario($conexion,$identi){
              $sql = "SELECT * FROM cliente0 WHERE identi = '".$identi."'   ";
              $consulta = mysql_query($sql,$conexion); 
              $filas = mysql_num_rows($consulta);
              // echo $filas;
              // die();
              return $filas;
          }

          public function traerMaxIdCLiente0($conexion){
              $sqlId = "SELECT MAX(idcliente)as maxId FROM cliente0 "; 
              // echo  '<br>'.$sqlId;
              // die();
              $consultaId = mysql_query($sqlId,$conexion); 
              $consultaId = mysql_fetch_assoc($consultaId);
              return $consultaId['maxId'];
          } 

          public function grabarPropietario($conexion,$request){
              $datosEmpresa = $this->traerEmpresa($conexion);
              $existeIdentidad = $this->validarPropietario($conexion,$request['identi']);
              $sql = "INSERT INTO cliente0 (identi,nombre,telefono,direccion,observaci,email,id_empresa) 
                      VALUES('".$request['identi']."','".strtoupper($request['nombre'])."',
                      '".$request['telefono']."','".$request['direccion']."','".$request['observaciones']."'
                      ,'".$request['email']."','".$datosEmpresa['id_empresa']."'
                      )";
              // echo $sql;
              // die();        
              $consulta = mysql_query($sql,$conexion);   
              $maxId = $this->traerMaxIdCLiente0($conexion);
              $this->grabar_correo_propietario($conexion,$maxId,$request['email']);
              return $maxId;   
          }

          public function grabar_correo_propietario($conexion,$id,$email){
              $sql= "UPDATE cliente0 SET email = '".$email."'
                     WHERE idcliente = '".$id."'  ";
              $consulta = mysql_query($sql,$conexion);       
          } 

          public function traerEmpresa($conexion){
              $sql = "SELECT * FROM  empresa ORDER BY id_empresa DESC ";
              $consultaId = mysql_query($sql,$conexion);
              $arr = mysql_fetch_assoc($consultaId); 
              return $arr;   
          }    
      

}


?>