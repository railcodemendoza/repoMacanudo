<?php include("variables.php"); ?>
<section id="simulador" class="specials">

    <div class="container">
        <div class="section-title">
            <h2><span>Simulador de Pedidos</span></h2>
            <p>Elegí las opciones para simular Pedido.</p>
        </div>
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <form action="control/forms/pedido_datos_personales.php" id="form_simulador" class="form-horizontal "
                    method="POST">
                    <!-- select tablas -->


                    <label style="font-weight: 600;" class="control-label">Selecciona el tipo de
                        picada:</label>
                    <select class="form-control form-control" aria-label="Default select example" id="tipoPicadaSelect"
                        name="tipoPicada" required>
                        <option value=""> -.Elegir tipo de picada.- </option>
                    </select>
                    <p id="precioTipoPicada"></p>

                    <label style="font-weight: 600;" class="control-label">Selecciona el tipo de
                        tabla:</label>
                    <select class="form-control form-control" aria-label="Default select example" id="tipoTablaSelect"
                        name="tipoTabla" required>
                        <option value="">-.Elegir tipo de tabla.-</option>
                    </select>
                    <p id="precioTipoTabla"></p>

                    <label style="font-weight: 600;" class="control-label">Selecciona Cantidad de
                        Comensales:</label>
                    <select class="form-control form-control" aria-label="Default select example"
                        id="cantidadComensalesSelect" name="cantidadComensales" required>
                        <option value="">-.Elegir cantidad de Comensales.-</option>
                    </select>
                    <p id="precioComensales"></p>

                    <label style="font-weight: 600;" class="control-label">Selecciona Primer
                        Agregado:</label>
                    <select class="form-control form-control" aria-label="Default select example"
                        id="primerAgregadoSelect" name="agregado1">
                        <option value="">-.Elegir Agregado.-</option>
                    </select>
                    <p id="precioPrimerAgregado"></p>

                    <label style="font-weight: 600;" class="control-label">Selecciona Segundo
                        Agregado:</label>
                    <select class="form-control form-control" aria-label="Default select example"
                        id="segundoAgregadoSelect" name="agregado2">
                        <option value="">-.Elegir Agregado.-</option>
                    </select>
                    <p id="precioSegundoAgregado"></p>

                    <label style="font-weight: 600;" class="control-label">Selecciona Tercer
                        Agregado:</label>
                    <select class="form-control form-control" aria-label="Default select example"
                        id="tercerAgregadoSelect" name="agregado3">
                        <option value="">-.Elegir Agregado.-</option>
                    </select>
                    <p id="precioTercerAgregado"></p>

                    <label style="font-weight: 600;" class="control-label">¿Buscas o te la
                        llevamos?</label>
                    <select class="form-control form-control" aria-label="Default select example" id="deliverySelect"
                        name="delivery" required>
                        <option value="">-.Elegir.-</option>
                        <option value="0">Retirar por local</option>
                    </select>
                    <p id="precioDelivery"></p>
                    <div>
                        <h2 id="precioTotal" style="color: orange; font-family: Poppins, sans-serif; font-size:larger">Precio Total: $0.00</h2>
                        <input type="hidden" id="preciofinal" name="preciofinal" value="">
                    </div>


                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const tipoPicadaSelect = document.getElementById('tipoPicadaSelect');
                        const tipoTablaSelect = document.getElementById('tipoTablaSelect');
                        const cantidadComensalesSelect = document.getElementById('cantidadComensalesSelect');
                        const primerAgregadoSelect = document.getElementById('primerAgregadoSelect');
                        const segundoAgregadoSelect = document.getElementById('segundoAgregadoSelect');
                        const tercerAgregadoSelect = document.getElementById('tercerAgregadoSelect');
                        const deliverySelect = document.getElementById('deliverySelect');
                        const precioPrimerAgregadoElement = document.getElementById('precioPrimerAgregado');
                        const precioSegundoAgregadoElement = document.getElementById('precioSegundoAgregado');
                        const precioTercerAgregadoElement = document.getElementById('precioTercerAgregado');
                        const precioTipoPicadaElement = document.getElementById('precioTipoPicada');
                        const precioTipoTablaElement = document.getElementById('precioTipoTabla');
                        const precioComensalesElement = document.getElementById('precioComensales');
                        const precioDeliveryElement = document.getElementById('precioDelivery');
                        const precioTotalElement = document.getElementById('precioTotal');
                        const precioFinalElement = document.getElementById('preciofinal');

                        // Manejar cambios en los select de agregados
                        primerAgregadoSelect.addEventListener('change', actualizarPrecios);
                        segundoAgregadoSelect.addEventListener('change', actualizarPrecios);
                        tercerAgregadoSelect.addEventListener('change', actualizarPrecios);

                        // Realizar la solicitud HTTP a la API
                        const requestOptions = {
                            method: "GET",
                            redirect: "follow"
                        };

                        fetch("<?php echo $urlApi;?>/api/tipoPicadaActivas", requestOptions)
                            .then(response => response.json())
                            .then(result => {
                                // Llenar el select de tipo de picada
                                result.forEach(tipoPicada => {
                                    const option = document.createElement('option');
                                    option.value = tipoPicada.id;
                                    option.textContent = tipoPicada.tipo;
                                    option.dataset.precio = tipoPicada.in_ars;
                                    option.dataset.valorPorPersona = tipoPicada.valor_por_persona;
                                    tipoPicadaSelect.appendChild(option);
                                });

                                // Manejar cambios en el select de tipo de picada
                                tipoPicadaSelect.addEventListener('change', function() {
                                    const tipoPicadaId = this.value;
                                    const tipoPicada = result.find(tp => tp.id == tipoPicadaId);
                                    cargarTipoTablaYComensales(tipoPicada);
                                });

                                // Manejar cambios en el select de tipo de tabla
                                tipoTablaSelect.addEventListener('change', actualizarPrecios);

                                // Manejar cambios en el select de cantidad de comensales
                                cantidadComensalesSelect.addEventListener('change', actualizarPrecios);

                                // Manejar cambios en el select de tipo de tabla
                                deliverySelect.addEventListener('change', actualizarPrecios)
                                // Obtener el ID de tipopicada de la URL
                                const urlParams = new URLSearchParams(window.location.search);
                                const tipopicadaIdFromURL = urlParams.get('id_modal');

                                // Seleccionar automáticamente la opción en el campo select
                                if (tipopicadaIdFromURL) {
                                    tipoPicadaSelect.value = tipopicadaIdFromURL;
                                    // Disparar el evento 'change' para activar la lógica asociada
                                    tipoPicadaSelect.dispatchEvent(new Event('change'));
                                }

                                function cargarTipoTablaYComensales(tipoPicada) {
                                    tipoTablaSelect.innerHTML = "";
                                    tipoPicada.tipo_tablas.forEach(tipoTabla => {
                                        const option = document.createElement('option');
                                        option.value = tipoTabla.id;
                                        option.textContent = tipoTabla.tipo;
                                        option.dataset.precio = tipoTabla.in_ars;
                                        option.dataset.maxComensales = tipoTabla
                                        .maximo_personas; // Nueva línea
                                        tipoTablaSelect.appendChild(option);
                                    });
                                    // Llamar a actualizarCantidadComensales después de cargar las tablas
                                    actualizarCantidadComensales(tipoPicada.tipo_tablas[0].maximo_personas);
                                    actualizarPrecios();
                                }
                                // Manejar cambios en el select de tipo de tabla
                                tipoTablaSelect.addEventListener('change', function() {
                                    const maxComensales = parseInt(this.options[this.selectedIndex]
                                        .dataset.maxComensales) || 0;
                                    actualizarCantidadComensales(maxComensales);
                                    actualizarPrecios();
                                });
                                // Función para actualizar la cantidad de comensales
                                function actualizarCantidadComensales(maxComensales) {
                                    cantidadComensalesSelect.innerHTML = "";
                                    for (let i = 4; i <= maxComensales; i++) {
                                        const option = document.createElement('option');
                                        option.value = i;
                                        option.textContent = i + ' personas';
                                        cantidadComensalesSelect.appendChild(option);
                                    }
                                }

                            }).catch(error => console.error(error));
                        // Función para cargar los datos de los agregados y actualizar precios
                        function cargarAgregadosYActualizarPrecios() {
                            fetch("<?php echo $urlApi;?>/api/agregado", requestOptions)
                                .then(response => response.json())
                                .then(result => {
                                    result.forEach(agregado => {
                                        const option1 = document.createElement(
                                            'option');
                                        option1.value = agregado.id;
                                        option1.textContent = agregado.title;
                                        option1.dataset.precio = agregado.in_ars;
                                        primerAgregadoSelect.appendChild(option1);

                                        const option2 = document.createElement(
                                            'option');
                                        option2.value = agregado.id;
                                        option2.textContent = agregado.title;
                                        option2.dataset.precio = agregado.in_ars;
                                        segundoAgregadoSelect.appendChild(option2);

                                        const option3 = document.createElement(
                                            'option');
                                        option3.value = agregado.id;
                                        option3.textContent = agregado.title;
                                        option3.dataset.precio = agregado.in_ars;
                                        tercerAgregadoSelect.appendChild(option3);
                                    });

                                    actualizarPrecios();
                                }).catch(error => console.error(error));
                        }
                        // Función para cargar los datos de los agregados y actualizar precios
                        function cargardeliveryYActualizarPrecios() {
                            fetch("<?php echo $urlApi;?>/api/delivery", requestOptions)
                                .then(response => response.json())
                                .then(result => {
                                    result.forEach(delivery => {
                                        const option1 = document.createElement(
                                            'option');
                                        option1.value = delivery.id;
                                        option1.textContent = delivery.location;
                                        option1.dataset.precio = delivery.px_km;
                                        deliverySelect.appendChild(option1);
                                    });

                                    actualizarPrecios();
                                }).catch(error => console.error(error));
                        }

                        function actualizarPrecios() {
                            const precioTipoPicada = parseFloat(tipoPicadaSelect
                                .options[tipoPicadaSelect.selectedIndex].dataset.precio) || 0;
                            const precioTipoTabla = parseFloat(tipoTablaSelect
                                .options[tipoTablaSelect.selectedIndex].dataset.precio) || 0;
                            const cantidadComensales = parseInt(
                                cantidadComensalesSelect.value) || 0;
                            const valorPorPersona = parseFloat(tipoPicadaSelect
                                .options[tipoPicadaSelect.selectedIndex].dataset.valorPorPersona) || 0;
                            const delivery = parseFloat(deliverySelect
                                .options[deliverySelect.selectedIndex].dataset.precio) || 0;

                            const precioTotalTipoPicada = precioTipoPicada;
                            const precioTotalTipoTabla = precioTipoTabla;
                            const precioTotalComensales = (cantidadComensales - 4) *
                                valorPorPersona;

                            precioTipoPicadaElement.textContent =
                                `Tipo Picada: $${precioTotalTipoPicada.toFixed(2)}`;
                            precioTipoTablaElement.textContent =
                                `Tipo Tabla: $${precioTotalTipoTabla.toFixed(2)}`;
                            precioComensalesElement.textContent =
                                `Comensales: $${precioTotalComensales.toFixed(2)}`;

                            // Obtener los precios de los agregados seleccionados
                            const precioPrimerAgregado = parseFloat(
                                primerAgregadoSelect.options[
                                    primerAgregadoSelect.selectedIndex].dataset
                                .precio) || 0;
                            const precioSegundoAgregado = parseFloat(
                                segundoAgregadoSelect.options[
                                    segundoAgregadoSelect.selectedIndex].dataset
                                .precio) || 0;
                            const precioTercerAgregado = parseFloat(
                                tercerAgregadoSelect.options[
                                    tercerAgregadoSelect.selectedIndex].dataset
                                .precio) || 0;

                            // Mostrar los precios individuales de los agregados
                            precioPrimerAgregadoElement.textContent =
                                `Primer Agregado: $${precioPrimerAgregado.toFixed(2)}`;
                            precioSegundoAgregadoElement.textContent =
                                `Segundo Agregado: $${precioSegundoAgregado.toFixed(2)}`;
                            precioTercerAgregadoElement.textContent =
                                `Tercer Agregado: $${precioTercerAgregado.toFixed(2)}`;
                            precioDeliveryElement.textContent =
                                `Delivery: $${delivery.toFixed(2)}`;

                            // Calcular y mostrar el precio total con los agregados
                            const precioTotalConAgregados =
                                precioTotalTipoPicada + precioTotalTipoTabla + precioTotalComensales +
                                precioPrimerAgregado + precioSegundoAgregado + precioTercerAgregado + delivery;
                            precioTotalElement.textContent =
                                `Total: $${precioTotalConAgregados.toFixed(2)}`;
                            precioFinalElement.value = precioTotalConAgregados;
                        }
                        cargarAgregadosYActualizarPrecios();
                        cargardeliveryYActualizarPrecios();
                    });
                    </script>

                    <br>
                    <div class="col-sm-4 mx-auto" style="text-align: center;"><span></span>
                        <button type="submit" name="enviar_pedido" id="enviar_pedido"
                            style="padding-left: 20%;padding-right: 20%; color:black; font-weight: 500;"
                            class="btn btn-outline-warning">Pedir</button>
                    </div>
                </form>
            </div>
        </div>
</section>