<section id="simulador" class="specials">
    <script type="text/javascript">
    var total = 0.00;
    var sumtabla = 0.00;
    var sumtipo = 0.00;
    var sumpersona = 0.00;
    var sumdelivery = 0.00;
    var sumagregado = 0.00;
    var sumagregado2 = 0.00;
    var sumagregado3 = 0.00;
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
                document.getElementById("total").style.opacity = "1";
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
                document.getElementById("total").style.opacity = "1";
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
                document.getElementById("total").style.opacity = "1";
                if (sumdelivery != 0) {
                    total = total - sumdelivery;
                    sumdelivery = verificarDelivery();
                    total = total + sumdelivery;
                } else {
                    sumdelivery = verificarDelivery();
                    total = total + sumdelivery;
                }
                break;
            case 'agregado':
                document.getElementById("costoAgregado").style.opacity = "1";
                document.getElementById("total").style.opacity = "1";
                if (sumagregado != 0) {
                    total = total - sumagregado;
                    sumagregado = verificarAgregado();
                    total = total + sumagregado;
                } else {
                    sumagregado = verificarAgregado();
                    total = total + sumagregado;
                }
                break;
            case 'agregado2':
                document.getElementById("costoAgregado2").style.opacity = "1";
                document.getElementById("total").style.opacity = "1";
                if (sumagregado2 != 0) {
                    total = total - sumagregado2;
                    sumagregado2 = verificarAgregado2();
                    total = total + sumagregado2;
                } else {
                    sumagregado2 = verificarAgregado2();
                    total = total + sumagregado2;
                }
                break;
            case 'agregado3':
                document.getElementById("costoAgregado3").style.opacity = "1";
                document.getElementById("total").style.opacity = "1";
                if (sumagregado3 != 0) {
                    total = total - sumagregado3;
                    sumagregado3 = verificarAgregado3();
                    total = total + sumagregado3;
                } else {
                    sumagregado3 = verificarAgregado3();
                    total = total + sumagregado3;
                }
                break;

        }
        document.getElementById('lbtabla').innerHTML = sumtabla;
        document.getElementById('lbtipo').innerHTML = sumtipo;
        document.getElementById('lbpersona').innerHTML = (sumpersona * valorxpersona);
        document.getElementById('lbagregado').innerHTML = sumagregado;
        document.getElementById('lbagregado2').innerHTML = sumagregado2;
        document.getElementById('lbagregado3').innerHTML = sumagregado3;
        document.getElementById('lbdelivery').innerHTML = sumdelivery;
        document.getElementById('lbtotal').innerHTML = total;
    }

    function verificarTabla() {
        let tablas = document.getElementById('tablas');

        let tabla = tablas.options[tablas.selectedIndex].text;
        let tablaPrecio = tablas.options[tablas.selectedIndex].id;
        const $select = document.querySelector("#personas");

        document.getElementById('personas').disabled = false;
        document.getElementById('personas').selectedIndex = "0";
        document.getElementById('personas').style.display = "block";
        
        for (let i = $select.options.length; i >= 1; i--) {
                $select.remove(i);
        }
        if (tabla == "MDF") {
            const option = document.createElement('option');
            const valor = "Pican 4/ Comen 2";
            const num = 1;
            option.id = num;
            option.value = num;
            option.text = valor;
            $select.appendChild(option);

            const option1 = document.createElement('option');
            const valor1 = "Pican 5";
            const num1 = 2;
            option1.id = num1;
            option1.value = num1;
            option1.text = valor1;
            $select.appendChild(option1);

            const option2 = document.createElement('option');
            const valor2 = "Pican 6/ Comen 3";
            const num2 = 3;
            option2.id = num2;
            option2.value = num2;
            option2.text = valor2;
            $select.appendChild(option2);

            const option3 = document.createElement('option');
            const valor3 = "Pican 7";
            const num3 = 4;
            option3.id = num3;
            option3.value = num3;
            option3.text = valor3;
            $select.appendChild(option3);

            const option4 = document.createElement('option');
            const valor4 = "Pican 8/ Comen 4";
            const num4 = 5;
            option4.id = num4;
            option4.value = num4;
            option4.text = valor4;
            $select.appendChild(option4);

            const option5 = document.createElement('option');
            const valor5 = "Pican 9";
            const num5 = 6;
            option5.id = num5;
            option5.value = num5;
            option5.text = valor5;
            $select.appendChild(option5);

            const option6 = document.createElement('option');
            const valor6 = "Pican 10/ Comen 5";
            const num6 = 7;
            option6.id = num6;
            option6.value = num6;
            option6.text = valor6;
            $select.appendChild(option6);

            const option7 = document.createElement('option');
            const valor7 = "Pican mas de 10";
            const num7 = 8;
            option7.id = num7;
            option7.value = num7;
            option7.text = valor7;
            $select.appendChild(option7);
        }
        if (tabla == "Pino"){

            const option = document.createElement('option');
            const valor = "Pican 4/ Comen 2";
            const num = 1;
            option.id = num;
            option.value = num;
            option.text = valor;
            $select.appendChild(option);

            const option1 = document.createElement('option');
            const valor1 = "Pican 5";
            const num1 = 2;
            option1.id = num1;
            option1.value = num1;
            option1.text = valor1;
            $select.appendChild(option1);

            const option2 = document.createElement('option');
            const valor2 = "Pican 6/ Comen 3";
            const num2 = 3;
            option2.id = num2;
            option2.value = num2;
            option2.text = valor2;
            $select.appendChild(option2);

            const option3 = document.createElement('option');
            const valor3 = "Pican 7";
            const num3 = 4;
            option3.id = num3;
            option3.value = num3;
            option3.text = valor3;
            $select.appendChild(option3);

            const option4 = document.createElement('option');
            const valor4 = "Pican 8/ Comen 4";
            const num4 = 5;
            option4.id = num4;
            option4.value = num4;
            option4.text = valor4;
            $select.appendChild(option4); 
        } 
        if(tabla == "Duela"){
            const option = document.createElement('option');
            const valor = "Pican 4/ Comen 2";
            const num = 1;
            option.id = num;
            option.value = num;
            option.text = valor;
            $select.appendChild(option);

            //document.getElementById('personas').selectedIndex = "1";
            //document.getElementById('personas').disabled = true;
        }
        return parseFloat(tablaPrecio)
    }

    function Tabla() {
        let tablas = document.getElementById('tablas');
        let tabla = tablas.options[tablas.selectedIndex].text;
        if (tabla == "Duela" || tabla == "Pino") {
            controlador("personas");
        }
    }

    function verificarTipos() {
        let tipos = document.getElementById('tipos');
        let tiposPrecio = tipos.options[tipos.selectedIndex].id;
        return parseFloat(tiposPrecio)
    }

    function idTipos() {
        let tipos = document.getElementById('tipos');
        let tipo = tipos.options[tipos.selectedIndex].value;
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
        let deliveryPrecio = delivery.options[delivery.selectedIndex].id;
        return parseFloat(deliveryPrecio);
    }

    function verificarAgregado() {
        let agregado = document.getElementById('agregado');
        let agregadoPrecio = agregado.options[agregado.selectedIndex].id;
        return parseFloat(agregadoPrecio);
    }

    function verificarAgregado2() {
        let agregado2 = document.getElementById('agregado2');
        let agregado2Precio = agregado2.options[agregado2.selectedIndex].id;
        return parseFloat(agregado2Precio);
    }

    function verificarAgregado3() {
        let agregado3 = document.getElementById('agregado3');
        let agregado3Precio = agregado3.options[agregado3.selectedIndex].id;
        return parseFloat(agregado3Precio);
    }
    </script>
    <div class="container">
        <div class="section-title">
            <h2><span>Simulador de Pedidos</span></h2>
            <p>Elegí las opciones para simular Pedido.</p>
        </div>
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <form action="" id="form_simulador" class="form-horizontal " method="POST">
                    <!-- select tablas -->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">Elegí el tipo de
                            tabla:</label>
                        <select class="form-control form-control" aria-label="Default select example"
                            name="sim_tipo_tabla[]" id="tablas" onchange="controlador(id);">
                            <option value="">-.Elegir.-</option>
                            <?php
                        $query = "SELECT * FROM `type_picadas`";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $titulo = $row['title'];
                            $precio = $row['in_ars'];
                        ?>
                            <option value='<?php echo $id; ?>' id="<?php echo $precio; ?>"><?php echo $titulo ?>
                            </option>
                            <?php } ?>
                        </select>
                        <p id='precios' style='opacity:0; margin-bottom: 0 !important;'><small>Costo del tipo de tabla:
                                $<label id="lbtabla"></label>.00</small></p>
                    </div>
                    <!-- select tipo de picada -->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">¿Qué tipo de Picada
                            querés?</label>
                        <select class="form-control form-control" aria-label="Default select example"
                            name="sim_tipo_picada[]" id="tipos" onchange="controlador(id);">
                            <option selected id='1' value='0'>Selecciona tipo de picada:</option>
                            <?php
                        $query = "SELECT * FROM `rango_picada`";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $titulo = $row['title'];
                            $precio = $row['in_ars'];
                            $valor_por_persona = $row['valor_por_persona'];
                        ?>
                            <script>
                            valorxper[<?php echo $id; ?>] = <?php echo $valor_por_persona; ?>;
                            </script>
                            <option value='<?php echo $id; ?>' id="<?php echo $precio; ?>"><?php echo $titulo ?>
                            </option>

                            <?php } ?>
                        </select>
                        <p id='tipoPicada' style='opacity:0; margin-bottom: 0 !important;'><small>Costo del tipo de
                                picada: $<label id="lbtipo"></label>.00</small></p>

                    </div>
                    <!-- select Comensales -->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">¿Cuántos
                            comen?</label>
                        <select class="form-control" aria-label="Default select example" name="sim_comensales[]"
                            id="personas" onchange="controlador(id);">
                            <option selected value="0" id="0">Comensales:</option>
                        </select>
                        <p id='comensales' style='opacity:0; margin-bottom: 0 !important;'><small>Costo total de
                                comensales: $<label id="lbpersona"></label>.00</small></p>
                    </div>

                    <!-- Agregados 1-->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">Primer
                            Agregado:</label>
                        <select name="add1[]" id="agregado" aria-label="Default select example"
                            class="form-control form-control" onchange="controlador(id);">
                            <option id="0" value="0">-.Elegir Agregado.-</option>
                            <?php 
                                $query_add2 = $conn -> query ("SELECT * FROM `add2` WHERE q !='0'");
                                while ($add2= mysqli_fetch_array($query_add2)) {  
                                    $id = $add2['id'];
                                    $titulo = $add2['title'];
                                    $precio = $add2['in_ars'];                                   
                                    ?>
                            <option value='<?php echo $id; ?>' id="<?php echo $precio; ?>"> <?php echo $titulo ?>
                            </option>
                            <?php } ?>
                        </select>
                        <p id='costoAgregado' style='opacity:0; margin-bottom: 0 !important;'><small>Costo por el
                                agregado: $<label id="lbagregado"></label>.00</small></p>
                    </div>
                    <!-- Agregados 2-->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">Segundo
                            Agregado:</label>
                        <select name="add2[]" id="agregado2" aria-label="Default select example"
                            class="form-control form-control" onchange="controlador(id);">
                            <option id="0" value="0">-.Elegir Agregado.-</option>
                            <?php 
                                $query_add2 = $conn -> query ("SELECT * FROM `add2` WHERE q !='0'");
                                while ($add2= mysqli_fetch_array($query_add2)) {  
                                    $id = $add2['id'];
                                    $titulo = $add2['title'];
                                    $precio = $add2['in_ars'];                                   
                                    ?>
                            <option value='<?php echo $id; ?>' id="<?php echo $precio; ?>"> <?php echo $titulo ?>
                            </option>
                            <?php } ?>
                        </select>
                        <p id='costoAgregado2' style='opacity:0; margin-bottom: 0 !important;'><small>Costo por el
                                agregado: $<label id="lbagregado2"></label>.00</small></p>
                    </div>
                    <!-- Agregados 3-->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">Tercer
                            Agregado:</label>
                        <select name="add3[]" id="agregado3" aria-label="Default select example"
                            class="form-control form-control" onchange="controlador(id);">
                            <option id="0" value="0">-.Elegir Agregado.-</option>
                            <?php 
                                $query_add2 = $conn -> query ("SELECT * FROM `add2` WHERE q !='0'");
                                while ($add2= mysqli_fetch_array($query_add2)) {  
                                    $id = $add2['id'];
                                    $titulo = $add2['title'];
                                    $precio = $add2['in_ars'];                                   
                                    ?>
                            <option value='<?php echo $id; ?>' id="<?php echo $precio; ?>"> <?php echo $titulo ?>
                            </option>
                            <?php } ?>
                        </select>
                        <p id='costoAgregado3' style='opacity:0; margin-bottom: 0 !important;'><small>Costo por el
                                agregado: $<label id="lbagregado3"></label>.00</small></p>
                    </div>
                    <!-- select Envio o Retiro -->
                    <div class="form-group mb-0">
                        <label style="font-size: smaller; font-weight: 600;" class="control-label">¿Buscas o te la
                            llevamos?</label>
                        <select class="form-control form-control" aria-label="Default select example" name="sim_envio[]"
                            id="delivery" onchange="controlador(id);">
                            <option selected value='0' id="0">Retirar</option>
                            <?php
                        $query = "SELECT * FROM `delivery`";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $titulo = $row['location'];
                            $precio = $row['px_km'];
                        ?>
                            <option value='<?php echo $id; ?>' id="<?php echo $precio; ?>">Envio a <?php echo $titulo ?>
                            </option>
                            <?php } ?>
                        </select>
                        <p id='costoDelivery' style='opacity:0; margin-bottom: 0 !important;'><small>Costo por el envio:
                                $<label id="lbdelivery"></label>.00</small></p>
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" id="send" name="enviar_simulador"
                            style="padding-left: 20%;padding-right: 20%;" class="btn btn-warning">Pedir</button>
                    </div>
                </form>
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
                            <p style="font-size: x-large; font-weight: 700; margin-top: 2rem;">Costo Total del Pedido:
                            </p>
                            <h1 style="color: #ffb03b;font-weight: 600;font-size: 3rem;"> $ <label
                                    id="lbtotal"></label>.00</h1>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Script Redirecciona a los forms de envio o retiro del simulador -->
        <script type="text/javascript">
        document.getElementById('send').addEventListener('click', (e) => {
            e.preventDefault()

            if (document.getElementById('delivery').value == '0')
                form_simulador.setAttribute('action', 'control/forms/forms_retiros_simulador.php')

            if (document.getElementById('delivery').value != '0')
                form_simulador.setAttribute('action', 'control/forms/forms_envios_simulador.php')

            document.getElementById('form_simulador').submit()
        })
        </script>

</section>