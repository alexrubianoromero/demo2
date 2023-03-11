<?php

$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');



class itemsOrdenModelo extends Conexion
{
       
    public function __construct()
    {
    }
    public function traerItemsOrdenId($id)
    {
                $conexion = $this->connectMysql();
                $sql = "SELECT i.no_factura,i.id_item, i.codigo,i.descripcion,i.cantidad,i.total_item,i.valor_unitario
                FROM item_orden i 
                LEFT OUTER JOIN  productos p on p.codigo_producto = i.codigo 
                WHERE  i.no_factura = '".$id."'  order by id_item asc";
                $consulta = mysql_query($sql,$conexion);
                $filas = mysql_num_rows($consulta);
                $arreglo= '';
                $i=0;
                while($resul = mysql_fetch_assoc($consulta)){
                    $arreglo[$i]['no_factura'] = $resul['no_factura'];
                    $arreglo[$i]['id_item'] = $resul['id_item'];
                    $arreglo[$i]['codigo'] = $resul['codigo'];
                    $arreglo[$i]['descripcion'] = $resul['descripcion'];
                    $arreglo[$i]['cantidad'] = $resul['cantidad'];
                    $arreglo[$i]['valor_unitario'] = $resul['valor_unitario'];
                    $arreglo[$i]['total_item'] = $resul['total_item'];
                    $i++;
             }
             $resultado['datos'] = $arreglo; 
             $resultado['filas'] = $filas;  
             return $resultado; 
    }

    public function grabarNuevoItem($request)
    {
        $conexion = $this->connectMysql();
        $sql="insert into item_orden (fecha,no_factura,codigo,descripcion,cantidad,total_item,valor_unitario)   
              values(now()
              ,'".$request['idOrden']."'
              ,'".$request['codigo']."'
              ,'".$request['descripcion']."'
              ,'".$request['cantidad']."'
              ,'".$request['total']."'
              ,'".$request['total']."'
              )  ";
        $consulta = mysql_query($sql,$conexion);
        // echo 'Item Grabado ';           
    }




}



?>