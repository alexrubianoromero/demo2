function pantallaPrincipalCaja()
{
    document.getElementById("imagenInicial").style.display = 'none';
    document.getElementById("divBotonesPrincipales").style.display = 'block';    
    const http=new XMLHttpRequest();
    const url = '../caja/caja.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
        document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=menuPrincipalCaja');
}

function entradaCaja(tipo)
{
    document.getElementById("imagenInicial").style.display = 'none';
    document.getElementById("divBotonesPrincipales").style.display = 'block';    
    const http=new XMLHttpRequest();
    const url = '../caja/caja.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
        document.getElementById("cuerpoModalCaja").innerHTML  = '';
        document.getElementById("cuerpoModalCaja").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=pregunteEntradaCaja'
            + "&tipo="+tipo 
                );
}
function grabarRecibo()
{
    var valida = validacionesRecibo();
    if(valida)
    {
        var txtAquien = document.getElementById("txtAquien").value;
        var txtValor = document.getElementById("txtValor").value;
        var txtConcepto = document.getElementById("txtConcepto").value;
        var txtObservacion = document.getElementById("txtObservacion").value;
        var tipo = document.getElementById("tipo").value;
        var idTecnico = document.getElementById("idTecnico").value;
        const http=new XMLHttpRequest();
        const url = '../caja/caja.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalCaja").innerHTML  = '';
            document.getElementById("cuerpoModalCaja").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=grabarRecibo'
                + "&txtAquien="+txtAquien 
                + "&txtValor="+txtValor 
                + "&txtConcepto="+txtConcepto 
                + "&txtObservacion="+txtObservacion 
                + "&tipo="+tipo 
                + "&idTecnico="+idTecnico 
        );
    }   
}

function validacionesRecibo()
{
        if(document.getElementById("txtValor").value=='')
        {
            alert('Por favor digite Valor ');
            document.getElementById("txtValor").focus();
            return false;
        }

        if(document.getElementById("txtAquien").value=='')
        {
            alert('Por favor digite nombre');
            document.getElementById("txtAquien").focus();
            return false;
        }
        if(document.getElementById("txtConcepto").value=='0')
        {
            alert('Por favor escoja un concepto');
            document.getElementById("txtConcepto").focus();
            return false;
        }
        if(document.getElementById("txtObservacion").value=='')
        {
            alert('Por digite observacion');
            document.getElementById("txtObservacion").focus();
            return false;
        }
      
        return true;
}

function mostrarMovimientosDia(tipoInforme)
{
    // var txtAquien = document.getElementById("txtAquien").value;
  
    const http=new XMLHttpRequest();
    const url = '../caja/caja.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalCajaMovimientos").innerHTML  = '';
        document.getElementById("cuerpoModalCajaMovimientos").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=informeCaja'
            + "&tipoInforme="+tipoInforme 
    );
}