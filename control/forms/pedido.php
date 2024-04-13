<?php include('../db.php'); ?>
<?php include '../../variables.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180172331-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-180172331-1');
    </script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Picadas Macanudas :: sabores que compartimos</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/mcvendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/mcvendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/mcvendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/mcvendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/mcvendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/mcvendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/mccss/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background: url(../../assets/img/slide/Macanudas-115.jpg);">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php 
   $padding = '';
   $paddinginner = 'mt-2';
              if(isset($_SESSION['message'])){
                if($_SESSION['message'] != false) {
                  $padding= 'pt-0';
                  $paddinginner= 'pt-0';?>

            <div class="alert alert-warning alert-dismissible fade show"
                style="z-index: 1031; margin-top: 7rem; text-align:center;" role="alert">
                <?php echo $_SESSION['message'] ;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php  
                }
            }
                $_SESSION['message'] = false;
            ?>
        </div>
    </div>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-transparent">
        <div class="container text-right">
            <i class="icofont-phone"></i> +54 9 2614 71-4206
            <i class="icofont-clock-time icofont-rotate-180"></i> Lun-Sáb: 10:00 AM - 20:00 PM
        </div>
    </section>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <a href="../../index.php"><img style="width: 25%; margin-left:25%;"
                src="../../assets/img/MCND_Logo_1080_WHITE.png" alt=""></a>
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.php"></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="../../index.php">Inicio</a></li>
                    <li><a href="../../index.php#about">Nosotros</a></li>
                    <li><a href="../../index.php#menu">Picadas</a></li>
                    <li><a href="../../index.php#events">Agregados</a></li>
                    <li><a href="../../index.php#gallery">Galeria</a></li>
                    <li><a href="../../index.php#contact">Contacto</a></li>

                    <!--li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li-->
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <section class="inner-page <?php echo $paddinginner;?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel <?php echo $padding;?>">
                        <br>
                        <header class="panel-heading">
                            <h2 style="color:white; text-align:center;">Formulario del pedido.</h2>
                            <div class="row">
                                <div class="alert alert-warning alert-dismissible col-sm-5 mx-auto fade show"
                                    style="z-index: 1031;" role="alert">
                                    <p class="mb-0" style="text-align: center;">Atención: Tomamos pedidos con <strong>
                                            24hs de anticipación!</strong></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <br>
                        </header>

                        <div class="row">
                            <div class="col-sm-8 mx-auto">
                                <form action="../forms/pedido_datos_personales.php" id="form_simulador" class="form-horizontal " method="POST">
                                    <!-- select tablas -->

                                    <label style=" font-weight: 600;"
                                        class="control-label"> <h4 style="color:white;">Selecciona el tipo de picada:</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="tipoPicadaSelect" name="tipoPicada">
                                        <option value=""> -.Elegir tipo de picada.- </option>
                                    </select>
                                    <p id="precioTipoPicada" class="mt-1" style="color:white;"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label"><h4 style="color:white;">Selecciona el tipo de tabla:</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="tipoTablaSelect"  name="tipoTabla">
                                        <option value="">-.Elegir tipo de tabla.-</option>
                                    </select>
                                    <p id="precioTipoTabla" class="mt-1" style="color:white;"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label"><h4 style="color:white;">Selecciona Cantidad de Comensales:</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="cantidadComensalesSelect" name="cantidadComensales">
                                        <option value="">-.Elegir cantidad de Comensales.-</option>
                                    </select>
                                    <p id="precioComensales" class="mt-1" style="color:white;"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label"><h4 style="color:white;">Selecciona Primer Agregado:</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="primerAgregadoSelect" name="agregado1">
                                        <option value="">-.Elegir Agregado.-</option>
                                    </select>
                                    <p id="precioPrimerAgregado" class="mt-1" style="color:white;"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label"><h4 style="color:white;">Selecciona Segundo Agregado:</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="segundoAgregadoSelect" name="agregado2">
                                        <option value="">-.Elegir Agregado.-</option>
                                    </select>
                                    <p id="precioSegundoAgregado" class="mt-1" style="color:white;"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label"><h4 style="color:white;">Selecciona Tercer Agregado:</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="tercerAgregadoSelect" name="agregado3">
                                        <option value="">-.Elegir Agregado.-</option>
                                    </select>
                                    <p id="precioTercerAgregado" class="mt-1" style="color:white;"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label"><h4 style="color:white;">¿Buscas o te la llevamos?</h4></label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="deliverySelect" name="delivery">
                                        <option value="">-.Elegir.-</option>
                                        <option value="0">Retirar por local</option>
                                    </select>
                                    <p id="precioDelivery" class="mt-1" style="color:white;"></p>
                                    
                                    <h3 style="color:white;" id="precioTotal">Precio Total: $0.00</h3>
                                    <input type="hidden" id="preciofinal" name="preciofinal" value="">

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
                                                    const tipoPicada = result.find(tp => tp.id ==tipoPicadaId);
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
                                                        option.dataset.maxComensales = tipoTabla.maximo_personas; // Nueva línea
                                                        tipoTablaSelect.appendChild(option);
                                                    });
                                                    
    
                                                    // Llamar a actualizarCantidadComensales después de cargar las tablas
                                                    actualizarCantidadComensales(tipoPicada.tipo_tablas[0].maximo_personas);
                                                    actualizarPrecios();
                                                }
                                                // Manejar cambios en el select de tipo de tabla
                                                tipoTablaSelect.addEventListener('change', function () {
                                                        const maxComensales = parseInt(this.options[this.selectedIndex].dataset.maxComensales) || 0;
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
                                                    // Una vez cargados todos los agregados, buscar si la picada tiene algún agregado asociado
                                                    const urlParams = new URLSearchParams(window.location.search);
                                                    const tipopicadaIdFromURL = urlParams.get('id_modal');
                                                    if (tipopicadaIdFromURL) {

                                                        // Realizar la solicitud HTTP GET a la API
                                                        fetch("<?php echo $urlApi;?>/api/tipoPicada/"+tipopicadaIdFromURL, requestOptions)
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                const tipoPicada = data;
                                                                if (tipoPicada && tipoPicada.add2s.length > 0) {
                                                                    // Seleccionar automáticamente los agregados asociados a la picada
                                                                    // Variables para llevar el conteo de los agregados seleccionados
                                                                    let primerAgregadoSeleccionado = false;
                                                                    let segundoAgregadoSeleccionado = false;
                                                                    let tercerAgregadoSeleccionado = false;

                                                                    // Recorrer la lista de agregados de la picada
                                                                    tipoPicada.add2s.forEach(agregado => {
                                                                        // Si todavía no se ha seleccionado el primer agregado, seleccionarlo en el primer select
                                                                        if (!primerAgregadoSeleccionado) {
                                                                            primerAgregadoSelect.value = agregado.id; // Establecer el agregado como seleccionado
                                                                            primerAgregadoSelect.dispatchEvent(new Event('change')); // Disparar evento de cambio
                                                                            primerAgregadoSeleccionado = true; // Actualizar el estado del primer agregado seleccionado
                                                                        }
                                                                        // Si todavía no se ha seleccionado el segundo agregado, seleccionarlo en el segundo select
                                                                        else if (!segundoAgregadoSeleccionado) {
                                                                            segundoAgregadoSelect.value = agregado.id; // Establecer el agregado como seleccionado
                                                                            segundoAgregadoSelect.dispatchEvent(new Event('change')); // Disparar evento de cambio
                                                                            segundoAgregadoSeleccionado = true; // Actualizar el estado del segundo agregado seleccionado
                                                                        }
                                                                        // Si todavía no se ha seleccionado el tercer agregado, seleccionarlo en el tercer select
                                                                        else if (!tercerAgregadoSeleccionado) {
                                                                            tercerAgregadoSelect.value = agregado.id; // Establecer el agregado como seleccionado
                                                                            tercerAgregadoSelect.dispatchEvent(new Event('change')); // Disparar evento de cambio
                                                                            tercerAgregadoSeleccionado = true; // Actualizar el estado del tercer agregado seleccionado
                                                                        }
                                                                    });
                                                                }
                                                            })
                                                            .catch(error => console.error(error));     
                                                    }

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
                                            .options[tipoPicadaSelect.selectedIndex].dataset.valorPorPersona)|| 0;
                                            const delivery = parseFloat(deliverySelect
                                            .options[deliverySelect.selectedIndex].dataset.precio)|| 0;

                                            const precioTotalTipoPicada = precioTipoPicada;
                                            const precioTotalTipoTabla = precioTipoTabla;
                                            const precioTotalComensales = (cantidadComensales - 4) *
                                            valorPorPersona;

                                            precioTipoPicadaElement.textContent =
                                                `Tipo Picada: $${precioTotalTipoPicada.toFixed(2)}`;
                                            precioTipoTablaElement.textContent =
                                                `Tipo Tabla: $${precioTotalTipoTabla.toFixed(2)}`;
                                            precioComensalesElement.textContent =
                                                `por Comensales: $${precioTotalComensales.toFixed(2)}`;

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
                                            precioPrimerAgregado + precioSegundoAgregado + precioTercerAgregado+ delivery;
                                            precioTotalElement.textContent =
                                                `Total: $${precioTotalConAgregados.toFixed(2)}`;
                                                precioFinalElement.value = precioTotalConAgregados;
                                        }
                                        cargarAgregadosYActualizarPrecios();
                                        cargardeliveryYActualizarPrecios();
                                    });
                                    </script>

                                    <br>
                                    <div class="col-sm-4 mx-auto" style="text-align: center;">
                                        <button type="submit" name="enviar_pedido" id="enviar_pedido"style="padding-left: 20%;padding-right: 20%;"
                                        class="btn btn-warning">Pedir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    </main><!-- End #main -->
    </div>
    </section>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <a href="index.php"><img style="width: 25%;" src="../../assets/img/MCND_Logo_1080_WHITE.png" alt=""></a>
            <div class="social-links">
                <a href="https://api.whatsapp.com/send?phone=542614714206&text=Hola,%20te%20contacto%20desde%20la%20Página"
                    class="twitter"><i class="bx bxl-whatsapp"></i></a>
                <a href="https://www.facebook.com/picadasmacanudas" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/picadasmacanudas" class="instagram"><i
                        class="bx bxl-instagram"></i></a>

            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Picadas Macanudas</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href=""> BUILD.IT </a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/mcvendor/jquery/jquery.min.js"></script>
    <script src="../assets/mcvendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/mcvendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/mcvendor/php-email-form/validate.js"></script>
    <script src="../assets/mcvendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../assets/mcvendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/mcvendor/venobox/venobox.min.js"></script>
    <script src="../assets/mcvendor/owl.carousel/owl.carousel.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/mcjs/main.js"></script>

</body>

</html>