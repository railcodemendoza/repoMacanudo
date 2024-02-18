<?php include('../db.php'); ?>
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
                                <form action="" id="form_simulador" class="form-horizontal " method="POST">
                                    <!-- select tablas -->
                                    <p id="precioTotal">Precio Total: $0.00</p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label">Selecciona el tipo de picada:</label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="tipoPicadaSelect">
                                        <option value="">-.Elegir.-</option>
                                    </select>
                                    <p id="precioTipoPicada"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label">Selecciona el tipo de tabla:</label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="tipoTablaSelect">
                                        <option value="">-.Elegir.-</option>
                                    </select>
                                    <p id="precioTipoTabla"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label">Selecciona Cantidad de Comensales:</label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="cantidadComensalesSelect">
                                        <option value="">-.Elegir.-</option>
                                    </select>
                                    <p id="precioComensales"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label">Selecciona Primer Agregado:</label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="primerAgregadoSelect">
                                        <option value="">-.Elegir Agregado.-</option>
                                    </select>
                                    <p id="precioPrimerAgregado"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label">Selecciona Segundo Agregado:</label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="segundoAgregadoSelect">
                                        <option value="">-.Elegir Agregado.-</option>
                                    </select>
                                    <p id="precioSegundoAgregado"></p>

                                    <label style="font-size: smaller; font-weight: 600;"
                                        class="control-label">Selecciona Tercer Agregado:</label>
                                    <select class="form-control form-control" aria-label="Default select example"
                                        id="tercerAgregadoSelect">
                                        <option value="">-.Elegir Agregado.-</option>
                                    </select>
                                    <p id="precioTercerAgregado"></p>

                                    <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tipoPicadaSelect = document.getElementById('tipoPicadaSelect');
                                        const tipoTablaSelect = document.getElementById('tipoTablaSelect');
                                        const cantidadComensalesSelect = document.getElementById(
                                            'cantidadComensalesSelect');
                                        const precioTipoPicadaElement = document.getElementById(
                                            'precioTipoPicada');
                                        const precioTipoTablaElement = document.getElementById(
                                            'precioTipoTabla');
                                        const precioComensalesElement = document.getElementById(
                                            'precioComensales');
                                        const precioTotalElement = document.getElementById('precioTotal');

                                        const primerAgregadoSelect = document.getElementById(
                                            'primerAgregadoSelect');
                                        const segundoAgregadoSelect = document.getElementById(
                                            'segundoAgregadoSelect');
                                        const tercerAgregadoSelect = document.getElementById(
                                            'tercerAgregadoSelect');
                                        const precioPrimerAgregadoElement = document.getElementById(
                                            'precioPrimerAgregado');
                                        const precioSegundoAgregadoElement = document.getElementById(
                                            'precioSegundoAgregado');
                                        const precioTercerAgregadoElement = document.getElementById(
                                            'precioTercerAgregado');

                                        // Manejar cambios en los select de agregados
                                        primerAgregadoSelect.addEventListener('change', actualizarPrecios);
                                        segundoAgregadoSelect.addEventListener('change', actualizarPrecios);
                                        tercerAgregadoSelect.addEventListener('change', actualizarPrecios);

                                        // Realizar la solicitud HTTP a la API
                                        const requestOptions = {
                                            method: "GET",
                                            redirect: "follow"
                                        };

                                        fetch("http://127.0.0.1:8000/api/tipoPicadaActivas", requestOptions)
                                            .then(response => response.json())
                                            .then(result => {
                                                // Llenar el select de tipo de picada
                                                result.forEach(tipoPicada => {
                                                    const option = document.createElement('option');
                                                    option.value = tipoPicada.id;
                                                    option.textContent = tipoPicada.tipo;
                                                    option.dataset.precio = tipoPicada.in_ars;
                                                    tipoPicadaSelect.appendChild(option);
                                                });

                                                // Manejar cambios en el select de tipo de picada
                                                tipoPicadaSelect.addEventListener('change', function() {
                                                    const tipoPicadaId = this.value;
                                                    const tipoPicada = result.find(tp => tp.id ==
                                                        tipoPicadaId);
                                                    cargarTipoTablaYComensales(tipoPicada);
                                                });

                                                // Manejar cambios en el select de tipo de tabla
                                                tipoTablaSelect.addEventListener('change',
                                                    actualizarPrecios);

                                                // Manejar cambios en el select de cantidad de comensales
                                                cantidadComensalesSelect.addEventListener('change',
                                                    actualizarPrecios);

                                                function cargarTipoTablaYComensales(tipoPicada) {
                                                    tipoTablaSelect.innerHTML = "";
                                                    tipoPicada.tipo_tablas.forEach(tipoTabla => {
                                                        const option = document.createElement(
                                                            'option');
                                                        option.value = tipoTabla.id;
                                                        option.textContent = tipoTabla.tipo;
                                                        option.dataset.precio = tipoTabla.in_ars;
                                                        tipoTablaSelect.appendChild(option);
                                                    });

                                                    cantidadComensalesSelect.innerHTML = "";
                                                    for (let i = 4; i <= tipoPicada.maximo_personas; i++) {
                                                        const option = document.createElement('option');
                                                        option.value = i;
                                                        option.textContent = i + ' personas';
                                                        cantidadComensalesSelect.appendChild(option);
                                                    }

                                                    actualizarPrecios();
                                                }

                                                
                                            }).catch(error => console.error(error));

                                        // Función para cargar los datos de los agregados y actualizar precios
                                        function cargarAgregadosYActualizarPrecios() {
                                            fetch("http://127.0.0.1:8000/api/agregado", requestOptions)
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

                                        function actualizarPrecios() {
                                                    const precioTipoPicada = parseFloat(tipoPicadaSelect
                                                        .options[tipoPicadaSelect.selectedIndex].dataset
                                                        .precio) || 0;
                                                    const precioTipoTabla = parseFloat(tipoTablaSelect
                                                        .options[tipoTablaSelect.selectedIndex].dataset
                                                        .precio) || 0;
                                                    const cantidadComensales = parseInt(
                                                        cantidadComensalesSelect.value) || 0;

                                                    const precioTotalTipoPicada = precioTipoPicada;
                                                    const precioTotalTipoTabla = precioTipoTabla;
                                                    const precioTotalComensales = (cantidadComensales - 4) *
                                                        10;

                                                    precioTipoPicadaElement.textContent =
                                                        `Precio Tipo Picada: $${precioTotalTipoPicada.toFixed(2)}`;
                                                    precioTipoTablaElement.textContent =
                                                        `Precio Tipo Tabla: $${precioTotalTipoTabla.toFixed(2)}`;
                                                    precioComensalesElement.textContent =
                                                        `Precio por Comensales: $${precioTotalComensales.toFixed(2)}`;

                                                    // Calcular y mostrar el precio total sin los agregados
                                                    const precioTotalSinAgregados = precioTotalTipoPicada +
                                                        precioTotalTipoTabla + precioTotalComensales;
                                                    precioTotalElement.textContent =
                                                        `Precio Total sin Agregados: $${precioTotalSinAgregados.toFixed(2)}`;

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
                                                        `Precio Primer Agregado: $${precioPrimerAgregado.toFixed(2)}`;
                                                    precioSegundoAgregadoElement.textContent =
                                                        `Precio Segundo Agregado: $${precioSegundoAgregado.toFixed(2)}`;
                                                    precioTercerAgregadoElement.textContent =
                                                        `Precio Tercer Agregado: $${precioTercerAgregado.toFixed(2)}`;

                                                    // Calcular y mostrar el precio total con los agregados
                                                    const precioTotalConAgregados =
                                                        precioTotalSinAgregados + precioPrimerAgregado +
                                                        precioSegundoAgregado + precioTercerAgregado;
                                                    precioTotalElement.textContent =
                                                        `Precio Total con Agregados: $${precioTotalConAgregados.toFixed(2)}`;
                                                }

                                        cargarAgregadosYActualizarPrecios();
                                    });
                                    </script>

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