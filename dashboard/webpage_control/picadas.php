 
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Detalles de Precios en Web
        </div>
        <div class="card-body card-block">
        <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                  <tr>
                    <th>id</th>
                    <th>Tiítulo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                  </tr>

                  <?php

                                        
                    $query = "SELECT * FROM `picadas`"  ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $title = $row['title'];
                      $description = $row['description'];
                      $in_ars = $row['in_ars'];
                      $type = $row['type'];

                      ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $description;?></td>
                    <td><?php echo $in_ars;?></td>
                    <td><?php echo $type;?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button"  data-toggle="modal" data-target="#ver<?php echo $id;?>"><i class="fa fa-eye"></i></a>
                          
                          <!--Modal asigned CNTR-->
                          <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Detalles de Producto.</h4>    
                                </div>
                                <div class="modal-body">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align:center;"> <strong> Título: </strong> <br><?php echo $title;?> </h4>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align:center;"> <strong> Descripción: </strong><br> <?php echo $description;?> </h4>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Precio: </strong><br> <?php echo '$'. $in_ars;?> </h4>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong>Tipo: </strong><br> <?php echo $type ;?> </h4>
                                        </div>
                                      </div>
                                      <br>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--Final Modal View CNTR-->            
                        <a class="btn btn-secondary" title="Editar" href="#" type="button"  data-toggle="modal" data-target="#editar<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" title="Eliminar" href="../actions/delete_picadas.php?id=<?php echo $id;?>" type="button" ><i class="fa fa-trash"></i></a>
                        <!--Modal asigned CNTR-->
                        <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Producto</h4>    
                              </div>
                              <div class="modal-body">
                                <div class="card">
                                  <div class="card-body">
                                    <form action="../actions/editar_picadas.php?id=<?php echo $id;?>" method="POST">
                                      <div class="row">
                                        <div class="col-sm-5 mx-auto">
                                          <div class="form-group">
                                            <label for="" class="form-control-label">Datos del producto:</label>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-bars"></i>
                                              </div>
                                              <input type="text" name="title" class="form-control" value="<?php echo $title;?>">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa  fa-comment-o"></i>
                                              </div>
                                              <input type="text" name="description" class="form-control" value="<?php echo $description;?>">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                              </div>
                                              <input type="number" name="in_ars" class="form-control" value="<?php echo $in_ars;?>">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                              </div>
                                              <select name="type[]" id="selectSm" class="form-control form-control" required>
                                                <option value="<?php echo $type;?>">-.Seleccionar tipo.-</option>     
                                                    <?php
                                                        $query_type = $conn -> query ("SELECT * FROM `type_picadas`");
                                                                while ($type= mysqli_fetch_array($query_type)) {                                           
                                                                    echo '<option value="'.$type['title'].'">'.$type['title'].'</option>';
                                                                }  
                                                    ?>
                                              </select>  
                                            </div>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4" style="text-align: center;">
                                          <button type="submit" name="editar" id="editar" class="btn btn-primary">Cambiar</button>
                                        </div>
                                      <div class="col-sm-4"></div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--Final Modal View CNTR-->   
                    </td>
                  </tr>
                </tbody>
                    <?php };?>
                    </table>
        </div>
        <form action="../report/report_picadas.php" method="POST">
          <div class="row" style="text-align: center;">
            <div class="col-sm-4 mx-auto">
              <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary"> <i class="fa fa-download"></i> Listado</button> 
              </form> 
              <a class="btn btn-success" href="#" type="button"  data-toggle="modal" data-target="#agregar"><i class="fa fa-hand-o-right"></i> Producto</a> 
                    
                <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Agregar Producto</h4>    
                      </div>
                      <div class="modal-body">
                        <div class="card">
                          <div class="card-body">
                            <form action="../actions/agregar_picada.php" method="POST">
                            <div class="row">
                              <div class="col-sm-5 mx-auto">
                                <div class="form-group">
                                  <label for="" class="form-control-label">Datos del producto:</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-bars"></i>
                                    </div>
                                    <input type="text" name="title" class="form-control" placeholder="Nombre del Producto">
                                  </div>
                                  <br>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa  fa-comment-o"></i>
                                    </div>
                                    <input type="text" name="description" class="form-control" placeholder="Contenido del Producto">
                                  </div>
                                  <br>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-dollar"></i>
                                    </div>
                                    <input type="number" name="in_ars" class="form-control" placeholder="670.00">
                                  </div>
                                  <br>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-dollar"></i>
                                    </div>
                                    <select name="type[]" id="selectSm" class="form-control form-control" required>
                                      <option value="">-.Seleccionar tipo.-</option>     
                                          <?php
                                              $query_type = $conn -> query ("SELECT * FROM `type_picadas`");
                                                      while ($type= mysqli_fetch_array($query_type)) {                                           
                                                          echo '<option value="'.$type['title'].'">'.$type['title'].'</option>';
                                                      }  
                                          ?>
                                    </select>  
                                  </div>
                                </div>
                              </div>
                            </div> 
                            <div class="row">
                              <div class="col-sm-4 mx-auto" style="text-align: center;">
                                <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Final Modal View CNTR-->   
                <br>
            </div> 
        </div> 
        <br> 
    </div>
</div>
                     


<?php include('../fijos/footer.php');?>
