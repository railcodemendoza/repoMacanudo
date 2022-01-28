 

<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php

    
?>

<br>
<div class="container-fluid">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Todas las Picadas.
        </div>
        <br>
        <form action="../report/report_localidades.php" method="POST">
          <div class="row" style="text-align: center;">
            <div class="col-sm-4 mx-auto">
              <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button> 
        </form>
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#agregar_localidad"> Agregar Localidad</button>
            </div>
                        <div class="modal fade" id="agregar_localidad" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Agregar Localidad</h4>    
                              </div>
                              <div class="modal-body">
                                <div class="card border">
                                  <div class="card-body">
                                    <form action="../actions/agregar_localidad.php" method="POST">
                                      <div class="form-row">
                                        <div class="form-group col-sm-4 mx-auto">
                                          <label for="text" >Localidad</label>
                                          <input type="text" name="location" placeholder="Departamento - Distrito">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-sm-4 mx-auto">
                                          <label for="text" >Kilometros</label>
                                          <input type="text" name="km_to_zero" placeholder="10">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-sm-4 mx-auto">
                                          <label for="text" >Precio final</label>
                                          <input type="text" name="px_km" placeholder="180">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4" style="text-align: center;">
                                          <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
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
          </div> 
         
        <br> 
        <div class="card-body card-block">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table reponsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
               
                  <tr>
                    <th>id</th>
                    <th>localización</th>
                    <th>km</th>
                    <th>Px Km</th>
                    <th>Opciones</th>
                  </tr>

                  <?php
                    
                    $query = "SELECT * FROM `delivery`" ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $location = $row['location'];
                      $km_to_zero = $row['km_to_zero'];
                      $px_km = $row['px_km'];
                                          
                      ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $location;?></td>
                    <td><?php echo $km_to_zero;?></td>
                    <td><?php echo $px_km;?></td>
                    
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="#" type="button"  data-toggle="modal" data-target="#editar_localidad<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="../actions/delete_localidad.php?id=<?php echo $id;?>"><i class="fa fa-trash"></i></a>

                        
                        <div class="modal fade" id="editar_localidad<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Localidad <strong><?php echo $location;?></strong></h4>    
                              </div>
                              <div class="modal-body">
                                <div class="card border">
                                  <div class="card-body">
                                    <form action="../actions/editar_localidad.php?id=<?php echo $id;?>" method="POST">
                                      <div class="form-row">
                                        <div class="form-group col-sm-4 mx-auto">
                                          <label for="text" >Localidad</label>
                                          <input type="text" name="location" value="<?php echo $location;?>">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-sm-4 mx-auto">
                                          <label for="text" >Kilometros</label>
                                          <input type="text" name="km_to_zero" value="<?php echo $km_to_zero;?>">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-sm-4 mx-auto">
                                          <label for="text" >Precio final</label>
                                          <input type="text" name="px_km" value="<?php echo $px_km;?>">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4" style="text-align: center;">
                                          <button type="submit" name="editar" id="editar" class="btn btn-primary">Editar</button>
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
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
                    <?php };?>
                    </table>
        </div>
        <form action="../report/report_localidades.php" method="POST">
        <div class="row" style="text-align: center;">
                <div class="col-sm-2 mx-auto">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button> 
                </div>
        </div> 
        </form> 
        <br> 
    </div>
</div>
<br>
    

<br>


<?php include('../fijos/footer.php');?>