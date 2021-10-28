

function valide(){
    placa = document.querySelector('#placa');
    const http=new XMLHttpRequest();
    const url = '../orden/ordenPlaca.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("resultadosValidacion").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa.value);
}

function pregunteDatosOrden(){
   
    const http=new XMLHttpRequest();
    const url = '../orden/ordenPlaca.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("resultadosValidacion").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa.value);
    alert('buenas ');
}



function grabarordenMovil(){
    placa = document.querySelector('#placa');
    fecha = document.querySelector('#fecha').value;  
    orden_numero_ante = document.querySelector('#orden_numero_ante').value;  
    marca = document.querySelector('#marca').value;  
    email = document.querySelector('#email').value;  
    tipo_medida = document.querySelector('#tipo_medida').value;  
    kilometraje = document.querySelector('#kilometraje').value;  
    mecanico = document.querySelector('#mecanico').value;  
    descripcion = document.querySelector('#descripcion').value;  
    
    
    const http=new XMLHttpRequest();
    const url = '../orden/grabar_orden_honda.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("resultadosValidacion").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa.value
    +'&fecha='+fecha 
    +'&orden_numero_ante='+orden_numero_ante 
    +'&marca='+marca
    +'&email='+email
    +'&tipo_medida='+tipo_medida
    +'&kilometraje='+kilometraje
    +'&mecanico='+mecanico
    +'&descripcion='+descripcion
    +'&desdemovil='+'1'
    );

}