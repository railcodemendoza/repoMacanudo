 
<?php include('../db.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="../img/favicon.png">

  <title>Dashboard :: Picadas Macanudas</title>

  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
  <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../css/fullcalendar.css">
  <link href="../css/widgets.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />
  <link href="../css/xcharts.min.css" rel=" stylesheet">
  <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Pachi <span class="lite">Man</span></a>
      <!--logo end-->

      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Pedidos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="../views/pedidos_conenvio.php">con envio</a></li>
              <li><a class="" href="../views/pedidos_conretiro.php">con retiro</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Preparar</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="../views/picadas_lunes.php">Lunes</a></li>
              <li><a class="" href="../views/picadas_martes.php">Martes</a></li>
              <li><a class="" href="../views/picadas_miercoles.php">Miercoles</a></li>
              <li><a class="" href="../views/picadas_jueves.php">Jueves</a></li>
              <li><a class="" href="../views/picadas_viernes.php">viernes</a></li>
              <li><a class="" href="../views/picadas_sabados.php">Sábados</a></li>
              <li><a class="" href="../views/picadas_futuro.php">Futuro</a></li>



            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Fletes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="../views/tabla_localidades.php">Localidades</a></li>
              <li><a class="" href="../views/tabla_fletes.php">Planilla para flete</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Stock</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="../views/stock_picadas.php">Picadas</a></li>
              <li><a class="" href="../views/stock_proveedores.php">Proveedores</a></li>
            </ul>
          </li>
         
          <li>
            <a class="" href="../views/picadas_entregadas.php">
                          <i class="icon_piechart"></i>
                          <span>Entregadas</span>

                      </a>

          </li>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Estadisticas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="../views/profit.php">Profit</a></li>
              <li><a class="" href="../views/satisfaccion_del_cliente.php">Satisfaccion del cliente</a></li>
            </ul>
            <ul class="sub">
              
            </ul>
          </li>
          <li>
            <a class="" href="../views/tickets_desarrollo.php">
                          <i class="icon_piechart"></i>
                          <span>Tickets</span>

                      </a>

          </li>

          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count">6.674</div>
              <div class="title">Picadas para la semana</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">7.538</div>
              <div class="title">Picadas para Hoy</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count">4.362</div>
              <div class="title">Que se entregan hoy</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">1.426</div>
              <div class="title">Stock</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                 Ultimos Pedidos
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>id</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>in_ars</th>
                    <th>out_ars</th>
                    <th></i> Opciones</th>
                  </tr>

                  <?php
                    
                    $query = "SELECT * FROM `stock`" ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $title = $row['title'];
                      $description = $row['description'];
                      $provider = $row['provider'];
                      $cuantity = $row['cuantity'];
                      $in_ars= $row['in_ars'];
                      $out_ars = $row['out_ars'];
                      
                      ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $description;?></td>
                    <td><?php echo $provider;?></td>
                    <td><?php echo $cuantity;?></td>
                    <td><?php echo $in_ars;?></td>
                    <td><?php echo $out_ars;?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
                    <?php };?>
              </table>
            </section>
          </div>
        </div>


 <!-- container section end -->
  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome s../cript for all page-->
  <script src="../js/scripts.js"></script>


</body>

</html>