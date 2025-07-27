<main class="registro">
    <h2 class="registro__heading"><?= $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div  <?= aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripcion Gratis">
            </form>
        </div>
        <div  <?= aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 dias</li>
                <li class="paquete__elemento">Acceso a Talleres y conferencias</li>
                <li class="paquete__elemento">acceso a las Grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
            </ul>
            <p class="paquete__precio">$199</p>

            <!--<div id="paypal-container-6CFGCCDDNHSFJ"></div>-->
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
        <div  <?= aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 dias</li>
                <li class="paquete__elemento">Enlace a Talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
            </ul>
            <p class="paquete__precio">$49</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Boton Generado d ela pagina -->
<!--<script src="https://www.paypal.com/sdk/js?client-id=BAA9KOSK9Hc30zZlL2LoCNYaz-0VT9bbIejg1j9TDJ822GWjJemBumuPwO_Tr_l5I0OxU6ufhfkwan7-qQ&components=hosted-buttons&disable-funding=venmo&currency=USD"></script>
<script>
    paypal.HostedButtons({
        hostedButtonId: "6CFGCCDDNHSFJ",
    }).render("#paypal-container-6CFGCCDDNHSFJ")
</script>-->

<!-- INTEGRADO -->
<script src="https://www.paypal.com/sdk/js?client-id=AWyOeB49TALchjRv3Khy104lv-MAD0rPcZr5r7av-FINct_vZsz3oY_BY228bmYkqhYD9JOg2ZWdzI2d&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>

    // Pase presencial
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":49}}]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    const datos = new FormData();
                    datos.append('paquete_id', orderData.purchase_units[0].description);
                    datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                    fetch('/finalizar-registro/pagar', {
                        method: 'POST',
                        body: datos
                    })
                    .then( respuesta => respuesta.json() )
                    .then( resultado => {
                        if (resultado.resultado) {
                            actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                        }
                    })

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }

     // Pase virtual
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
        },

        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {

                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                    .then( respuesta => respuesta.json() )
                    .then( resultado => {
                        if (resultado.resultado) {
                            actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                        }
                    })

            });
        },

        onError: function(err) {
            console.log(err);
        }
    }).render('#paypal-button-container-virtual');

    initPayPalButton();
</script>

<!-- Integracion de practica -->
<!--<script src="https://www.paypal.com/sdk/js?client-id=AWyOeB49TALchjRv3Khy104lv-MAD0rPcZr5r7av-FINct_vZsz3oY_BY228bmYkqhYD9JOg2ZWdzI2d&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }

    initPayPalButton();
</script>-->
