<?php  include('../control/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Picadas Macanudas :: Encuesta de Satisfacción</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../control/assets/mg/favicon.png" rel="icon">
    <link href="../control/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../control/assets/mcvendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../control/assets/mcvendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../control/assets/mcvendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../control/assets/mcvendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../control/assets/mcvendor/venobox/venobox.css" rel="stylesheet">
    <link href="../control/assets/mcvendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../control/assets/mccss/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php

    $id = $_GET['id'];

    $query_datos = "SELECT * FROM `general` WHERE id = '$id'";
    $result_datos = mysqli_query($conn, $query_datos);
    
    if (mysqli_num_rows($result_datos) == 1) {
    
        $row = mysqli_fetch_array($result_datos);
        
        $customer = $row['customer'];
        $product = $row['product'];
        $add2 = $row['add2'];
        $cnee = $row['cnee'];
    
      }

?>

<body style="background: url(../assets/img/slide/Macanudas-115.jpg);">
    <div class="container mt-5">
        <div class="jumbotron jumbotron-fluid pb-1" style="background: transparent;">
            <div class="container ">
                <div class="col-sm-4 mx-auto">
                    <img src="../assets/img/MCND_Logo_1080_WHITE.png" alt="picadas mendoza" class="img-fluid">
                </div>
                <h1 class="display-4" style="text-align: center; color:white">Tu opinión nos ayuda a mejorar!</h1>
                <div class="col-sm-8 mx-auto">
                    <p class="lead" style="text-align: center; color:wheat; font-size: unset;">Esperamos que hayas
                        disfrutado de un buen momento con
                        nuetras <br> <strong>Picadas Macanudas</strong>. <br>
                        A continuación te dejamos una encuesta para que nos dejes tu opinion.
                    </p>
                </div>
            </div>
        </div>
        <div class="card" style="background: url(../assets/img/slide/tabla.jpg);border-radius: 3%; margin: 5%;">
            <div class="card-body">
                <form action="enviar_encuesta.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <p style="text-align: center; margin-bottom: auto;">Que te parecio nuestra Atencion
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-10  mx-auto p-0" style="text-align: center;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="atencion" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="atencion" id="inlineRadio2"
                                    value="2">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="atencion" id="inlineRadio2"
                                    value="3">
                                <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="atencion" id="inlineRadio2"
                                    value="4">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="atencion" id="inlineRadio2"
                                    value="5">
                                <label class="form-check-label" for="inlineRadio2"><i
                                        class="fa fa-thumbs-o-up"></i>5</label>
                            </div>
                            <hr style="width: 50%; height: 0.3px; background: #0000006b;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <p style="text-align: center; margin-bottom: auto;">Que te parecio nuestra Piacada
                                <strong><?php echo $product; ?></strong>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-10  mx-auto p-0" style="text-align: center;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="producto" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="producto" id="inlineRadio2"
                                    value="2">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="producto" id="inlineRadio2"
                                    value="3">
                                <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="producto" id="inlineRadio2"
                                    value="4">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="producto" id="inlineRadio2"
                                    value="5">
                                <label class="form-check-label" for="inlineRadio2"><i
                                        class="fa fa-thumbs-o-up"></i>5</label>
                            </div>
                            <hr style="width: 50%; height: 0.3px; background: #0000006b;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <p style="text-align: center;     margin-bottom: auto;">Que te parecio nuestro agregado
                                <strong><?php echo $add2; ?></strong>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-10  mx-auto p-0" style="text-align: center;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="add2" id="agregados"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="add2" id="agregados"
                                    value="2">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="add2" id="agregados"
                                    value="3">
                                <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="add2" id="agregados"
                                    value="4">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="add2" id="agregados"
                                    value="5">
                                <label class="form-check-label" for="inlineRadio2"><i
                                        class="fa fa-thumbs-o-up"></i>5</label>
                            </div>
                            <hr style="width: 50%; height: 0.3px; background: #0000006b;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <p style="text-align: center;">Que te parecio el servicio de envíos
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-10 mx-auto" style="text-align: center;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="envios" id="envios"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="envios" id="envios"
                                    value="2">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="envios" id="envios"
                                    value="3">
                                <label class="form-check-label" for="inlineRadio2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="envios" id="envios"
                                    value="4">
                                <label class="form-check-label" for="inlineRadio2">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input ml-4" type="radio" name="envios" id="envios"
                                    value="5">
                                <label class="form-check-label" for="inlineRadio2"><i
                                        class="fa fa-thumbs-o-up"></i>5</label>
                            </div>
                            <hr style="width: 50%; height: 0.3px; background: #0000006b;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
                            <p style="text-align: center;">Algo no te gustó que nos quieras decir:</strong>
                            </p>
                            <textarea class="form-control" name="sugerencias" placeholder="Comertario..." id="encuesta"
                                cols="30" rows="10"
                                style="background-color: #ffffff1f; color: white;border-color: gray;"></textarea>
                            <br>
                            <p style="text-align: center;">Nos queres dejar un comentario para nuestra página:</strong>
                                <textarea class="form-control mt-2" name="comentario_pagina" placeholder="Comertario..."
                                    id="" cols="30" rows="10"
                                    style="background-color: #ffffff1f; color: white;border-color: gray;"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <button type="submit" name="encuesta" class="btn btn-warning col-sm-2 mx-auto">Enviar</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-4 mx-auto">
                        <hr>
                        <p style="text-align: center;"><small>¡Muchas Gracias por tu Opinión!</small></p>

                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <a href="index.php"><img style="width: 25%;" src="assets/img/MCND_Logo_1080_WHITE.png" alt=""></a>
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
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> & <a href="">BUILDIT</a>
            </div>
        </div>
    </footer><!-- End Footer -->
    <a href="https://api.whatsapp.com/send?phone=542614714206" target="_blank" style="color:#433f39; text-align:center;"
        class="whatsapp"><i class="bx bxl-whatsapp"></i>Contactanos!</a>
    <!--a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a-->

    <!-- Vendor JS Files -->
    <script src="../control/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../control/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../control/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../control/assets/vendor/php-email-form/validate.js"></script>
    <script src="../control/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../control/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../control/assets/vendor/venobox/venobox.min.js"></script>
    <script src="../control/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>