<?php

$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class UsuarioModel extends Conexion
{
    public function verificarCredenciales($request)
    {
        $conexion = $this->connectMysql();
        $sql = "select * from usuarios where login = '".$request['user']."'   "; 
        $consulta = mysql_query($sql,$conexion);
        $filas = mysql_num_rows($consulta);

        // die('<br>'.$sql.'<br>'.$filas);
        if($filas>0)
        {
            $datosUser = mysql_fetch_assoc($consulta);  
            if($datosUser['clave']==$request['clave']  )
            {
               $valida = 1;      
            }
            else {
                $valida = 0;
            }
        }else{
            $valida = 0; 
        } 

        return $valida;  
    } 
}

?>