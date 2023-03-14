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
    var txtAquien = document.getElementById("txtAquien").value;
    var txtValor = document.getElementById("txtValor").value;
    var txtConcepto = document.getElementById("txtConcepto").value;
    var txtObservacion = document.getElementById("txtObservacion").value;
    var tipo = document.getElementById("tipo").value;
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
    );
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