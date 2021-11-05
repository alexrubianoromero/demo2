function btn_ingresar(){	
    // document.body.style.backgroundImage = "url('..imagenes/fondo.jpg')"; 
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
          const http=new XMLHttpRequest();
          const url = 'llamarControlador.php';
          http.onreadystatechange = function(){
              if(this.readyState == 4 && this.status ==200){
                  console.log(this.responseText);
                  document.getElementById("div_abajo").innerHTML = this.responseText;
              }
          };
          http.open("POST",url);
          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          http.send("username="+usuario+"&clave="+clave+"&btnIngreso=Ingresar");
} //fin de btn_ingresar
