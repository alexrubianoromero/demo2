<?php

?>
<div></div>
<div align ="center " id="div_general">
    <br><br>
  
        <input type="hidden" id="usuario" value ="<?php  echo $_REQUEST['username']?>">
        <input type="hidden" id="clave" value ="<?php  echo $_REQUEST['clave']?>">


                <button class = "btn btn-primary bontonesmenu" id="btn_operaciones" onclick="pantallaOperaciones();"><span align="left">OPERACIONES<span> <i class="fas fa-dolly fa-align-right"></i>
        </button>
                <br><br>
        <button class = "btn btn-primary bontonesmenu" id="btn_referencias" onclick="referencias();">REFERENCIAS <i class="fas fa-layer-group"></i>
</button>

<br><br>
        <button class = "btn btn-primary bontonesmenu" id="btn_pedidos" onclick="btn_pedidos_actual();">PEDIDOS <i class="fas fa-boxes"></i></button>
        <br><br><br>
        
        <button class = "btn btn-default bontonsalir" id="btn_salir" onclick="salir();">SALIR <i class="fas fa-sign-out-alt"></i></button>
</div>
    

<?php
//     include('footer.php');
?>