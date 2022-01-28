 
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

     <title>Picadas Macanudas :: Enamorados</title>
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

             <div class="alert alert-warning alert-dismissible fade show" style="z-index: 1031; margin-top: 7rem;"
                 role="alert">
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
             <i class="icofont-phone"></i> +54 9 2613 40-5502
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
                        <div class="container">
                            <div class="card">
                                <div class="row p-4">
                                    <div class="col-lg-6 text-center">
                                        <img src="../../assets/img/diadelosenamorados.jpeg" alt=""
                                             style="height: 20rem;" class="img-fluid">
                                    </div>
                                    <div class="col-lg-6 pt-4" style="text-align: center;">
                                        <h2>Enamorados</h2>
                                        <p>
                                             - Tabla Felini o Picasso (comen 2 personas)<br>
                                             - Tabla de Madera edición especial<br>
                                             - 2 Copas de Vino con nuestro logo <br>
                                             - Pan casero<br>
                                             - 2 salsas<br>
                                             - Vino Pacto Malbec<br>
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="text-warning" style="text-align: center; margin-bottom: 0;">
                                                     $ 2200,00</h3>
                                                <p style="text-align: center;"><small>Picada Fellini (no incluye
                                                         envio)</small></p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h3 class="text-warning" style="text-align: center; margin-bottom: 0;">
                                                     $ 2600,00</h3>
                                                <p style="text-align: center;"><small>Picada Fellini (no incluye
                                                         envio)</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="text-align:center;" class="panel-body">
                                <form action="../forms/confirmacion_promo.php" method="PUT" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-lg-5 mx-auto">
                                            <select name="product[]" id="" class="form-control" required>
                                                <option style="text-align: center;" value="">-.Elegir Opcion.-</option>
                                                <option value="felini">Picada Fellini</option>
                                                <option value="picaso">Picada Picasso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div style="margin-top:2%;" class="form-group">
                                                <label style="color:white;" class="col-sm-6 control-label">Nombre y
                                                    Apellido que encarga</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <input type="text" name="customer" placeholder="Alberto Acosta"
                                                        class="form-control" require>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label style="color:white;" class="col-sm-6 control-label">Celular de
                                                    quién encarga</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <input type="phone" name="cel_phone" minlength="10" maxlength="15"
                                                        placeholder="2612128195" class="form-control" require>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div style="margin-top:2%;" class="form-group">
                                                <label style="color:white;" class="col-sm-6 control-label">Nombre y
                                                    Apellido Recibe</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <input type="text" name="cnee" placeholder="Estella Maris"
                                                        class="form-control" require>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label style="color:white;" class="col-sm-6 control-label">Celular de
                                                    quién
                                                    recibe</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <input type="phone" name="cnee_cel_phone" minlength="10"
                                                        maxlength="15" placeholder="2613569823" class="form-control"
                                                        require>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:white;" class="col-sm-3 control-label">Dedicatoria:</label>
                                        <div class="col-sm-5 mx-auto">
                                            <textarea name="inscription" placeholder="Contenido de la dedicatoria"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <h3 style="text-align: center; color:#ffb03b;">Datos de entrega:</h3>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label style="color:white;" class="col-sm-4 control-label">F. de
                                                    Entrega:</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <input name="delivery_date" type="date" class="form-control"
                                                        require>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label style="color:white;" class="col-sm-5 control-label">Horario de
                                                    Entrega:</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <select name="schedule_available[]" id="selectSm"
                                                        class="form-control form-control" require>
                                                        <option value="">-.elegir horaio.-</option>
                                                        <?php
                                                            $query_schedule_available = $conn -> query ("SELECT * FROM `delivery_hour` WHERE delivery = 'con_envio'");
                                                            while ($schedule_available= mysqli_fetch_array($query_schedule_available)) {                                           
                                                            echo '<option value="'.$schedule_available['hour_delivery'].'">'.$schedule_available['hour_delivery'].'</option>';
                                                            }  
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label style="color:white;"
                                                    class="col-sm-3 control-label">Dirección:</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <input type="text" name="address"
                                                        placeholder="Cañadita Alegre, 554 Piso 5 Depto. 1"
                                                        class="form-control" require>
                                                    <small style="color:white; text-shadow: black 0.1em 0.1em 0.2em;"
                                                        class="help-block">por favor informar piso y
                                                        departamento.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label style="color:white;"
                                                    class="col-sm-3 control-label">Localidad:</label>
                                                <div class="col-sm-10 mx-auto">
                                                    <select name="location[]" id="selectSm"
                                                        class="form-control form-control" require>
                                                        <option value="">-. Elegir localidad.-</option>
                                                        <option value="sinEntrega">Retiro por Sucursal</option>
                                                        <?php
                                                            $query_location = $conn -> query ("SELECT * FROM `delivery`");
                                                            while ($location = mysqli_fetch_array($query_location)) {                                           
                                                            echo '<option value="'.$location['location'].'">'.$location['location']. '</option>';
                                                        }  
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="color:white;" class="col-sm-4 control-label">Aclaración respecto al Domicilio:</label>
                                        <div class="col-sm-5 mx-auto">
                                            <input type="text" name="referencia" placeholder="Al lado de la Farmacia"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label style="color:white;" class="col-sm-3 control-label" require>Forma de Pago</label>
                                        <div class="col-sm-5 mx-auto">
                                            <select name="payment_mode[]" id="selectSm"
                                                class="form-control form-control">
                                                <option value="">-.Elige medio de Pago.-</option>
                                                <?php
                                                    $query_payment = $conn -> query ("SELECT * FROM `payment_method`");
                                                    while ($payment= mysqli_fetch_array($query_payment)) {                                           
                                                    echo '<option value="'.$payment['modo_de_pago'].'">'.$payment['modo_de_pago'].'</option>';
                                                    }  
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-4 mx-auto" style="text-align: center;">
                                        <button type="submit" name="enamorados" id="enamorados" style="padding-left: 20%;padding-right: 20%;" class="btn btn-warning">Pedir</button>
                                    </div>
                                </form>
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
                 <a href="https://api.whatsapp.com/send?phone=542613405502&text=Hola,%20te%20contacto%20desde%20la%20Página"
                     class="twitter"><i class="bx bxl-whatsapp"></i></a>
                 <a href="https://www.facebook.com/picadasmacanudas" class="facebook"><i
                         class="bx bxl-facebook"></i></a>
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
     })
     </script>

     <!-- Template Main JS File -->
     <script src="../assets/mcjs/main.js"></script>

 </body>

 </html>