(function() {
    var misReservas = [];
    var email = document.getElementById("email");
    var clave = document.getElementById("clave");
    var btlogin = document.getElementById("btlogin");
    var claveR = document.getElementById("claveR");
    var registrar = document.getElementById("registrar");
    var divRegistro = document.getElementById("divRegistro");
    var btregistro = document.getElementById("btregistro");
    var emailRegistro = document.getElementById("emailRegistro");
    var volver = document.getElementById("volver");
    var claveRegistro = document.getElementById("claveRegistro");
    var divMensaje = document.getElementById("divMensaje");
    var mensajeError = document.getElementById("mensajeError");
    var divLogin = document.getElementById("divLogin");
    var divPlanificador = document.getElementById("divPlanificador");
    var dias = document.getElementsByClassName("dia");
    var divReserva = document.getElementById("divReserva");
    var btReserva = document.getElementById("btReserva");
    var ocupado = document.getElementById("ocupado");
    var volverPlanificador = document.getElementById("volverPlanificador");
    var planificador = document.getElementById("planificador");
    var cerrar = document.getElementById("cerrar");
    var espera = document.getElementById("espera");
    var listaEspera = document.getElementById("listaEspera");
    var divMensajeOkEspera = document.getElementById("divMensajeOkEspera");
    var divMensajeNoEspera = document.getElementById("divMensajeNoEspera");
    var volverOk = document.getElementById("volverOk");
    var volverNo = document.getElementById("volverNo");
    var mensajePropia = document.getElementById('mensajePropia');
    var volverPropia = document.getElementById("volverPropia");
    var divAdministrador = document.getElementById("divAdministrador");
    var prueba = document.getElementById("prueba");
    var listaPrueba = document.getElementById("listaPrueba");
    var resetear=document.getElementById("resetear");
    var reseteoOk=document.getElementById("reseteoOk");
    var volverZA=document.getElementById("volverZA");
    var cerrarAdmin=document.getElementById("cerrarAdmin");
    cerrarAdmin.addEventListener('click',function(){
        var procesarRespuesta = function(respuesta) {
            if (!respuesta.login) {
                divLogin.classList.remove("oculto");
                divAdministrador.classList.add("oculto");

            }
        };
        var ajax = new Ajax();
        ajax.setUrl("../ajax/ajaxLogout.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();

        
    })
    
    /*volver a la zona del administrador---*/
    volverZA.addEventListener("click",function(){
        divAdministrador.classList.remove('oculto');
        reseteoOk.classList.add('oculto');
        
    })
    
    /*---evento para que el administrador resetee el planificador---*/
    resetear.addEventListener("click", function(){
        var procesarRespuesta5 = function(respuesta) {
                   if(respuesta.reseteo==true){
                    reseteoOk.classList.remove('oculto');
                    divAdministrador.classList.add('oculto');
            }

            };
                var ajax = new Ajax();
                        ajax.setUrl("../ajax/ajaxBorrar.php");
                        ajax.setRespuesta(procesarRespuesta5);
                        ajax.doPeticion();
        
        
    },false)
    
    /*---evento para que el administrador visualice la lista de reservas---*/
    listaPrueba.addEventListener('click', function() {

        prueba.remove('oculto');
        peticionReservas2();
       
    })


    volverPropia.addEventListener('click', function() {
            mensajePropia.classList.add("oculto");
            divPlanificador.classList.remove("oculto");
        })
        /*---Enlace Volver-----------------------*/
    volverOk.addEventListener('click', function() {
            divMensajeOkEspera.classList.add("oculto");
            divPlanificador.classList.remove("oculto");

        })
        /*---Enlace Volver-----------------------*/
    volverNo.addEventListener('click', function() {
            divMensajeNoEspera.classList.add("oculto");
            divPlanificador.classList.remove("oculto");

        })
        //var diaInicio=document.getElementById("diaInicio").value;
        //var diaFin=document.getElementById("diaFin").value;
        //var horaInicio=document.getElementById("horaInicio").value;
        //var horaFin=document.getElementById("horaFin").value;


    /*----MENSAJE ERROR EN EL LOGIN---*/
    volver.addEventListener('click', function() {

        divMensaje.classList.add("oculto");
        divLogin.classList.remove("oculto");

    })


    /* ----LOGIN----*/
    btlogin.addEventListener('click', function() {
        var procesarRespuesta = function(respuesta) {
            if (respuesta.login == true) {
                divLogin.classList.add("oculto");
                divPlanificador.classList.remove("oculto");
                peticionReservas();

            }
            else {
                if (respuesta.login == 'admin') {
                    divLogin.classList.add("oculto");
                    divAdministrador.classList.remove('oculto');

                    /*----------------------*/
                }
                else {
                    divLogin.classList.add("oculto");
                    divMensaje.classList.remove("oculto");
                }

            }
        };
        var ajax = new Ajax();
        ajax.setPost();
        var datoLogin = encodeURI(email.value);
        var datoClave = encodeURI(clave.value);
        ajax.setParametros("email=" + datoLogin + "&clave=" + datoClave);
        ajax.setUrl("../ajax/ajaxLogin.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();
    }, false)


    /* REGISTRO */
    registrar.addEventListener('click', function() {

        divRegistro.classList.remove('oculto');
        divLogin.classList.add('oculto');
    });

    btregistro.addEventListener('click', function() {
        var procesarRespuesta = function(respuesta) {
            if (respuesta.registro) {
                divRegistro.classList.add("oculto");
                divLogin.classList.remove("oculto");

            }
            else {
                divRegistro.classList.add("oculto");
                divMensaje.classList.remove("oculto");
            }
        };

        divRegistro.classList.remove("oculto");
        var ajax = new Ajax();
        ajax.setPost();
        var datoEmailR = encodeURI(emailRegistro.value);
        var datoClave = encodeURI(claveRegistro.value);
        var datoClaveR = encodeURI(claveR.value);
        ajax.setParametros("emailR=" + datoEmailR + "&clave=" + datoClave + "&claveR=" + datoClaveR);
        ajax.setUrl("../ajax/ajaxRegistro.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();
    }, false)

    /*----EVENTO PINCHAR EN LA AGENDA-----*/

    for (var i = 0; i < dias.length; i++) {
        dias[i].addEventListener('click', function() {

            var that = this;
            /*-----------RESERVAR--------------------------------*/
            var procesarRespuesta = function(respuesta) {
                if (respuesta.reserva == true) {

                    if (that.textContent == "Disponible") {
                        that.textContent = "RESERVADO";
                        that.classList.remove("green");
                        that.classList.add("red");
                    }

                }
                else {
                    if (respuesta.reserva == 'propia') {
                        divPlanificador.classList.add('oculto');
                        mensajePropia.classList.remove('oculto');


                        that.textContent = "Disponible";
                        that.classList.remove("red");
                        that.classList.add("green");
                        /*-----------LLENAR EL HUECO QUE SE ACABA DE QUEDAR LIBRE CON LA LISTA DE ESPERA-------------*/
                        var procesarRespuesta4 = function(respuesta) {
                            if (respuesta.mover == true) {

                                that.textContent = "RESERVADO";
                                that.classList.remove("green");
                                that.classList.add("red");
                            }
                            if (respuesta.mover == false) {}

                        };
                        var ajax = new Ajax();
                        var datoid = that.getAttribute('id');
                        ajax.setUrl("../ajax/ajaxOcuparhueco.php?id=" + datoid);
                        ajax.setRespuesta(procesarRespuesta4);
                        ajax.doPeticion();

                    }
                    else {

                        espera.classList.remove("oculto");
                        divPlanificador.classList.add("oculto");
                    }
                    /*---VOLVER al planificador---*/
                    volverPlanificador.addEventListener('click', function() {
                            espera.classList.add("oculto");
                            divPlanificador.classList.remove("oculto");
                        })
                        /*--IR A LA LISTA DE ESPERA-------*/

                    listaEspera.addEventListener('click', function() {

                        var procesarRespuesta2 = function(respuesta) {
                            if (respuesta.espera != false) {
                                espera.classList.add("oculto");
                                divMensajeOkEspera.classList.remove('oculto');
                                divMensajeNoEspera.classList.add('oculto');
                            }
                            if (respuesta.espera == false) {

                                espera.classList.add("oculto");
                                divMensajeNoEspera.classList.remove('oculto');
                                divMensajeOkEspera.classList.add('oculto');
                            }
                        };

                        var ajax = new Ajax();
                        ajax.setPost();
                        var datoid = that.getAttribute('id');
                        ajax.setParametros("id=" + datoid);
                        ajax.setUrl("../ajax/ajaxListaEspera.php");
                        ajax.setRespuesta(procesarRespuesta2);
                        ajax.doPeticion();

                    }, false)
                }

            };

            var ajax = new Ajax();
            ajax.setPost();
            var datoid = this.getAttribute('id');
            ajax.setParametros("id=" + datoid);
            ajax.setUrl("../ajax/ajaxReserva.php");
            ajax.setRespuesta(procesarRespuesta);
            ajax.doPeticion();

        }, false)
    }

    /*-------------AGREGAR A LA LISTA DE ESPERA-----
    listaEspera.addEventListener('click',function(){
    var procesarRespuesta = function (respuesta) {
    if (respuesta.registro) {
        divRegistro.classList.add("oculto");
        divLogin.classList.remove("oculto");
                
    } else {
        divRegistro.classList.add("oculto");
        divMensaje.classList.remove("oculto");
        }
    };
    var ajax = new Ajax();
    ajax.setPost();
    var datoEmailR = encodeURI(emailRegistro.value);
    var datoClave = encodeURI(claveRegistro.value);
    var datoClaveR= encodeURI(claveR.value);
    ajax.setParametros("emailR=" + datoEmailR +"&clave=" + datoClave+"&claveR=" + datoClaveR);
    ajax.setUrl("../ajax/ajaxRegistro.php");
    ajax.setRespuesta(procesarRespuesta);
    ajax.doPeticion();
    },false)*/



    /*-----------REFRESCO DE LA TABLA--------------------------------*/
    var peticionReservas = function() {
        var procesarRespuesta = function(respuesta) {
            if (respuesta.estado) {

            }
            misReservas = respuesta.estado;
            dibujaTabla(misReservas);

        };
        var ajax = new Ajax();
        ajax.setUrl("../ajax/ajaxReservados.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();
    };
    /*-----------RECARGAR PAGINA SI ESTAS LOGUEADO--------------------------------*/
    var procesarRespuesta = function(respuesta) {
        if (respuesta.login) {
            if(respuesta.login=='admin')
                {divLogin.classList.add("oculto");
                divAdministrador.classList.remove('oculto');
                    
                }else{
                divLogin.classList.add("oculto");
                divPlanificador.classList.remove("oculto");
                peticionReservas();}
            
        }
    };
    var ajax = new Ajax();
    ajax.setUrl("../ajax/ajaxLogueado.php");
    ajax.setRespuesta(procesarRespuesta);
    ajax.doPeticion();

    /*-----------FUNCIÓN PARA DIBUJAR LA TABLA--------------------------------*/
    function dibujaTabla(misReservas) {

        for (var i = 0; i < misReservas.length; i++) {
            var idocupadas = misReservas[i].idReserva;
            var fila = document.getElementById(idocupadas);

            fila.classList.remove('green');
            fila.classList.add('red');
            fila.textContent = "RESERVADO";

        }
    }
    /*-----------CERRAR SESION--------------------------------*/

    cerrar.addEventListener("click", function() {
        var procesarRespuesta = function(respuesta) {
            if (!respuesta.login) {
                divLogin.classList.remove("oculto");
                divPlanificador.classList.add("oculto");

            }
        };
        var ajax = new Ajax();
        ajax.setUrl("../ajax/ajaxLogout.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();


    }, false)

    /*-----------------refrescar la lista de reservas-------*/
    function refrescoReservas(listaagenda) {
        var li, idReserva, dia, hora, email, d;
        var idLista = "listaDeReservas";
        var lista = document.getElementById(idLista);
        if (lista) {
            borrarNodo(lista);
        }
        var myList = document.createElement("ul");
        myList.id = idLista;
        for (var i = 0; i < listaagenda.length; i++) {
            li = document.createElement("li");
            idReserva = listaagenda[i].idReserva;
            email = listaagenda[i].email;
            dia=idReserva.substr(0,1);
            hora=idReserva.substr(1,2);
            if(dia=="l"){
                d="lunes";
            }
             if(dia=="m"){
                d="martes";
            }
             if(dia=="x"){
                d="miercoles";
            }
            if(dia=="j"){
                d="jueves";
            }
            if(dia=="v"){
                d="viernes";
            }
            if(dia=="s"){
                d="sabado"}
            if(dia=="d"){
                d="domingo";
            }
            
            
            hora = idReserva.substr(1, 2);
            li.textContent = d+' a las ' + hora + 'h reservado por ' + email;
            myList.appendChild(li);
        }
        listaPrueba.appendChild(myList);
    }


    function borrarNodo(padre) {
        if (padre.parentNode) {
            padre.parentNode.removeChild(padre);
        }
    }
     /*----------En la zona del administrador: Dibujar la lista de reservas refrescada--------------------------------*/
     var peticionReservas2 = function() {
            var procesarRespuesta = function(respuesta) {
                if (respuesta.estado) {
                }
                misReservas = respuesta.estado;
                refrescoReservas(misReservas);

            };
            var ajax = new Ajax();
            ajax.setUrl("../ajax/ajaxReservados.php");
            ajax.setRespuesta(procesarRespuesta);
            ajax.doPeticion();
        };
         /*-.----------resetear la tabla y ponerla a 0 para una semana nueva--*/
       
            
         

   

    //function crearTabla(diainicio,diafin,horainicio,horafin){
    //    var table=document.createElement("table");
    //    var td=doc

    //   for(var i=diainicio;i<=diaFin;i++){
    //       for(var j=horaInicio;j>horaFin;j++){
    //           var td=document.createElement("td")
    //      }
    //   }
    // }















})();