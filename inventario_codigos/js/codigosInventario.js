function verifiqueCodigo()
    {
        alert('Proceso de verificacion de codigo  ');
        //se debe verificar si existe este codigo 
        //en caso de que exista se debe traer 

        const http=new XMLHttpRequest();
        const url = '../../inventario_codigos/inventario_codigos.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("divPregunteNuevoItem").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=pregunteNuevoItemOrden"
                // + "&idOrden="+idOrden
            );


    }

    function mostrarAviso()
    {
        alert ('click en descripan');
    }
