function verifiqueCodigo()
    {
        alert('voy a verificar este codigo ');
        //se debe verificar si existe este codigo 
        //en caso de que exista se debe traer 
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