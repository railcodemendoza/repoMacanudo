<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/avion.png">
    <link rel="shortcut icon" href="images/avion.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                       <br>
                       <br>
                    </a>
                </div>
                
                <div class="login-form" style="background: transparent;">
                    <form method='POST' action="registerboton.php"> 
                    
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="username" class="form-control" name="username" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="name" class="form-control" name="name" placeholder="Juan" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="name" class="form-control" name="last_name" placeholder="Perez" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="phone" name="celular" class="form-control" placeholder="542612128105" required>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="phone" name="empresa" class="form-control" placeholder="Empresa de Ejemplo SA" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="check"> Acepto los terminos de privacidad
                            </label>
                        </div>                        
                        <button type="submit" name="register" class="btn btn-primary btn-flat m-b-30 m-t-30">Registrarme</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Ya tengo cuenta <a href="index.php">Inciar Sesión</a></p>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
