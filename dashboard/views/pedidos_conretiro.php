<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Pedidos con envios.
        </div>
        <div class="card-body card-block">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
              
                  <tr>
                    <th>id</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Picada</th>
                    <th>Agregado</th>
                    <th>Agregado Stock</th>
                    <th>Medio de Pago</th>
                    <th>Opciones</th>
                  </tr>

                  <?php
                    
                    $query = "SELECT * FROM `general` WHERE type = 'con_retiro' ORDER BY `created_at` DESC" ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                     
                      $id = $row['id'];
                      $delivery_date = $row['delivery_date'];
                      $customer = $row['customer'];
                      $product = $row['product'];
                      $add1 = $row['add1'];
                      $add2 = $row['add2'];
                      $payment_mode = $row['payment_mode'];
                      $status = $row['status'];
                      $cel_phone = $row['cel_phone'];
                      $cnee_cel_phone = $row['cnee_cel_phone'];
                      $cnee = $row['cnee'];
                      $inscription = $row['inscription']; 
                      $schedule_available = $row['schedule_available'];
                      $address = $row['address'];
                      $referencia = $row['referencia'];
                      $location = $row['location'];                      
                      
                      ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $delivery_date;?></td>
                    <td><?php echo $customer;?></td>
                    <td><?php echo $product;?></td>
                    <td><?php echo $add1;?></td>
                    <td><?php echo $add2;?></td>
                    <td><?php echo $payment_mode;?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button"  data-toggle="modal" data-target="#ver<?php echo $id;?>"><i class="fa fa-eye"></i></a>
                          
                          <!--Modal asigned CNTR-->
                          <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Detalles de Picada para <strong><?php echo $customer;?></strong></h4>    
                                </div>
                                <div class="modal-body">
                                  <div class="card border border-secondary">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align:center;"> <strong> Nombre: </strong> <?php echo $customer .' ('.$cel_phone . ') ' ?> </h4>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Dedicatoria: </strong></h4>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"><?php echo $inscription;?></h4>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Fecha: </strong> <?php echo $delivery_date ; ?> </h4>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Horario: </strong> <?php echo $schedule_available ; ?> </h4>
                                        </div>
                                      </div> 
                                      
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"><strong>Picada: </strong> <?php echo $product . ' ( '. $add1 . ')';?></h4>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"><strong>Agregados:</strong> <?php echo $add2;?></h4>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"><strong>Forma de Pago:</strong> <?php echo $payment_mode; ?></h4>
                                        </div>
                                      </div> 
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-sm-4"></div>
                                      <div class="col-sm-4" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
                                      </div>
                                      <div class="col-sm-4"></div>
                                    </div> 
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--Final Modal View CNTR-->            
                        <a class="btn btn-primary" title="Cambiar Status" href="#" type="button"  data-toggle="modal" data-target="#cambiar_status<?php echo $id;?>"><i class="fa fa-check"></i></a>
                        <!--Modal asigned CNTR-->
                        <div class="modal fade" id="cambiar_status<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Cambiar estado a Picada <strong><?php echo $id;?></strong></h4>    
                              </div>
                              <div class="modal-body">
                                <div class="card border border-secondary">
                                  <div class="card-body">
                                  <h3 style="text-align: center;"> <strong> Status: </strong></h3>
                                  <form action="../forms/cambia_status.php?dia=jueves" method="POST">
                                    <div class="row">
                                      <div class="col-sm-2"></div>
                                      <div class="col-sm-8">
                                        <select name="status[]" id="selectSm" class="form-control form-control">
                                          <option value="<?php echo $status; ?>"><?php echo $status; ?></option>     
                                              <?php
                                                  
                                                 
                                                  $query_status = $conn-> query ("SELECT * FROM `status_pícadas`");
                                                          while ($status= mysqli_fetch_array($query_status)) {                                           
                                                              echo '<option value="'.$status['title'].'">'.$status['title'].'</option>';
                                                          }  
                                              ?>
                                        </select>  
                                      </div> 
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-sm-4 mx-auto">
                                        <button type="submit" name="confirmar" id="confirmar" class="btn btn-warning">Cambiar</button>
                                      </div>
                                    </div> 
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--Final Modal View CNTR-->   

                        <a class="btn btn-primary" target="_blank" href="https://api.whatsapp.com/send?phone=54<?php echo $cel_phone;?>&text=Hola,%20te%20escribo%20de%20Picadas%20Macanudas"title="Contactar" href="#"><i class="fa fa-user"></i></a>
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
                    <?php };?>
                    </table>
        </div>
        <form action="../Reporte_user_basic/misAgencias.php" method="POST">
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
