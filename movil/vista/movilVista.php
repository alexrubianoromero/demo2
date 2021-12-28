<?php
class movilVista{

  public function pantallaLogueo()
  {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <!--<meta charset="UTF-8">-->
            <meta http-equiv=?Content-Type? content=?text/html; charset=UTF-8? />
            <!--<meta http-equiv=?Content-Type? content=?text/html; charset=ISO-8859-1? />-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kaymo</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">  
        <script src="https://kit.fontawesome.com/6f07c5d6ff.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/estilo.css">
        
        <?php  header("Content-Type: text/html;charset=utf-8"); ?>
        <style>
            #divBotonesPrincipales{
                display:none;
            }
        </style>
    </head>
    <body >
        <div id="divTotal" align="center" class="container">
        <div id="imagenInicial" >
            <img class="imagenesinicio" src="imagen/logonuevo.png">
        </div>
        <p id="slogankaymo">TECNOLOGIA VERDADERA</p>
        <div id="divBotonesPrincipales">
            <button onclick="menuPrincipal();" class = "bontonesmenuinternos"> MENU PRINCIPAL
            <i class="fas fa-bars"></i>
        </button>
        </div>
        <div  id = "div_principal" align="center" >
            
            
            
            <?php  $this->htmlLogueo(); ?>
            <!-- <img src="planeta.png"> -->
            
        </div>
        
    </div>
        
    
    
    </body>
    </html>
    <script src="js/jquery-2.1.1.js"></script>       
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/nuevo.js"></script>
    <script src="../orden/js/orden.js"></script>
    <script src="../clientes/js/clientes.js"></script>
    <script src="../vehiculos/js/vehiculos.js"></script>
    <?php
  }
  public function htmlLogueo(){
     echo $sinpermisos;
     ?>
        <!--             <img class="imagenesinicio" src="Logo.png">-->
        <div id="div_abajo">
            <br><br>
            <div id="div_titulo ">
                <!-- <img id="imagenlogo" src="Logo.png"> -->
            </div>  
            <!-- <img src="planeta.png"> -->
            <div class="row" id="div_botones_inicio"> 
                <div class = "form_group ">
                    <input value="" type = "text" class = "form-control botoninicio " id="usuario" placeholder = "Usuario" > 
                </div>
                <br><br><br>
                <div class = "form_group ">
                    <input  value="" type = "password" class = "form-control botoninicio" id="clave" placeholder = "Clave"> 
                </div>
                <br><br><br><br>
                <div class = "form_group ">
                    <button onclick ="menuPrincipal();"  id = "btn_ingresar" class = "btn btn-primary btn-block bontoningresar ">INGRESAR</button> 
                                                
                </div>
            </div>  
            </div>   
        <?php
    }  
    public function menuPrincipal()
    {
        ?>
            <br><br>
    
            <input type="hidden" id="usuario" value ="<?php  echo $_REQUEST['username']?>">
            <input type="hidden" id="clave" value ="<?php  echo $_REQUEST['clave']?>">
            <button class = "btn btn-primary bontonesmenu"  onclick="pantallaClientes();">CLIENTES 
                    <!-- <i class="fas fa-layer-group"></i> -->
                    <i class="far fa-user"></i>
            </button>
            <br><br>
            <button class = "btn btn-primary bontonesmenu"  onclick="pantallaMotos();"><span align="left">MOTOS<span> 
                    <i class="fas fa-biking"></i>
            </button>

        <br><br>
        <button class = "btn btn-primary bontonesmenu"  onclick="pantallaOrdenes();">ORDENES 
            <!-- <i class="fas fa-boxes"></i> -->
            <i class="fas fa-tools"></i>
        </button>
        <br><br>
    
        <button class = "btn btn-default bontonsalir" id="btn_salir" onclick="salirSistema();">SALIR <i class="fas fa-sign-out-alt"></i></button>
        </div>

        <?php
  }   

}