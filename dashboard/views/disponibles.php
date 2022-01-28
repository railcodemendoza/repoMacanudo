<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>


<?php 

  $query_ventas = "SELECT sum(in_ars) FROM `general`";
  $result_ventas = mysqli_query($conn, $query_ventas);
  if (mysqli_num_rows($result_ventas) == 1) {
    $row = mysqli_fetch_array($result_ventas);
    $cantidad_ventas = $row['sum(in_ars)'];}
  
  $query_mp = "SELECT sum(in_ars) FROM `general` WHERE `payment_mode` = 'MERCADO PAGO'";
  $result_mp = mysqli_query($conn, $query_mp);
  if (mysqli_num_rows($result_mp) == 1) {
    $row = mysqli_fetch_array($result_mp);
    $cantidad_mp = $row['sum(in_ars)'];}
  
  $query_ft = "SELECT sum(in_ars) FROM `general` WHERE `payment_mode` = 'EFECTIVO'";
  $result_ft = mysqli_query($conn, $query_ft);
  if (mysqli_num_rows($result_ft) == 1) {
    $row = mysqli_fetch_array($result_ft);
    $cantidad_ft = $row['sum(in_ars)'];}

  $query_costos = "SELECT sum(out_ars) FROM `general`";
  $result_costos = mysqli_query($conn, $query_costos);
  if (mysqli_num_rows($result_costos) == 1) {
    $row = mysqli_fetch_array($result_costos);
    $cantidad_costo = $row['sum(out_ars)'];}
$disponible = $cantidad_ventas - $cantidad_costo;

?>
<br>
  <div class="container-fluid">
    <div  class="card">
      <div style="text-align:center;"  class="card-header">
            Disponibles
      </div>
      <div class="card-body card-block">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-flat-color-1">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left-mr-1">$</span>
                    <span class="count"><?php echo $cantidad_ventas;?></span>
                  </h3>
                  <p class="text-light mt-1 m-0">Ventas Totales</p>
                </div>
                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-flat-color-3">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left-mr-1">$</span>
                    <span class="count"><?php echo $cantidad_mp;?></span>
                  </h3>
                  <p class="text-light mt-1 m-0">
                    Mercado Pago
                  </p>
                </div>
                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-flat-color-3">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left-mr-1">$</span>
                    <span class="count"><?php echo $cantidad_ft;?></span>
                  </h3>
                  <p class="text-light mt-1 m-0">
                    Efectivo
                  </p>
                </div>
                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-flat-color-4">
              <div class="card-body">
                <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                    <span class="currency float-left-mr-1">$</span>
                    <span class="count"><?php echo $disponible;?></span>
                  </h3>
                  <p class="text-light mt-1 m-0">
                    Disp. de Retiro
                  </p>
                </div>
                <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
           
<br>
    

<br>


<?php include('../fijos/footer.php');?>
