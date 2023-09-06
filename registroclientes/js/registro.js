//por algun motivo no me toma la info de este archivo me toco meterlo enla vista

function registrarCliente()
{
    var valida = validarCampos();
    if(valida){

        var identi = document.getElementById("identi").value;
        var nombre = document.getElementById("nombre").value;
        var celular = document.getElementById("celular").value;
        var email = document.getElementById("email").value;
        // var clave = document.getElementById("clave").value;
        const http=new XMLHttpRequest();
        const url = '../registroclientes/registroclientes.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                document.getElementById("div_principal_registro").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=registrarCliente'
        + "&identi="+identi
        + "&nombre="+nombre
        + "&celular="+celular
        + "&email="+email
        // + "&clave="+clave
        );
    }
}

function validarCampos()
{
    if( document.getElementById("identi").value == '')
    {
        document.getElementById("identi").focus();
        alert('Por favor digitar identidad');
        return 0;
    }

    if( document.getElementById("nombre").value == '')
    {
        document.getElementById("nombre").focus();
        alert('Por favor digitar nombre');
        return 0;
    }
    if( document.getElementById("celular").value == '')
    {
        document.getElementById("celular").focus();
        alert('Por favor digitar celular');
        return 0;
    }
    if( document.getElementById("email").value == '')
    {
        document.getElementById("email").focus();
        alert('Por favor digitar email');
        return 0;
    }
    if( document.getElementById("clave").value == '')
    {
        document.getElementById("clave").focus();
        alert('Por favor digitar clave');
        return 0;
    }
    return 1;

}

function reviseIdenti()
{
    // alert('cambio de foco '); 
        const btnRegistrar = document.getElementById('btnRegistrar');
        var identi = document.getElementById("identi").value;
        const http=new XMLHttpRequest();
        const url = '../registroclientes/registroclientes.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                var  resp = JSON.parse(this.responseText); 
                if(resp.filas == 1)
                {   
                    document.getElementById("nombre").value = resp.data.nombre;
                    document.getElementById("spanmensaje").innerHTML  = 'Esta identidad ya existe';
                    btnRegistrar.disabled = true; 
                }
                else{
                    document.getElementById("nombre").value = '';
                    document.getElementById("spanmensaje").innerHTML  = '';
                    btnRegistrar.disabled = false; 
                }
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send('opcion=reviseIdenti'
        + "&identi="+identi
        );
}