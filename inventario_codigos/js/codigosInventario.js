function verifiqueCodigo()
    {
        // alert('Proceso de verificacion de codigo  ');
        //se debe verificar si existe este codigo 
        //en caso de que exista se debe traer 

        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("divPregunteNuevoItem").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=1234");
        // + "&idOrden="+idOrden
        

    }

    function mostrarAviso()
    {
        alert ('click en descripan');
    }

    function pantallaInventario()
    {
        document.getElementById("imagenInicial").style.display = 'none';

        document.getElementById("divBotonesPrincipales").style.display = 'block';

        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("div_principal").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=vistaPrincipalInventarios");
    }

    function mostrarInfoCodigo(idCodigo){
        // alert('info codigo');
        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=mostrarCodigo"
            +"&idCodigo="+idCodigo  
        );
    }

    function pregunteNuevoCodigo(){
        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalProducto").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=pregunteNuevoCodigo");
    }
    function grabarProducto()
    {
        var codigo = document.getElementById("inputCodigo").value;
        var descripcion = document.getElementById("inputDescripcion").value;
        var cantidad = document.getElementById("inputCantidad").value;
        var precioCompra = document.getElementById("inputPrecioCompra").value;
        var precioVenta = document.getElementById("inputPrecioVenta").value;

        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalProducto").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabarCodigo"
        + "&codigo="+codigo
        + "&descripcion="+descripcion
        + "&cantidad="+cantidad
        + "&precioCompra="+precioCompra
        + "&precioVenta="+precioVenta
        );

        pantallaInventario();
    }

    function aumentarInventario(id){
        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalAumentarProducto").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=aumentarInventario"
        + "&id="+id
        );
    }

    function grabarEntradaInventario(id)
    {
        var factura = document.getElementById("factura").value;
        var cantidad = document.getElementById("cantidad").value;

        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalAumentarProducto").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabarEntradaInventario"
        + "&id="+id
        + "&factura="+factura
        + "&cantidad="+cantidad
        );

    }