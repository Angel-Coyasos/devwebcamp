import Swal from 'sweetalert2';

(function () {

    let eventos = [];

    const resumen = document.querySelector('#registro-resumen');

    if (resumen) {

        const eventosBoton = document.querySelectorAll('.evento__agregar');
        eventosBoton.forEach(boton => boton.addEventListener('click', selecionarEvento));

        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();

        function selecionarEvento( {target} ) {

            if (eventos.length < 5) {

                // Agregar al evento
                eventos = [...eventos, {
                    id: target.dataset.id,
                    titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }];

                // Deshabilitar el evento
                target.disabled = true;

                // Mostrar eventos
                mostrarEventos();

            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Maximo 5 eventos por registro',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }

        function mostrarEventos() {
            // Limpiar el HTML
            limpiarEvento();

            if (eventos.length > 0) {
                eventos.forEach( evento => {
                    const  eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');

                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    // boton eliminar
                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    botonEliminar.onclick = function() {
                        eliminarEvento(evento.id);
                    }

                    // renderizar en el html
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                } )
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos, puedes agregar hasta 5 del lado izquiero'
                noRegistro.classList.add('registro__texto');
                resumen.appendChild(noRegistro);
            }
        }

        function eliminarEvento(id) {
            eventos = eventos.filter( evento => evento.id !== id );
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        function limpiarEvento() {
            while(resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }

        async function submitFormulario(e) {
            e.preventDefault();

            // Obtener el regalo
            const regaloId = document.querySelector('#regalo').value

            // Obtener los eventos
            const eventosId = eventos.map( evento => evento.id );

            if (eventosId.length === 0 || regaloId === '' ) {
                Swal.fire({
                    title: 'Error',
                    text: 'Eleje al menos un Evento y un Regalo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Objecto de formdata
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();

            console.log(resulatdo);

            if (resultado.resultado) {
                Swal.fire({
                    title: 'Registro Exitoso',
                    text: 'Tus conferencias se han almacenado y tu registro fue exitoso, te esperamos en DevWebCamp',
                    icon: "success",
                }).then(
                    () => location.href = `/boleto?id=${resultado.token}`
                )
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(
                    () => location.reload()
                )
            }

        }

    }
    
})();