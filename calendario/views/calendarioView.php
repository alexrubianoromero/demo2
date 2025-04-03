<?php

class calendarioView{


    public function menuPrincipal()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <style>
                @media (max-width: 768px) {
                    #calendar {
                        font-size: 14px;
                    }
                    .fc-dayGridMonth-view .fc-day {
                        min-height: 50px; /* Reduce el tamaño de los días */
                    }
                    .fc-toolbar {
                        flex-direction: column; /* Acomoda los botones arriba */
                        align-items: center;
                    }
                }
                #calendar {
                    background-color: #f4f4f4; /* Color de fondo gris claro */
                    padding: 10px;
                    border-radius: 10px;
                }
                .fc-daygrid-day {
                    background-color: #ffffff; /* Fondo blanco para los días */
                }
                .fc-col-header-cell {
                    background-color: white !important; /* Azul */
                    color: white !important; /* Texto blanco */
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div align="center"> <img src="../logos/logokaymo.png" width="120px;"></div>
            <h1>Calendario Citas Kaymo</h1>

            <div id='calendar'></div>
            <?php  $this->modalEventos(); ?>

        </body>
        </html>
       
        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es', // Configurar el idioma en español
                initialView: 'dayGridMonth',
                height: 'auto',
                // initialView: window.innerWidth < 768 ? 'listWeek' : 'dayGridMonth',
                events: 'models/EventoModel.php', // Cargar eventos desde PHP
                selectable: true,
                selectMirror:false,
                headerToolbar: {
                    left: 'prev,next today', // Botones de navegación
                    center: 'title', // Título del calendario
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek' // Botones de vista
                },                eventStartEditable: true,
                eventDrop: function(info) {
                    let nuevaFecha = info.event.start.toISOString().split('T')[0];
                    let id = info.event.id;
                    let opcion = 'actualizarEvento'
                    fetch("calendario.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `opcion=${opcion}&id=${id}&nuevaFecha=${nuevaFecha}`
                    }).then(() => calendar.refetchEvents());


                },
                dateClick: function(info) {
                    let fecha = info.dateStr;
                    mostrarModal();
                    ponerFechaEnFormuEvento(fecha);

              
                },
                eventClick: function(info) {
                    alert("Título: " + info.event.title + "\nDescripción: " + info.event.extendedProps.description);
                }
            });
            calendar.render();
            });
            
            
              
            
            
            function mostrarModal(){
                    $("#modalEventos").modal("show");
                }
            function ponerFechaEnFormuEvento(fecha)
            {
                document.getElementById('fechaPuente').value=fecha;;
            } 
            

        </script> 
        <script>
            $('#btnAgregar').click(function(){
                let fecha = document.getElementById('fechaPuente').value;
                let placa = document.getElementById('txtPlaca').value;
                let hora = document.getElementById('txtHora').value;
                let email = document.getElementById('email').value;
                let servicio = document.getElementById('txtDescripcion').value;
                let opcion = 'grabarEvento';
                //grabar el evento 
                fetch("calendario.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `opcion=${opcion}&fecha=${fecha}&placa=${placa}&hora=${hora}&email=${email}&servicio=${servicio}`
                }).then(() => calendar.refetchEvents());

                $("#modalEventos").modal("hide");
                location.reload();
            });

            $('#btnAgregar').click(function(){

            });
            function updateEvent(eventData) {
                var event = calendar.getEventById(eventData.id);
                alert(event);
                // if (event) {
                //     event.setProp('title', eventData.title);
                //     event.setStart(eventData.start);
                //     event.setEnd(eventData.end);
                // }
                // calendar.rerenderEvents(); // Redibujar eventos sin perder la vista actual
            }


            // $('#btnEliminar').click(function(){
            //     RecolectarDatosGui();
            //     EnviarInformacion('eliminar',NuevoEvento);
            // });

            // $('#btnModificar').click(function(){
            //     RecolectarDatosGui();
            //     EnviarInformacion('modificar',NuevoEvento);
            // });

        // function EnviarInformacion(accion,objEvento,modal){
        //     $.ajax({
        //         type:'POST',
        //         url:'eventos.php?accion='+accion,
        //         data:objEvento,
        //         success:function(msg){
        //             if(msg){
        //                 $("#calendario").fullCalendar('refetchEvents');
        //                 if(!modal){
        //                     $("#modalEventos").modal('toggle');
        //                 }
        //             }
        //         },
        //         error: function(){
        //                 alert('Hay un error');
        //         }
        //     })
        // }
        function EnviarInformacion()
        {
            let fecha = document.getElementById('fechaPuente').value;
            let placa = document.getElementById('txtPlaca').value;
            let hora = document.getElementById('txtHora').value;
            let email = document.getElementById('email').value;
            let servicio = document.getElementById('txtDescripcion').value;
            
            alert('sene envio la informacion '+placa);
            fetch("guardar_cita.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `fecha=${fecha}&placa=${placa}&hora=${hora}&email=${email}&servicio=${servicio}`
                }).then(() => 'abc');
        }    

        function verifiquePlaca()
        {
            alert('click en placa');
        }
        </script>   
        <?php
    }


    public function modalEventos()
    {
        ?>
         <!--aqui comienza el modal -->
            <div class="modal fade" id="modalEventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendamiento de Cita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <?php  $this->mostrarFormuNuevoEvento();  ?>
                </div>
                <div class="modal-footer">

                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnAgregar">Agregar</button>
                    <button type="button" class="btn btn-success" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar" >Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- aqui termina el modal -->

        <?php
    }

    public function mostrarFormuNuevoEvento()
    {
        ?>
          <div class="col-lg-4">
                        <label>Fecha:</label>
                        <input type="text" class="form-control" id ="fechaPuente" onfocus="blur();">
          </div>
        <!-- <input type ="text" id="fechaPuente"> -->
         <div id="verifiquePlaca();"></div>
         <div class="container row">
                        <div class="col-lg-4">
                        <label>Placa:</label>
                        <input type="text" class="form-control" id ="txtPlaca">
                        </div>
                        <div class="col-lg-4">
                        <label>Hora:</label>
                        <div class="input-group flatpickr" data-autoclose="true">
                                    <input type="text" id="txtHora" value="10:30" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                        <label>Email:</label>
                        <input type="text" class="form-control" id ="email">
                        </div>
                        <div class="col-lg-12" >
                            <label for="">Motivo de la visita:</label>
                            <textarea id="txtDescripcion" name="txtDescripcion" rows="3" class="form-control" ></textarea>
                        </div>    
                        <!-- <div class="form-group col-lg-12" >
                            <label for=""> Color : </label>
                        <input type="color"  value="#ff0000" id="txtColor" name="txtColor" class="form-control" style="height:36x;">
                        </div>   -->

                    </div>

        <?php
    }
}



?>