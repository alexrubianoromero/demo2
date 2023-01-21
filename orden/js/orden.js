

function valide(){
    placa = document.querySelector('#placa');
    const http=new XMLHttpRequest();
    const url = '../orden/ordenes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("div_mostrar_ordenes").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa.value
    +'&opcion='+'verificarPlaca'
    );
}

function pregunteDatosOrden(){
   
    const http=new XMLHttpRequest();
    const url = '../orden/ordenPlaca.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
           document.getElementById("resultadosValidacion").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa.value);

}



function grabarordenMovil()
{
    var valida = validacionesOrden();
    if(valida != 0)
    {
        // $('#myModalDdatosOrden').modal('hide');  
        placa = document.querySelector('#placaPeritaje').value;
        tipo_medida = document.querySelector('#tipo_medida').value;  
        kilometraje = document.querySelector('#kilometraje').value;  
        mecanico = document.querySelector('#mecanico').value;  
        descripcion = document.querySelector('#descripcion').value;  
        // var placa = '1234';
        
        const http=new XMLHttpRequest();
        const url = '../orden/ordenes.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                //  console.log(this.responseText);
                //var respuesta = JSON.parse(this.responseText);
                // console.log(respuesta.marca);
                    // alert(respuesta[0]+' '+ respuesta[1]);
            //		document.getElementById("tipooperacion").text = respuesta[1];
            document.getElementById("cuerpoModalDatosOrden").innerHTML  = this.responseText;
            
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('placa='+ placa
        +'&tipo_medida='+tipo_medida
        +'&kilometraje='+kilometraje
        +'&mecanico='+mecanico
        +'&descripcion='+descripcion
        // // +'&placaformu='+placaformu
        // +'&desdemovil='+'1'
        +'&opcion='+'grabarOrden'
        );

        //aqui se podria decir que llame el programa que envia el correo 
        //o en el controlador para la accion grabarOrden 
    }

}

function validacionesOrden(){
   
    // if(document.getElementById("placa").value == '')
    // {
    //    alert("Digite placa") ;  
    //    document.getElementById("placa").focus();
    //    return 0;
    // }
    // if(document.getElementById("fecha").value == '')
    // {
    //    alert("Digite fecha") ;  
    //    document.getElementById("fecha").focus();
    //    return 0;
    // }
    // if(document.getElementById("marca").value == '')
    // {
    //    alert("Digite marca") ;  
    //    document.getElementById("marca").focus();
    //    return 0;
    // }
    // if(document.getElementById("email").value == '')
    // {
    //    alert("Digite email") ;  
    //    document.getElementById("email").focus();
    //    return 0;
    // }
    // if(document.getElementById("tipo_medida").value == '')
    // {
    //    alert("Digite tipo_medida") ;  
    //    document.getElementById("tipo_medida").focus();
    //    return 0;
    // }

    if(document.getElementById("kilometraje").value == '')
    {
       alert("Digite kilometraje") ;  
       document.getElementById("kilometraje").focus();
       return 0;
    }
    if(document.getElementById("mecanico").value < 0)
    {
       alert("Digite mecanico") ;  
       document.getElementById("mecanico").focus();
       return 0;
    }
    if(document.getElementById("descripcion").value == '')
    {
       alert("Digite descripcion") ;  
       document.getElementById("descripcion").focus();
       return 0;
    }
  return 1;
}

function muestreDetalleOrden(id){
    var id = id;
    const http=new XMLHttpRequest();
    const url = '../orden/ordenes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
            //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("cuerpoModal").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('consultarOrden=1'
        +'&id='+id);

}
function crearVehiculo(){
    placa = document.querySelector('#placa').value;
    const http=new XMLHttpRequest();
    const url = '../vehiculos/crearVehiculo.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
         //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("resultadosValidacion").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa.value
    +'&fecha='+fecha 
    +'&orden_numero_ante='+orden_numero_ante 
    );

}

function  convertMayusculas(){
    var placa =  document.getElementById("placaPeritaje");
    var mayusculas =  placa.value.toUpperCase();
    document.getElementById("placaPeritaje").value = mayusculas;
}

function iraCraerOrden(){
    const http=new XMLHttpRequest();
    // const url = '../orden/crear_orden_nuevo_responsivo.php';
    const url = '../orden/ordenes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
         //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("div_mostrar_ordenes").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=crearOrden');
}

function pintarOrdenes(){
    const http=new XMLHttpRequest();
    // const url = '../orden/crear_orden_nuevo_responsivo.php';
    const url = '../orden/ordenes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
         //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("div_general_modulo_ordenes").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=ordenes');
}

function buscarPlacaPeritajeDesdeOrden(){
    var placa = document.getElementById("placaPeritaje").value;
    const http=new XMLHttpRequest();
	const url = '../vehiculos/vehiculos.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("divResultadobusqueda").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=buscarPlacaDesdeOrden"+ "&placa="+placa);
    verificarPlacaRespuestaJson();
}

function verificarPlacaRespuestaJson(){
    var placa = document.getElementById("placaPeritaje").value;
    const http=new XMLHttpRequest();
	const url = '../vehiculos/vehiculos.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
            respu = JSON.parse(this.responseText);
			console.log(respu);

            if(parseInt(respu) > 0){
                crearBoton();
            }
            else{
                var  divCreacionOrden = document.querySelector('#fomularioCracionOrden');
                divCreacionOrden.innerHTML='';
            }
			// console.log(this.responseText);
			// document.getElementById("divResultadobusqueda").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=verificarPlacaRespuestaJson"+ "&placa="+placa);
}

function crearBoton(){
    var  divCreacionOrden = document.querySelector('#fomularioCracionOrden');
    var btnCreacion = document.createElement('button');
    btnCreacion.setAttribute('id','btn_mostrar_formulario_creacion_orden');
    btnCreacion.setAttribute('onclick','mostrarFormularioCreacionOrden();');
    btnCreacion.setAttribute('class','btn btn-primary btn-lg');
    btnCreacion.setAttribute('data-toggle','modal');
    btnCreacion.setAttribute('data-target','#myModalDdatosOrden');
    btnCreacion.textContent = 'Formulario Creacion de Orden';
    divCreacionOrden.appendChild(btnCreacion);
}

function mostrarFormularioCreacionOrden(){
    var placa = document.getElementById("placaPeritaje").value;
    const http=new XMLHttpRequest();
    const url = '../orden/ordenes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("cuerpoModalDatosOrden").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('placa='+ placa
                +'&opcion=mostrarFormularioOrden');
}


function grabarVehiculoDesdeOrden()
{
     
     valida = validacionesCarro();
    //  var placa =  document.getElementById("placaPeritaje").value;
    //  alert(placa); 
     if(valida != 0)
     { 
         // alert('pora aqui va ');
         var placa =  document.getElementById("placaPeritaje").value;
         var propietario =  document.getElementById("selectPropietario").value;
         var marca =  document.getElementById("marca").value;
         var linea =  document.getElementById("linea").value;
         var modelo =  document.getElementById("modelo").value;
         var color =  document.getElementById("color").value;
         var vencisoat =  document.getElementById("vencisoat").value;
         var revision =  document.getElementById("revision").value;
         var chasis =  document.getElementById("chasis").value;
         var motor =  document.getElementById("motor").value;

         const http=new XMLHttpRequest();
         const url = '../vehiculos/vehiculos.php';
         http.onreadystatechange = function(){
             if(this.readyState == 4 && this.status ==200){
                 console.log(this.responseText);
                //  document.getElementById("divResultadosVehiculos").innerHTML = this.responseText;
             }
         };

         http.open("POST",url);
         http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         http.send("opcion=grabarVehiculo1"
                 + "&placa="+placa
                 + "&propietario="+propietario
                 + "&marca="+marca
                 + "&linea="+linea
                 + "&modelo="+modelo
                 + "&vencisoat="+vencisoat
                 + "&revision="+revision
                 + "&chasis="+chasis
                 + "&motor="+motor
                 + "&color="+color
             );
             ///aqui deberia venir el resto del codigo para crear orden 
             //esta es la gran diferencia con relacion al otro guardar vehiculo
             buscarPlacaPeritajeDesdeOrden();
             
     }
     //debe ir a validar placa o algo asi 
     
    }
    function pregunteItems(){
    //    alert('digfame el item ');
       //muestre ventana apara introducir nuevo item 
       divPregunteNuevoItem
       var idOrden =  document.getElementById("idOrden").value;
       const http=new XMLHttpRequest();
       const url = '../orden/ordenes.php';
       http.onreadystatechange = function(){
           if(this.readyState == 4 && this.status ==200){
               document.getElementById("divPregunteNuevoItem").innerHTML = this.responseText;
           }
       };

       http.open("POST",url);
       http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       http.send("opcion=pregunteNuevoItemOrden"
               + "&idOrden="+idOrden
           );



    }
