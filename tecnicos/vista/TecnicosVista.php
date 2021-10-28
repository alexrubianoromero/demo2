<?php

class TecnicosVista{

    public function mostrarTecnicos($arregloTecnicos){
        $arreglo = '';
        $i=0;
        echo '<select id="">';
            while($tecnicos = mysql_fetch_assoc($arregloTecnicos))
            {
                //  $arreglo[$i]['idcliente'] =   $tecnicos['idcliente']; 
                //  $arreglo[$i]['nombre'] =   $tecnicos['nombre']; 
                echo '<option value = "'.$tecnicos['idcliente'].'"  >'.$tecnicos['nombre'].'</option>';
            }
            
            echo '</select>';
            // echo '<pre>';
            // print_r();
            // echo '</pre>';
    }
}


?>