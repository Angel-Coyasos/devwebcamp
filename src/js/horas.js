(function () {

    const horas = document.querySelector('#horas');

    if (horas) {

        const categoria = document.querySelector('[name="categoria_id"]');
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');

        categoria.addEventListener('change', terminoBusqueda);
        dias.forEach( dia => dia.addEventListener('change', terminoBusqueda));

        let busqueda = {
            categoria_id: categoria.value || '',
            dia: inputHiddenDia.value || ''
        }

        // si al menos unos de los dos campos esta vacio no se ejecuta, pero aqui se niega
        if ( !Object.values(busqueda).includes('') ) {

            // Tambien puedes usar un ifi para ejecutar la llamdad sin crear mas funciones
            async function iniciarApp (){
                await buscarEventos();

                // Resaltar la hora actual
                const id = inputHiddenHora.value;
                const horaSaleccionada = document.querySelector(`[data-hora-id="${id}"]`);

                horaSaleccionada.classList.remove('horas__hora--deshabilitada');
                horaSaleccionada.classList.add('horas__hora--seleccionada');

                horaSaleccionada.onclick = seleccionarHora;
            }

            iniciarApp();

        }

        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value;

            // Reiniciar los campos ocultos y elselector de horas
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';

            // Deshabilitar la hora previa, si hay un nuevo click
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            if ( Object.values(busqueda).includes('') ) {
                return;
            }

            buscarEventos();
        }
        
        async function buscarEventos() {
            const {dia, categoria_id} = busqueda;

            const url = `/api/eventos/horarios?dia_id=${dia}&categoria_id=${categoria_id}`;

            const resultado = await fetch(url);

            const eventos = await resultado.json();

            obtenerHorasDisponibles(eventos);
        }
        
        function obtenerHorasDisponibles(eventos) {

            // Comprobar eventos ya tomados, yq euitar la variable deshabilitar
            const horasTomadas = eventos.map( evento => evento.hora_id );
            const listadoHoras = document.querySelectorAll('#horas li');

            // Reiniciar las horas
            listadoHoras.forEach( li => li.classList.add('horas__hora--deshabilitada') );

            // iterar con filter despues d eocnvertir el objectop a array
            const listadoHorasArray =  Array.from(listadoHoras);
            const resultado = listadoHorasArray.filter( li => !horasTomadas.includes(li.dataset.horaId) );

            // eliminar clase selecionado
            resultado.forEach( li => li.classList.remove('horas__hora--deshabilitada') );

            // Seleccionar hora
            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)');
            horasDisponibles.forEach( hora => hora.addEventListener('click', seleccionarHora) );
        }
        function seleccionarHora(e) {

            // Deshabilitar la hora previa, si hay un nuevo click
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            // agregar clase selecionado y llenar campo oculto dia
            e.target.classList.add('horas__hora--seleccionada');
            inputHiddenHora.value = e.target.dataset.horaId;

            // llenar el campoi oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
        }
    }

})();