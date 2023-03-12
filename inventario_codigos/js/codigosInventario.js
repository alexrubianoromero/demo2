function verifiqueCodigo()
{
    // alert('Proceso de verificacion de codigo  ');
    //se debe verificar si existe este codigo 
    //en caso de que exista se debe traer 
    var codigo = document.getElementById("inputCodigo").value;
        
        const http=new XMLHttpRequest();
        const url = '../orden/ordenes.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                var  resp = JSON.parse(this.responseText); 
                if(resp.filas == 1)
                {    
                    document.getElementById("inputDescripcion").value = resp.data.descripcion;
                    document.getElementById("inputCantidad").value = resp.data.cantidad;
                    document.getElementById("inputPrecioCompra").value = resp.data.precio_compra;
                    document.getElementById("inputPrecioVenta").value = resp.data.valorventa;
                    document.getElementById("btnProducto").style.display = 'none';
                    document.getElementById("divRespuCodigo").innerHTML  = 'Este Codigo ya existe, no se puede crear nuevamente';
                    divRespuCodigo
                }else{
                    document.getElementById("inputDescripcion").value = '';
                    document.getElementById("inputCantidad").value = '';
                    document.getElementById("inputPrecioCompra").value = '';
                    document.getElementById("inputPrecioVenta").value = '';

                    document.getElementById("btnProducto").style.display = 'block';
                    document.getElementById("divRespuCodigo").innerHTML  = '';

                }

            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=verificarSiexisteCodigo"
        + "&codigo="+codigo
        );
        

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
        http.send("opcion=aumentarDisminuirInventario"
        + "&id="+id
        + "&tipoMov=1"
        );
    }
    function disminuirInventario(id){
        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalAumentarProducto").innerHTML = this.responseText;
            }
        };
        
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=aumentarDisminuirInventario"
        + "&id="+id
        + "&tipoMov=2"
        );
    }

    function grabarEntradaSalidaInventario(id)
    {
        var factura = document.getElementById("factura").value;
        var cantidad = document.getElementById("cantidad").value;
        var tipo  = document.getElementById("tipo").value;
        const http=new XMLHttpRequest();
        const url = '../inventario_codigos/codigosInventario.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("cuerpoModalAumentarProducto").innerHTML = this.responseText;
            }
        };

        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabarEntradaSalidaInventario"
        + "&id="+id
        + "&factura="+factura
        + "&cantidad="+cantidad
        + "&tipo="+tipo
        );

    }