<section id="simulador" class="specials">
    <script type="text/javascript">
        var total = 0.00;
        var sumtabla = 0.00;
        var sumtipo = 0.00;
        var sumpersona = 0.00;
        var sumdelivery = 0.00;
        var valorxper = [];
        var valorxpersona = 0.00;

        function controlador(id) {

            switch (id) {
                case 'tablas':
                    document.getElementById("precios").style.opacity = "1";
                    document.getElementById("total").style.opacity = "1";
                    //Si ya esta establecido un valor para sumtabla lo resta para sumar el nuevo
                    if (sumtabla != 0) {
                        total = total - sumtabla;
                        sumtabla = verificarTabla();
                        total = total + sumtabla;
                    } else {
                        sumtabla = verificarTabla();
                        total = total + sumtabla;
                    }
                    //Si ya esta establecido un valor para los comensales se establece en cuatro si la tabla es duela o duela rectangular.
                    if (sumpersona != 0) {
                        Tabla();
                    }
                    break;
                case 'tipos':
                    document.getElementById("tipoPicada").style.opacity = "1";
                    if (sumtipo != 0) {
                        total = total - sumtipo;
                        if (sumpersona != 0) {
                            //Si ya esta establecido un valor para los 2 valores para modificar el resultado del producto lo resta para sumar el nuevo.
                            if (valorxpersona != 0) {
                                total = total - (sumpersona * valorxpersona);
                                sumtipo = verificarTipos();
                                valorxpersona = idTipos();
                                total = total + sumtipo + (sumpersona * valorxpersona);
                            } else {
                                sumtipo = verificarTipos();
                                valorxpersona = idTipos();
                                total = total + sumtipo;


                            }
                        } else {
                            sumtipo = verificarTipos();
                            valorxpersona = idTipos();
                            total = total + sumtipo;
                        }
                    } else {
                        sumtipo = verificarTipos();
                        valorxpersona = idTipos();
                        total = total + sumtipo;
                    }

                    break;
                case 'personas':

                    document.getElementById("comensales").style.opacity = "1";
                    if (sumpersona != 0) {
                        if (valorxpersona != 0) {
                            total = total - (sumpersona * valorxpersona);
                        }
                        sumpersona = verificarPersonas();
                        total = total + (sumpersona * valorxpersona);
                    } else {
                        sumpersona = verificarPersonas();
                        total = total + (sumpersona * valorxpersona);
                    }
                    break;
                case 'delivery':
                    document.getElementById("costoDelivery").style.opacity = "1";

                    if (sumdelivery != 0) {
                        total = total - sumdelivery;
                        sumdelivery = verificarDelivery();
                        total = total + sumdelivery;
                    } else {
                        sumdelivery = verificarDelivery();
                        total = total + sumdelivery;
                    }
                    break;
            }
            document.getElementById('lbtabla').innerHTML = sumtabla;
            document.getElementById('lbtipo').innerHTML = sumtipo;
            document.getElementById('lbpersona').innerHTML = (sumpersona * valorxpersona);
            document.getElementById('lbdelivery').innerHTML = sumdelivery;
            document.getElementById('lbtotal').innerHTML = total;
        }

        function verificarTabla() {
            let tablas = document.getElementById('tablas');
            let tabla = tablas.options[tablas.selectedIndex].text;

            if (tabla == "MDF") {
                document.getElementById('personas').disabled = false;
                document.getElementById('personas').selectedIndex = "0";
                document.getElementById('personas').style.display = "block";
            } else {
                document.getElementById('personas').selectedIndex = "1";
                document.getElementById('personas').disabled = true;
            }
            return parseFloat(tablas.value)
        }

        function Tabla() {
            let tablas = document.getElementById('tablas');
            let tabla = tablas.options[tablas.selectedIndex].text;
            if (tabla == "Duela" || tabla == "Duela Rectangular") {
                controlador("personas");
            }
        }

        function verificarTipos() {
            let tipos = document.getElementById('tipos');
            return parseFloat(tipos.value)
        }

        function idTipos() {
            let tipos = document.getElementById('tipos');
            let tipo = tipos.options[tipos.selectedIndex].id;
            parseFloat(tipo)
            return parseFloat(valorxper[tipo])
        }

        function verificarPersonas() {
            let personas = document.getElementById('personas');
            let persona = personas.options[personas.selectedIndex].id;
            return parseFloat(persona);
        }

        function verificarDelivery() {
            let delivery = document.getElementById('delivery');
            return parseFloat(delivery.value);
        }
    </script>
    <div class="container">
        <div class="section-title">
            <h2><span>Simulador de Pedidos</span></h2>
            <p>Elegí las opciones para simular Pedido.</p>
        </div>
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <!-- select tablas -->
                <div class="form-group mb-0">
                    <label style="font-size: smaller; font-weight: 600;" class="control-label">Elegí el tipo de tabla:</label>
                    <select class="form-control form-control" aria-label="Default select example" id="tablas" onchange="controlador(id);">
                        <option value="">-.Elegir.-</option>
                        <?php
                        $query = "SELECT * FROM `tablas`";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $titulo = $row['titulo'];
                            $precio = $row['precio'];
                        ?>
                            <option value='<?php echo $precio; ?>' id="<?php echo $id; ?>"><?php echo $titulo ?></option>
                        <?php } ?>
                    </select>
                    <p id='precios' style='opacity:0; margin-bottom: 0 !important;'><small>Costo del tipo de tabla: $<label id="lbtabla"></label>.00</small></p>
                </div>
                <!-- select tipo de picada -->
                <div class="form-group mb-0">
                    <label style="font-size: smaller; font-weight: 600;" class="control-label">¿Qué tipo de Picada querés?</label>
                    <select class="form-control form-control" aria-label="Default select example" id="tipos" onchange="controlador(id);">
                        <option selected id='1' value='0'>Selecciona tipo de picada:</option>
                        <?php
                        $query = "SELECT * FROM `tipo_picada`";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $titulo = $row['titulo'];
                            $precio = $row['precio'];
                            $valor_por_persona = $row['valor_por_persona'];
                        ?>
                            <script>
                                valorxper[<?php echo $id; ?>] = <?php echo $valor_por_persona; ?>;
                            </script>
                            <option value='<?php echo $precio; ?>' id="<?php echo $id; ?>"><?php echo $titulo ?></option>

                        <?php } ?>
                    </select>
                    <p id='tipoPicada' style='opacity:0; margin-bottom: 0 !important;'><small>Costo del tipo de picada: $<label id="lbtipo"></label>.00</small></p>

                </div>
                <!-- select Comensales -->
                <div class="form-group mb-0">
                    <label style="font-size: smaller; font-weight: 600;" class="control-label">¿Cuántos comen?</label>
                    <select class="form-control" aria-label="Default select example" id="personas" onchange="controlador(id);">
                        <option selected id="0">Comensales:</option>
                        <option id="4">Pican 4/ Comen 2</option>
                        <option id="5">Pican 5</option>
                        <option id="6">Pican 6/ Comen 3</option>
                    </select>
                    <p id='comensales' style='opacity:0; margin-bottom: 0 !important;'><small>Costo total de comensales: $<label id="lbpersona"></label>.00</small></p>
                </div>
                <!-- select Comensales -->
                <div class="form-group mb-0">
                    <label style="font-size: smaller; font-weight: 600;" class="control-label">¿Buscas o te la llevamos?</label>
                    <select class="form-control form-control" aria-label="Default select example" id="delivery" onchange="controlador(id);">

                        <option selected value='0'>Retirar</option>
                        <?php
                        $query = "SELECT * FROM `delivery`";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $titulo = $row['location'];
                            $precio = $row['px_km'];
                        ?>
                            <option value='<?php echo $precio; ?>' id="<?php echo $id; ?>">Envio a <?php echo $titulo ?></option>
                        <?php } ?>
                    </select>
                    <p id='costoDelivery' style='opacity:0; margin-bottom: 0 !important;'><small>Costo por el envio: $<label id="lbdelivery"></label>.00</small></p>

                </div>
            </div>
            <div class="row">


                <div class="col-sm-4 mx-auto">
                    <div class="container text-center">
                        <!--  <div id="subtotal">
                        <p class=""><strong>Subtotales:</strong></p>
                        <p class="">
                            Tipo de tabla: $ <label id="lbtabla"></label><br>
                            Tipo de Picada para: $ <label id="lbtipo"></label><br>
                            Cantidad de Comensales: $ <label id="lbpersona"></label><br>
                            Envio: $ <label id="lbdelivery"></label></p>
                        <hr class="bg-white">
                    </div> -->
                        <div id="total" style="opacity:0;   ">
                            <p style="font-size: x-large; font-weight: 700; margin-top: 2rem;">Costo Total del Pedido:</p>
                            <h1 style="color: #ffb03b;font-weight: 600;font-size: 3rem;"> $ <label id="lbtotal"></label>.00</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script 1: bloquear la cantidad de personas dependiendo de la tabla -->

</section>