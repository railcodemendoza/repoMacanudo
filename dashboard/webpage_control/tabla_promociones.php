 

<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php

    $query = "SELECT * FROM promo";
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($result)
    
?>

<br>
<div class="container-fluid">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Promociones:
        </div>
        <h3 style="text-align:center; margin-top: 2rem;">Codigo Promocional: </h3>
        <h1 style="text-align:center;"><span class="badge rounded-pill bg-warning"><?php echo $row['codigo'];?></span></h1>
        <h5 style="text-align:center;">Descuento: <?php echo $row['descuento'];?>%</h5>
        <a style="text-align:center; font-size: xx-large;" href="#" type="button"  data-toggle="modal" data-target="#editar_promo"><i class="fa fa-edit"></i></a>
          <!-- modal editar promo -->
            <div class="modal fade" id="editar_promo" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Promoción:</h4>    
                  </div>
                  <div class="modal-body">
                    <div class="card border">
                      <div class="card-body">
                        <form action="../actions/editar_promo.php?id=1" method="POST">
                          <div class="form-row">
                            <div class="form-group col-sm-4 mx-auto">
                              <label for="text" >Codigo</label>
                              <input type="text" name="codigo" value="<?php echo $row['codigo'];?>">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-sm-4 mx-auto">
                              <label for="text" >Descuento:</label>
                              <input type="text" name="descuento" value="<?php echo $row['descuento'];?>">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4" style="text-align: center;">
                              <button type="submit" name="editar" id="editar" class="btn btn-primary">Cambiar</button>
                            </div>
                            <div class="col-sm-4"></div>
                          </div> 
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN MODAL -->

        <br>
      
        <div class="card-body card-block">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table reponsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
               
                  <tr>
                    <th>id</th>
                    <th>PROMO</th>
                    <th>Cliente</th>
                    <th>P$ Total</th>
                    <th>Fecha:</th>
                  </tr>

                  <?php
                    
                    $query = "SELECT * FROM `promos_aplicadas`" ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $promo = $row['promo'];
                      $cliente = $row['cliente'];
                      $total = $row['total'];
                      $Created_at = $row['Created_at'];
               
                      ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $promo;?></td>
                    <td><?php echo $cliente;?></td>
                    <td>$<?php echo $total;?>.00</td>
                    <td><?php echo $Created_at;?></td>
                  </tr>
                </tbody>
                    <?php };?>
                    </table>
        </div>
        <!-- <form action="../report/report_localidades.php" method="POST">
        <div class="row" style="text-align: center;">
                <div class="col-sm-2 mx-auto">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button> 
                </div>
        </div> 
        </form>  -->
        <br> 
    </div>
</div>
<br>
    

<br>


<?php include('../fijos/footer.php');?>