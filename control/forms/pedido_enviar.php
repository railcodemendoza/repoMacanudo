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

    <title>Picadas Macanudas :: Sabores que compartimos</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/mg/favicon.png" rel="icon">
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
    <br>
    <br>

    <?php 
if  (isset($_POST['testear_pedido'])) { // me traigo la informacion segun ID seleccionada.

  foreach ($_POST['payment_mode'] as $payment_mode);
  foreach ($_POST['schedule_available'] as $schedule_available);
  $customer = $_POST['customer'];
  $cel_phone = $_POST['cel_phone'];
  $cnee = $_POST['cnee'];
  $cnee_cel_phone = $_POST['cnee_cel_phone'];
  $inscription = $_POST['inscription'];
  $delivery_date = $_POST['delivery_date'];
  $address =  isset($_POST['address']) ? $_POST['address'] : null;
  $nro =  isset($_POST['nro']) ? $_POST['nro'] : null;
  $referencia =  isset($_POST['referencia']) ? $_POST['referencia'] : null;

  // Corroboramos que no sea el mismo dia. 

  $date = date('Y-m-d');
  $alert_date ='';


  if($delivery_date == $date){
    $alert_date = '<p style="text-align:center;">Recordá que hacemos pedidos con 24hs de anticipación.<br>No te preocupes, consultá disponibilidad <a target="_blank" href="https://api.whatsapp.com/send?phone=5492614714206&text=Tendrán%20disponibilidad%20para%20pedir%20una%20'.$product.'%20para%20'.$add1.'%20personas">acá!</a></p>';
  }  
  
  $pedId = $_POST['pedido_id'];
  $trimmedPedId = trim($pedId);
  $url = $urlApi.'/api/general/' . $trimmedPedId;

  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
  ));

  $response = curl_exec($curl);
  curl_close($curl);

  $responseArray = json_decode($response, true);

  if (is_array($responseArray) && isset($responseArray[0]['product'])) {
      $pedidoData = $responseArray[0];
      $tipoPicada = $pedidoData['product'];
      $tipoTabla = $pedidoData['add3'];
      $comensales = $pedidoData['add1'];
      $agregado1 = isset($pedidoData['add2']) ? $pedidoData['add2'] : "Sin Agregado";
      $agregado2 = isset($pedidoData['add4']) ? $pedidoData['add4'] : "Sin Agregado";
      $agregado3 = isset($pedidoData['add5']) ? $pedidoData['add5'] : "Sin Agregado";
      $location = isset($pedidoData['location']) ? $pedidoData['location'] : "Retiro en local";
      $precioFin = $pedidoData['in_ars'];
      $modoEnvio = $pedidoData['type'];
  } else {
      echo "Error al procesar la respuesta de la APIqweqweqweqw.";
  }
}
 ?>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="alert alert-danger alert-dismissible col-sm-12 fade show"
                style="z-index: 1031; margin-top: 12%; position:absolute; width: 92%" role="alert">
                <p style="text-align:center;">
                    <strong>El pedido aún no está completado.</strong>
                </p>
                <p style="text-align:center;">
                    Por favor, revisá los detalles y confirmá para finalizarlo.
                </p>
                <?php echo $alert_date;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <section class="inner-page">
        <div class="container-fluid pt-5 mt-5">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <section class="panel" style="padding-top: 0;">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <h3 style="color:#ffb03b; text-align:center; font-size: xx-large;">Resumen del Pedido
                                </h3>
                                <br>

                                <div class="row">
                                    <div class="col-sm-5 mx-auto">
                                        <h4 style="text-align: center;">Nombre:</h4>
                                        <p style="text-align: center;"><?php echo $customer .' ('.$cel_phone . ') ' ?>
                                        </p>
                                    </div>
                                </div>
                                <hr style="color: blue; max-width: 50%;">
                                <div class="row">
                                    <div class="col-sm-5 mx-auto">
                                        <h4 style="text-align: center;">Receptor:</h4>
                                        <p style="text-align: center;"><?php echo $cnee .' ('.$cnee_cel_phone . ') ' ?>
                                        </p>
                                    </div>
                                </div>
                                <hr style="color: blue; max-width: 50%;">
                                <div class="row">
                                    <div class="col-sm-5 mx-auto">
                                        <h4 style="text-align: center;">Dedicaria:</h4>
                                        <p style="text-align: center;"><?php echo $inscription; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <h3 style="text-align:center;">Datos de entrega:</h3>
                                <br>
                                <div class="col-sm-5 mx-auto" style="text-align: center; color:gray;">
                                    <p> <strong> Fecha:</strong> <?php echo $delivery_date ;?> - <strong>Hora:</strong>
                                        <?php echo $schedule_available ;?> </p>
                                </div>
                                <br>
                                <div class="col-sm-8 mx-auto" style="text-align: center; color:gray;">
                                    <p><strong>Direccion:
                                        </strong><?php echo $address . ' '. $nro. ' ( '. $referencia . ') - '. $location ;?>
                                    </p>
                                </div>
                                <hr>
                                <h3 style="text-align:center;">Datos del Pedido:</h3>
                                <br>
                                <div class="col-sm-5 mx-auto" style="text-align: center;">
                                    <p><strong>Picada: </strong>
                                        <?php echo $tipoPicada . ' - '.$tipoTabla .' para '. $comensales . ' personas';?>
                                    </p>
                                </div>
                                <div class="col-sm-8 mx-auto" style="text-align: center;">
                                    <?php if ($agregado1 !== null): ?>
                                    <p><strong>Agregado:</strong> <?php echo $agregado1; ?> </p>
                                    <?php endif; ?>

                                    <?php if ($agregado2 !== null): ?>
                                    <p><strong>Agregado:</strong> <?php echo $agregado2; ?> </p>
                                    <?php endif; ?>

                                    <?php if ($agregado3 !== null): ?>
                                    <p><strong>Agregado:</strong> <?php echo $agregado3; ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <h3 id="total" style="text-align:center; color:#ffb03b; font-size: 3rem;">
                                $ <?php echo $precioFin; ?></h3>

                            <!--Muestra el total y en total con descuento-->
                            
                            <p style="text-align:center;color:gray; font-size:0.7rem;">a pagar por:
                                <?php echo $payment_mode; ?></p>
                            <form action="../forms/pedido_confirmacion.php" method="POST">
                                <input type="hidden" name="pedido_id" value="<?php echo $pedId;?>">
                                <input type="hidden" name="customer" value="<?php echo $customer;?>">
                                <input type="hidden" name="cel_phone" value="<?php echo $cel_phone;?>">
                                <input type="hidden" name="cnee" value="<?php echo $cnee;?>">
                                <input type="hidden" name="cnee_cel_phone" value="<?php echo $cnee_cel_phone;?>">
                                <input type="hidden" name="inscription" value="<?php echo $inscription;?>">
                                <input type="hidden" name="delivery_date" value="<?php echo $delivery_date;?>">
                                <input type="hidden" name="address" value="<?php echo $address;?>">
                                <input type="hidden" name="nro" value="<?php echo $nro;?>">
                                <input type="hidden" name="referencia" value="<?php echo $referencia;?>">
                                <input type="hidden" name="schedule_available"
                                    value="<?php echo $schedule_available;?>">
                                <input type="hidden" name="payment_mode" value="<?php echo $payment_mode;?>">
                                <div class="col-sm-4 mx-auto" style="text-align: center;"><button type="submit"
                                        name="confirmar" id="confirmar" style="padding-left: 20%;padding-right: 20%;"
                                        class="btn btn-warning">Confirmar</button></div>
                                <br><br>
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
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

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