<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/conexion/Conexion.php');
// die($raiz);

class EventoModel extends Conexion
{
    public function __construct(){
        if(!($_REQUEST['opcion'])){
            $this->traerEventos();
        }
    }
    
    public function traerEventos()
    {
        $sql = "SELECT id, fecha AS start, concat(hora,'-',placa,'-',servicio) AS title FROM citas order by fecha, hora asc";
        $consulta = mysql_query($sql,$this->connectMysql());
        $eventos = $this->get_table_assoc($consulta);
        echo json_encode($eventos);

    }

   

}

$conect = new EventoModel();

?>