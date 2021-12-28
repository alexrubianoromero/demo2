function menuPrincipal(){
    document.getElementById("imagenInicial").style.display = 'block';
    document.getElementById("divBotonesPrincipales").style.display = 'none';
    const http=new XMLHttpRequest();
    const url = '../movil/index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
         //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("div_principal").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=menuPrincipal'
    );
}

function pantallaClientes(){

    // alert('buenas');
    // document.body.style.backgroundColor  = "black"; 
    // document.body.style.color  = "white"; 
    
    document.getElementById("imagenInicial").style.display = 'none';
    document.getElementById("divBotonesPrincipales").style.display = 'block';

    const http=new XMLHttpRequest();
    const url = '../clientes/clientesResponsivo.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
           document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send();
}

function salirSistema(){
    const http=new XMLHttpRequest();
    const url = '../movil/index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
           document.getElementById("divTotal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=salirSistema'
    );
}

function pantallaMotos(){
    // document.body.style.backgroundColor  = "black"; 
    // document.body.style.color  = "white"; 
    
    document.getElementById("imagenInicial").style.display = 'none';
    document.getElementById("divBotonesPrincipales").style.display = 'block';

    const http=new XMLHttpRequest();
    const url = '../vehiculos/vehiculos.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
           document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send();
}

function pantallaOrdenes(){
    // document.body.style.backgroundColor  = "black"; 
    // document.body.style.color  = "white"; 
    
    document.getElementById("imagenInicial").style.display = 'none';
    document.getElementById("divBotonesPrincipales").style.display = 'block';

    const http=new XMLHttpRequest();
    const url = '../orden/ordenes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
           document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=ordenes'
    );
}