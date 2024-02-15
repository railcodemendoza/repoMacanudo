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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Picadas Macanudas :: sabores que compartimos</title>
    <meta name="description" content="Picadas en Mendoza. Acompañá tus buenos momentos con nuestras picadas.">
    <meta name="keywords" content="">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Piazzolla:ital,wght@0,300;0,800;0,900;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <style>
    @font-face {
        font-family: "Nickainley";
        src: url("assets/font/Nickainley-Normal.otf");
    }
    </style>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-transparent">
        <div class="container text-right">
            <i class="icofont-phone"></i> +54 9 2614 71-4206
            <i class="icofont-clock-time icofont-rotate-180"></i> Lun-Sáb: 10:00 AM - 20:00 PM
        </div>
    </section>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <a href="index.php"><img style="width: 25%; margin-left: 5%;" src="assets/img/MCND_Logo_1080_WHITE.png"
                alt="picadas mendoza"></a>
        <div class="container d-flex align-items-center" >

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.php"></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav class="navbar navbar-expand-lg nav-menu d-none" >
                <ul style="max-width: 90rem">
                    <li class="active"><a href="index.php">Inicio</a></li>
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#menu">Picadas</a></li>
                    <li><a href="#events">Agregados</a></li>
                    <li><a href="#gallery1">Galeria</a></li>
                    <li><a href="#contact">Contacto</a></li>
                </ul>
            </nav>
            <!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <?php
        $conn = mysqli_connect(
            '193.203.175.53', //193.203.175.53
            'u101685278_labmac',//   u101685278_pachimanok 
            'Rail2021',//  Pachiman9102
            'u101685278_labmac' //   u101685278_macanudas
             //pregunto al pachi pero me pinta q voy a tener q hacer 2 secciones para la version mobile.
        );
        $a = 1;
    ?>
    <?php include('sections/sectionsmobile/headSectionMobile.php'); ?>
    <main id="main">
    <?php include('sections/sectionsmobile/cotizadorMobile.php'); ?>
        <?php include('sections/sectionsmobile/quienesSomosMobile.php'); ?>
        <?php include('sections/sectionsmobile/nuestrasPicadasMobile.php'); ?>
        <?php include('sections/sectionsmobile/nuestrosProductosMobile.php'); ?>
        <?php include('sections/sectionsmobile/acompañamientosMobile.php'); ?>
        <?php include('sections/sectionsmobile/encuestasMobile.php'); ?>
        <?php include('sections/sectionsmobile/mediosMobile.php'); ?>
        <?php include('sections/sectionsmobile/galeriaMobile.php'); ?>
        <?php include('modalPromomobile.php'); ?>
    </main><!-- End #main -->
    <?php include('sections/footer.php'); ?>
    <?php include('sections/whatsAppFloat.php'); ?>
    <?php include('sections/script.php'); ?>




