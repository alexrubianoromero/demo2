<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/caja/model/ConceptoModel.php');

class cambiosdeaceiteVista
{
    public function __construct()
    {

    }

    public function menuPrincipal()
    {
    ?>
        <div id="div_principal_cambiosdeaceite">
            <div id="div_botones_cambiosdeaceite">
                <button >NUEVO CAMBIO ACEITE</button>
            </div>
            <div id="div_resultados_cambiosDeAceite"></div>
        </div>
    <?
    }
}




?>