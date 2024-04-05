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
                        <?php 
                            //Llamada a la Api para generar al pedido
                            if (isset($_POST['enviar_pedido'])) {
                                echo '<script>var precioFinal = ' . json_encode($_POST['preciofinal']) . ';</script>';
                                $tipoPicada = $_POST['tipoPicada'];
                                $tipoTabla = $_POST['tipoTabla'];
                                $cantidadComensales = $_POST['cantidadComensales'];
                                $agregado1 = $_POST['agregado1'];
                                $agregado2 = $_POST['agregado2'];
                                $agregado3 = $_POST['agregado3'];
                                $delivery = $_POST['delivery'];
                                $precioTotal = $_POST['preciofinal'];
                                
                                $curl = curl_init();
                        
                                // Configurar la solicitud cURL
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => $urlApi.'/api/general',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS => array(
                                        'tipoPicada' => $tipoPicada,
                                        'tipoTabla' => $tipoTabla,
                                        'cantidadComensales' => $cantidadComensales,
                                        'delivery' => $delivery,
                                        'precioTotal' => $precioTotal,
                                        'agregado1' => $agregado1,
                                        'agregado2' => $agregado2,
                                        'agregado3' => $agregado3,
                                    ),
                                ));
                                $response = curl_exec($curl);
                            
                                curl_close($curl);
                                //echo $response;
                                $responseArray = json_decode($response, true);

                                if (isset($responseArray['pedido'])) {
                                    $pedidoData = $responseArray['pedido'];
                                    $tipoPicada = $pedidoData['product'];
                                    $pedidoId = $pedidoData['id'];
                                    $tipoTabla = $pedidoData['add3'];
                                    $comensales = $pedidoData['add1'];
                                    $agregado1 = isset($pedidoData['add2']) ? $pedidoData['add2'] : "Sin Agregado";
                                    $agregado2 = isset($pedidoData['add4']) ? $pedidoData['add4'] : "Sin Agregado";
                                    $agregado3 = isset($pedidoData['add5']) ? $pedidoData['add5'] : "Sin Agregado";
                                    $location = isset($pedidoData['location']) ? $pedidoData['location'] : "Retiro en local";
                                    $precioFin = $pedidoData['in_ars'];
                                    $modoEnvio = $pedidoData['type'];
                                } else {
                                    echo "Error al procesar la respuesta de la API.";
                                }
                            }
                        ?>
                        <script>
                        const precioFinalElement = document.getElementById('preciofinal');
                        document.addEventListener("DOMContentLoaded", function() {
                            // Realizar la solicitud HTTP a la API
                            const requestOptions = {
                                method: "GET",
                                redirect: "follow"
                            };
                            fetch("<?php echo $urlApi;?>/api/codigoPromocion", requestOptions)
                                .then(response => response.json())
                                .then(codigosPromocion => {
                                    // Aquí tienes la lista de códigos de la API
                                    //console.log("Códigos de promoción obtenidos:", codigosPromocion);

                                    function compararCupon() {
                                        var cup = document.getElementById('cupon').value;
                                        var cuponEncontrado = false;
                                        for (var i = 0; i < codigosPromocion.length; i++) {
                                            if (cup === codigosPromocion[i].codigo) {
                                                cuponEncontrado = true;
                                                if (codigosPromocion[i].activo === 1) {
                                                    document.getElementById("prueba").innerHTML =
                                                        "Tu cupon " + codigosPromocion[i].codigo +
                                                        " es correcto y vale por un " + codigosPromocion[i]
                                                        .descuento + "% de descuento";

                                                    // Utiliza la variable JavaScript precioFinal en lugar de $_POST['preciofinal']
                                                    var precioFinalConDescuento = precioFinal * (1 - (
                                                        codigosPromocion[i].descuento / 100));
                                                    //console.log(precioFinalConDescuento);
                                                    // Actualiza el contenido del elemento que muestra el Precio Total
                                                    document.getElementById("precioTotalDisplay")
                                                        .innerHTML = "<strong>Precio Total:</strong> $" +
                                                        precioFinalConDescuento;
                                                } else {

                                                    document.getElementById("precioTotalDisplay")
                                                        .innerHTML = "<strong>Precio Total:</strong> $" +
                                                        precioFinal;
                                                    document.getElementById("prueba").innerHTML =
                                                        "Tu cupon " + codigosPromocion[i].codigo +
                                                        " es correcto pero ya no está activo";
                                                }
                                                break;
                                            } else {
                                                document.getElementById("precioTotalDisplay")
                                                    .innerHTML = "<strong>Precio Total:</strong> $" +
                                                    precioFinal;
                                                document.getElementById("prueba").innerHTML =
                                                    "Tu cupon " + codigosPromocion[i].codigo +
                                                    " es incorrecto ";
                                            }
                                        }
                                        if (!cuponEncontrado) {
                                            document.getElementById("prueba").innerHTML =
                                                "No se ha encontrado el cupon " + cup;
                                        }
                                    }
                                    // Asigna la función al evento click del botón
                                    document.getElementById("confirmar").addEventListener("click",
                                        compararCupon);
                                })
                                .catch(error => console.error(error));

                                // Realizar una llamada a la API para obtener los horarios de entrega
                                fetch("<?php echo $urlApi;?>/api/showDelivery/<?php echo $modoEnvio;?>", requestOptions)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Obtener el elemento select
                                        const selectElement = document.getElementById('horariosEntrega');

                                        // Limpiar cualquier opción existente en el select
                                        selectElement.innerHTML = '<option value="">-.elegir horario.-</option>';

                                        // Agregar las nuevas opciones al select basadas en los datos obtenidos de la API
                                        data.forEach(schedule => {
                                            const option = document.createElement('option');
                                            option.value = schedule.horario; // Asigna el valor adecuado según la respuesta de la API
                                            option.text = schedule.horario; // Asigna el texto adecuado según la respuesta de la API
                                            selectElement.add(option);
                                        });
                                    })
                                    .catch(error => console.error('Error al obtener los horarios:', error));

                                // Realizar una llamada a la API para obtener los horarios de entrega
                                fetch("<?php echo $urlApi;?>/api/metodoPago", requestOptions)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Obtener el elemento select
                                        const selectElement = document.getElementById('metodosPago');

                                        // Limpiar cualquier opción existente en el select
                                        selectElement.innerHTML = '<option value="">-.Elige medio de Pago.-</option>';

                                        // Agregar las nuevas opciones al select basadas en los datos obtenidos de la API
                                        data.forEach(schedule => {
                                            const option = document.createElement('option');
                                            option.value = schedule.modo_de_pago; // Asigna el valor adecuado según la respuesta de la API
                                            option.text = schedule.modo_de_pago; // Asigna el texto adecuado según la respuesta de la API
                                            selectElement.add(option);
                                        });
                                    })
                                    .catch(error => console.error('Error al obtener los horarios:', error));
                        });
                        </script>
                        <br>
                        <br>
                        <div style="text-align:center;" class="panel-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7 pato" style="background-color: rgba(0, 0, 0, 0.5); color: orange; border-radius:10px">
                                    <h3 style="text-align: center; color:#ffb03b; margin-top:2rem;">Resumen del pedido: </h3>
                                    <div class="row">
                                    <div class="col-sm-4">
                                    <p><strong>Tipo de Picada: </strong> <h4><span style="color: white;"><?php echo $tipoPicada ; ?></span></h4></p>
                                </div>
                                        <div class="col-sm-4">
                                            <p><strong>Tipo de Tabla: </strong><h4><span style="color: white;"> <?php echo $tipoTabla; ?></span></h4></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><strong>Cantidad de Comensales: </strong><h4><span style="color: white;"> <?php echo $comensales ; ?></span></h4></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p><strong>Agregado 1: </strong><h4><span style="color: white;"> <?php echo $agregado1; ?></span></h4></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><strong>Agregado 2: </strong><h4><span style="color: white;"> <?php echo $agregado2; ?></span></h4></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><strong>Agregado 3: </strong><h4><span style="color: white;"> <?php echo $agregado3; ?></span></h4></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p><strong>Delivery: </strong><h4><span style="color: white;"> <?php echo $location; ?></span></h4></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p id="precioTotalDisplay" style="margin-bottom:1rem;"><strong>Precio Total: </strong><h4><span style="color: white;"> $<?php echo $precioTotal; ?></span></h4></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <label style="color:white;" class="col-sm-10 control-label">Código de
                                        promoción</label>
                                    <div class="col-sm-10  mx-auto">
                                        <input type="text" id="cupon" name="cupon" placeholder="Inserte"
                                            class="form-control">
                                    </div>
                                    <p style="color:gray;" id="prueba"></p>
                                    <div class="col-sm-8 mx-auto" style="text-align: center;">
                                        <button type="submit" name="confirmar_codigo" id="confirmar"
                                            style="padding-left: 20%;padding-right: 20%;" class="btn btn-warning"
                                            onclick="compararCupon()">Confirmar Cupon</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <header class="panel-heading">
                                <h2 style="color:white; text-align:center; color: orange;">Formulario de Datos Personales.</h2>
                                <div class="row">
                                    <div class="alert alert-warning alert-dismissible col-sm-5 mx-auto fade show"
                                        style="z-index: 1031;" role="alert">
                                        <p class="mb-0" style="text-align: center;">Atención: Tomamos pedidos con
                                            <strong>
                                                24hs de anticipación!</strong>
                                        </p>
                                        <p class="mb-0" style="text-align: center;">De Lunes a Sábado. Domingos solo con
                                            Retiro.</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                            </header>
                            <form action="../forms/pedido_enviar.php" class="form-horizontal " method="POST">
                                <input type="hidden" id="pedido_id" name="pedido_id" value=" <?php echo $pedidoId; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div style="margin-top:2%;" class="form-group">
                                            <label style="color:white;" class="col-sm-7 control-label"><h3 style="color:white;">Nombre y
                                                Apellido que encarga</h3></label>
                                            <div class="col-sm-10 mx-auto">
                                                <input type="text" name="customer" placeholder="Alberto Acosta"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:white;" class="col-sm-6 control-label"> <h3 style="color:white;">Celular de
                                                quién
                                                encarga</h3></label>
                                            <div class="col-sm-10 mx-auto">
                                                <input type="phone" name="cel_phone" placeholder="2612128195"
                                                    minlength="10" maxlength="15" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div style="margin-top:2%;" class="form-group">
                                            <label style="color:white;" class="col-sm-6 control-label"> <h3 style="color:white;">Nombre y
                                                Apellido Recibe</h3></label>
                                            <div class="col-sm-10 mx-auto">
                                                <input type="text" name="cnee" placeholder="Bernardo Romeo"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:white;" class="col-sm-6 control-label"> <h3 style="color:white;">Celular de
                                                quién
                                                recibe</h3></label>
                                            <div class="col-sm-10 mx-auto">
                                                <input type="phone" name="cnee_cel_phone" placeholder="2613569823"
                                                    minlength="10" maxlength="15" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="color:white;" class="col-sm-3 control-label"> <h3 style="color:white;">Dedicatoria</h3></label>
                                    <div class="col-sm-5 mx-auto">
                                        <textarea name="inscription" placeholder="con cariño Cacho..."
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <h3 style="text-align: center; color:#ffb03b;">Datos de entrega:
                                        </h3>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label style="color:white;" class="col-sm-4 control-label"> <h3 style="color:white;">Fecha de
                                                Entrega:</h3></label>
                                            <div class="col-sm-10 mx-auto">
                                                <input name="delivery_date" type="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                    <div class="form-group">
                                        <label style="color:white;" class="col-sm-5 control-label">Horario de Entrega:</label>
                                        <div class="col-sm-10 mx-auto">
                                            <select name="schedule_available[]" id="horariosEntrega" class="form-control" required>
                                                <option value="">-.elegir horario.-</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <?php if ($modoEnvio !== 'con_retiro') : ?>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label style="color:white;" class="col-sm-3 control-label"><h3 style="color:white;">Dirección</h3></label>
                                            <div class="row d-flex justify-content-center">
                                                <input type="text" name="address" placeholder="Cañadita Alegre, 554"
                                                    class="form-control col-sm-6 mb-3 ml-4 mr-4" required>
                                                <br>
                                                <input type="text" name="nro" placeholder="Piso - Dpto"
                                                    class="form-control col-sm-3 ml-4 mr-4">
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($modoEnvio !== 'con_retiro') : ?>
                                <div class="form-group">
                                    <label style="color:white;" class="col-sm-4 control-label"><h3 style="color:white;">Aclaración respecto al
                                        Domicilio:</h3></label>
                                    <div class="col-sm-5 mx-auto">
                                        <input type="text" name="referencia" class="form-control" placeholder="Porton negro con rejas...">
                                        <small style="color:white; text-shadow: black 0.1em 0.1em 0.2em;"
                                            class="help-block">Ej: Porton Negro al lado de la verduleria.</small>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <br>
                                <div class="form-group">
                                    <label style="color:white;" class="col-sm-3 control-label"><h3 style="color:white;">Forma de
                                        Pago</h3></label>
                                    <div class="col-sm-5 mx-auto">
                                        <select name="payment_mode[]" id="metodosPago" class="form-control form-control"
                                            required>
                                            <option value="">-.Elige medio de Pago.-</option>
                                            
                                        </select>
                                        <small style="color:white; text-shadow: black 0.1em 0.1em 0.2em;"
                                            class="help-block">Pagar con Mercado Pago tiene un
                                            costo extra de 6% + IVA</small>
                                    </div>
                                </div>
                                <div class="col-sm-4 mx-auto" style="text-align: center;">
                                        <button type="submit" name="testear_pedido" id="testear_pedido" style="padding-left: 20%;padding-right: 20%;"
                                        class="btn btn-warning">Pedir</button>
                                </div>
                            </form>
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
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href=""> PMN Design </a>
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
    <script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    </script>

    <!-- Template Main JS File -->
    <script src="../assets/mcjs/main.js"></script>

</body>

</html>