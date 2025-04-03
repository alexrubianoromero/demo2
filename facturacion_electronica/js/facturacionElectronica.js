
function enviarInfoFacElectronica(idOrden)
{
  
        // var marca = document.getElementById("marca").value;
        const http=new XMLHttpRequest();
        const url = '../facturacion_electronica/facturacionElectronica.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalFactElectronica").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=enviarInfoFacElectronica'
        + "&idOrden="+idOrden
        );
    
}

function preguntarANombredeQuien(idOrden)
{
    const http=new XMLHttpRequest();
    const url = '../facturacion_electronica/facturacionElectronica.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalFactElectronica").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=preguntarANombredeQuien'
    + "&idOrden="+idOrden
    );
}
function verifiqueTipoCLiente(idOrden)
{
    var idTipoCLiente = document.getElementById("idTipoCLiente").value;
    const http=new XMLHttpRequest();
    const url = '../facturacion_electronica/facturacionElectronica.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("div_tipo_cliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=verifiqueTipoCLiente'
    + "&idOrden="+idOrden
    + "&idTipoCLiente="+idTipoCLiente
    );
}

function actualizarClienteFacElectronica(idCliente)
{
    $valida = validarCamposClienteFacElectronica();
    if($valida)
    {

        var identiFac = document.getElementById("identiFac").value;
        var nombreFac = document.getElementById("nombreFac").value;
        var apellidoFac = document.getElementById("apellidoFac").value;
        var telefonoFac = document.getElementById("telefonoFac").value;
        var direccionFac = document.getElementById("direccionFac").value;
        var emailFac = document.getElementById("emailFac").value;
        var idOrden = document.getElementById("idOrden").value;
        const http=new XMLHttpRequest();
        const url = '../facturacion_electronica/facturacionElectronica.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("div_tipo_cliente").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=actualizarClienteFacElectronica'
            + "&identiFac="+identiFac
            + "&nombreFac="+nombreFac
            + "&apellidoFac="+apellidoFac
            + "&telefonoFac="+telefonoFac
            + "&direccionFac="+direccionFac
            + "&emailFac="+emailFac
            + "&idCliente="+idCliente
            + "&idOrden="+idOrden
        );
    //    setTimeout(() => {
    //      crearJsonFactura(idOrden);
    //    }, timeout); 
    }
}

function crearJsonFactura()
{
    var idOrden = document.getElementById("idOrden").value;
    // alert(idOrden);

    const http=new XMLHttpRequest();
    const url = '../facturacion_electronica/facturacionElectronica.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalFactElectronica").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=crearJsonFactura'
    + "&idOrden="+idOrden
    );
}


function validarCamposClienteFacElectronica()
{
    
    if(document.getElementById("identiFac").value == 0)
        {
           alert("Digite Identidad ") ;  
           document.getElementById("identiFac").focus();
           return false
        }
    if(document.getElementById("nombreFac").value == 0)
        {
           alert("Digite nombre ") ;  
           document.getElementById("nombreFac").focus();
           return false
        }
    if(document.getElementById("apellidoFac").value == 0)
        {
           alert("Digite apellido ") ;  
           document.getElementById("apellidoFac").focus();
           return false
        }
    if(document.getElementById("direccionFac").value == 0)
        {
           alert("Digite direccion ") ;  
           document.getElementById("direccionFac").focus();
           return false
        }
    if(document.getElementById("emailFac").value == 0)
        {
           alert("Digite email ") ;  
           document.getElementById("emailFac").focus();
           return false
        }

    return true;
}


