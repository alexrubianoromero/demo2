<?php

class ayudasFinancierasVista
{
     public function __construct()
     {
     }

     public function pantallaPrincipalAyudas()
     {
        echo 'pantalla principal ayudas';
        ?>
             <button class = "btn btn-primary bontonesmenu"  onclick="pantallaCaja();">CAJA 
                    <!-- <i class="far fa-user"></i> -->
                    <i class="far fa-money-bill-1"></i>
            </button>
        <?php
     }
}



?>