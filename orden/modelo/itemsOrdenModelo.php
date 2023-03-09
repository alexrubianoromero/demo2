<?php


class itemsOrdenModelo{
       
    public function traerItemsOrdenId($id,$conexion){
                $sql = "SELECT i.no_factura,i.id_item, i.codigo,i.descripcion,i.cantidad,i.total_item,i.valor_unitario
                FROM item_orden i 
                LEFT OUTER JOIN  productos p on p.codigo_producto = i.codigo 
                WHERE  i.no_factura = '".$id."'  ";
                // echo $sql;
                // die();
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
            //  echo '<pre>';
            //  print_r($resultado);
            //  echo '</pre>';
            //  die();
             return $resultado; 
    }


}

?>