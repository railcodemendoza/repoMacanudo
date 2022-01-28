 <?php include('../db.php'); ?>

 <?php include('../fijos/header.php'); ?>

 <?php include('../fijos/pannel_right.php'); ?>

 <?php include('../fijos_user/pannel_left_super_user.php'); ?>
 <br>
 <div class="container-fluid">
     <div class="card">
         <div style="text-align:center;" class="card-header">
             Picadas Miércoles
         </div>
         <div class="card-body card-block">
             <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
             <table id="bootstrap-data-table responsive " class="table table-striped table-bordered">
                 <thead style="text-align: center;">
                     <tr>
                         <th>id</th>
                         <th>Fecha</th>
                         <th>Cliente</th>
                         <th>Picada</th>
                         <th>para</th>
                         <th>Tipo</th>
                         <th>Agregado Stock</th>
                         <th>Medio de Pago</th>
                         <th>Opciones</th>
                     </tr>

                     <?php

                                        
                    $query = "SELECT * FROM `general` WHERE `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 2"  ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $delivery_date = $row['delivery_date'];
                      $customer = $row['customer'];
                      $cel_phone = $row['cel_phone'];
                      $cnee = $row['cnee'];
                      $cnee_cel_phone = $row['cnee_cel_phone'];
                      $inscription = $row['inscription'];
                      $schedule_available = $row['schedule_available'];
                      $product = $row['product'];
                      $add1 = $row['add1'];
                      $add2 = $row['add2'];
                      $add3 = $row['add3'];
                      $payment_mode = $row['payment_mode'];
                      $address = $row['address'];
                      $referencia = $row['referencia'];
                      $location = $row['location'];
                      $status = $row['status'];
                      $status_pago = $row['status_pago'];
                      $type = $row['type'];
                      $in_ars = $row['in_ars'];
                      $observacion_interna = $row['observacion_interna'];

                      
                      ?>

                     <tr>
                         <td><?php echo $id;?></td>
                         <td><?php echo $delivery_date;?></td>
                         <td><?php echo $customer;?></td>
                         <td><?php echo $product;?></td>
                         <td><?php echo $add1;?></td>
                         <td><?php echo $add3;?></td>
                         <td><?php echo $add2;?></td>
                         <td><?php echo $payment_mode;?><br>
                             <p style="font-size: 5;"><?php echo $status_pago;?></p>
                         </td>
                         <td>
                             <div class="btn-group">
                                 <!--======================|   VER   |======================-->
                                 <a class="btn btn-primary" title="Ver Detalle" href="#" type="button"
                                     data-toggle="modal" data-target="#ver<?php echo $id;?>"><i
                                         class="fa fa-eye"></i></a>

                                 <!--======================|MODAL VER|======================-->

                                 <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog"
                                     aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 style="text-align:center;" class="modal-title"
                                                     id="scrollmodalLabel">Detalles de Picada para
                                                     <strong><?php echo $customer;?></strong>
                                                 </h4>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="card border">
                                                     <div class="card-body">
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Nombre:
                                                                     </strong>
                                                                     <?php echo $customer .' ('.$cel_phone . ') ' ?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Receptor:
                                                                     </strong>
                                                                     <?php echo $cnee .' ('.$cnee_cel_phone . ') ' ?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong> Dedicatoria:
                                                                     </strong></h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;">
                                                                     <?php echo $inscription;?></h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong> Fecha:
                                                                     </strong> <?php echo $delivery_date ; ?> </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong> Horario:
                                                                     </strong> <?php echo $schedule_available ; ?> </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong> Direccion:
                                                                     </strong>
                                                                     <?php echo $address . ' ( '. $referencia . ') - '. $location ;?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"><strong>Picada:
                                                                     </strong><?php echo $product . ' - ' . $add3 .' ( '. $add1 . ')';?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;">
                                                                     <strong>Agregados:</strong> <?php echo $add2;?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;">
                                                                     <strong>Observaciones:</strong>
                                                                     <?php echo $observacion_interna;?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"><strong>Forma de
                                                                         Pago:</strong> <?php echo $payment_mode; ?>
                                                                 </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"><strong>Total:</strong>
                                                                     <?php echo $in_ars; ?></h4>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <br>
                                                     <div class="row">
                                                         <div class="col-sm-4"></div>
                                                         <div class="col-sm-4" style="text-align: center;">
                                                             <button type="button" class="btn btn-primary"
                                                                 data-dismiss="modal">cerrar</button>
                                                         </div>
                                                         <div class="col-sm-4"></div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <!--======================|FINAL VER|======================-->
                                 <a class="btn btn-primary" title="Cambiar Status" href="#" type="button"
                                     data-toggle="modal" data-target="#cambiar_status<?php echo $id;?>"><i
                                         class="fa fa-check"></i></a>
                                 <!--Modal asigned CNTR-->
                                 <div class="modal fade" id="cambiar_status<?php echo $id;?>" tabindex="-1"
                                     role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 style="text-align:center;" class="modal-title"
                                                     id="scrollmodalLabel">Cambiar estado a Picada
                                                     <strong><?php echo $id;?></strong>
                                                 </h4>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="card border border-secondary">
                                                     <div class="card-body">
                                                         <h3 style="text-align: center;"> <strong> Status: </strong>
                                                         </h3>
                                                         <form
                                                             action="../actions/cambiar_status.php?id=<?php echo $id;?>&dia=miercoles"
                                                             method="POST">
                                                             <div class="row">
                                                                 <div class="col-sm-2"></div>
                                                                 <div class="col-sm-8">
                                                                     <select name="status[]" id="selectSm"
                                                                         class="form-control form-control">
                                                                         <option value="<?php echo $status; ?>">
                                                                             <?php echo $status; ?></option>
                                                                         <?php
                                                
                                                  $query_status = $conn -> query ("SELECT * FROM `status_pícadas`");
                                                          while ($status= mysqli_fetch_array($query_status)) {                                           
                                                              echo '<option value="'.$status['title'].'">'.$status['title'].'</option>';
                                                          }  
                                              ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <br>
                                                             <div class="row">
                                                                 <div class="col-sm-4"></div>
                                                                 <div class="col-sm-4" style="text-align: center;">
                                                                     <button type="submit" name="confirmar"
                                                                         id="confirmar"
                                                                         class="btn btn-warning">Cambiar</button>

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
                                 <!--Final Modal View CNTR-->
                                 <a class="btn btn-primary" href="#" type="button" data-toggle="modal"
                                     data-target="#editar_pedido<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
                                 <!--====================== MODAL EDITAR ======================-->
                                 <div class="modal fade" id="editar_pedido<?php echo $id;?>" tabindex="-1" role="dialog"
                                     aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 style="text-align:center;" class="modal-title"
                                                     id="scrollmodalLabel">Cambiar datos de la Picada
                                                     <strong><?php echo $id;?></strong>
                                                 </h4>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="card border">
                                                     <div class="card-body">
                                                         <form
                                                             action="../actions/editar_pedido.php?id=<?php echo $id;?>&vista=jueves"
                                                             method="POST">
                                                             <div class="form-row">
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="text">Tipo</label>
                                                                     <select name="type[]" id="" class="form-control">
                                                                         <option value="<?php echo $type; ?>">
                                                                             <?php echo $type; ?></option>
                                                                         <option value="con_envio">Con Envio</option>
                                                                         <option value="con_retiro">Con Retiro</option>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="form-row">
                                                                 <div class="col-sm-2"></div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Nombre:</label>
                                                                     <input class="form-control" type="name"
                                                                         name="customer"
                                                                         value="<?php echo $customer;?>">
                                                                 </div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Celular</label>
                                                                     <input class="form-control" type="phone"
                                                                         name="cel_phone"
                                                                         value="<?php echo $cel_phone;?>">
                                                                 </div>
                                                                 <div class="col-sm-2"></div>
                                                             </div>
                                                             <div class="form-row">
                                                                 <div class="col-sm-2"></div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Receptor:</label>
                                                                     <input class="form-control" type="name" name="cnee"
                                                                         value="<?php echo $cnee;?>">
                                                                 </div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Celular</label>
                                                                     <input class="form-control" type="phone"
                                                                         name="cnee_cel_phone"
                                                                         value="<?php echo $cnee_cel_phone;?>">
                                                                 </div>
                                                                 <div class="col-sm-2"></div>
                                                             </div>
                                                             <div class="row-group col-sm-8 mx-auto">
                                                                 <label for="comentario">Dedicatoria</label>
                                                                 <textarea class="form-control"
                                                                     name="inscription"><?php echo $inscription;?></textarea>
                                                             </div>
                                                             <div class="form-row">
                                                                 <div class="col-sm-2"></div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Fecha</label>
                                                                     <input class="form-control" type="date"
                                                                         name="delivery_date"
                                                                         value="<?php echo $delivery_date;?>">
                                                                 </div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Horario</label>
                                                                     <select name="schedule_available[]"
                                                                         class="form-control">
                                                                         <option
                                                                             value="<?php echo $schedule_available; ?>">
                                                                             <?php echo $schedule_available; ?></option>
                                                                         <option value="de 10 a 13">Con Retiro - 10 a 13
                                                                         </option>
                                                                         <option value="de 17 a 20">Con Retiro - 17 a 20
                                                                         </option>
                                                                         <option value="de 10:30 - 13:30">Con Envio -
                                                                             10:30 - 13:30</option>
                                                                         <option value="de 14:00 - 17:00">Con Envio -
                                                                             14:00 - 17:00</option>
                                                                         <option value="de 18:00 - 20:00">Con Envio -
                                                                             18:00 - 20:00</option>
                                                                     </select>
                                                                 </div>
                                                                 <div class="col-sm-2"></div>
                                                             </div>
                                                             <div class="form-row">
                                                                 <div class="col-sm-2"></div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">Direccion:</label>
                                                                     <input class="form-control" type="address"
                                                                         name="address" value="<?php echo $address;?>">
                                                                 </div>
                                                                 <div class="form-group col-sm-4 mx-auto">
                                                                     <label for="name">location</label>
                                                                     <select name="location[]" class="form-control">
                                                                         <option value="<?php echo $location; ?>">
                                                                             <?php echo $location; ?></option>
                                                                         <?php
                                            $query_location = $conn -> query ("SELECT * FROM `delivery`");
                                                    while ($location= mysqli_fetch_array($query_location)) {                                           
                                                        echo '<option value="'.$location['location'].'">'.$location['location'].'</option>';
                                                    }  
                                          ?>
                                                                     </select>
                                                                 </div>
                                                                 <div class="col-sm-2"></div>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label style="color:white"
                                                                     class="col-sm-8 control-label">Tabla:</label>
                                                                 <div class="col-sm-8 mx-auto">
                                                                     <select name="product[]"
                                                                         class="form-control form-control" require>
                                                                         <option value="<?php echo $product; ?>">
                                                                             <?php echo $product; ?></option>
                                                                         <?php
                                                  $query_product = $conn -> query ("SELECT * FROM `rango_picada`");
                                                          while ($product= mysqli_fetch_array($query_product)) {                                           
                                                              echo '<option value="'.$product['title'].'">'.$product['title'].'</option>';
                                                          }  
                                              ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label style="color:white"
                                                                     class="col-sm-8 control-label">Tipo:</label>
                                                                 <div class="col-sm-8 mx-auto">
                                                                     <select name="add3[]" required
                                                                         class="form-control form-control">
                                                                         <option value="<?php echo $add3; ?>">
                                                                             <?php echo $add3; ?></option>
                                                                         <?php
                                                      $query_tipo = $conn -> query ("SELECT * FROM `type_picadas`");
                                                              while ($tipo= mysqli_fetch_array($query_tipo)) {                                           
                                                                  echo '<option value="'.$tipo['title'].'">'.$tipo['title'].'</option>';
                                                              }  
                                                  ?>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label style="color:white"
                                                                     class="col-sm-8 control-label">Comensales:</label>
                                                                 <div class="col-sm-8 mx-auto">
                                                                     <select name="add1[]" id="selectSm" required
                                                                         class="form-control form-control">
                                                                         <option value="<?php echo $add1; ?>">
                                                                             <?php echo $add1; ?></option>
                                                                         <option value="4">Pican 4 - Comen 2</option>
                                                                         <option value="5">Pican 5 (Solo MDF)</option>
                                                                         <option value="6">Pican 6 (Solo MDF)</option>
                                                                         <option value="7">Pican 7 (Solo MDF)</option>
                                                                         <option value="8">Pican 8 (Solo MDF)</option>
                                                                         <option value="9">Pican 9 (Solo MDF)</option>
                                                                         <option value="10">Pican 10 (Solo MDF)</option>
                                                                         <option value="12">Pican 11 (Solo MDF)</option>
                                                                     </select>
                                                                 </div>
                                                             </div>
                                                             <div class="form-group col-sm-8 mx-auto">
                                                                 <p>Agregados: <?php echo $add2; ?></p>
                                                                 <label for="name">Sumar Agregado:</label>
                                                                 <select name="add2[]" class="form-control">
                                                                     <option value="">.-Agregado Nuevo.-</option>
                                                                     <?php
                                                $query_add2 = $conn -> query ("SELECT * FROM `add2`");
                                                        while ($add2= mysqli_fetch_array($query_add2)) {                                           
                                                            echo '<option value="'.$add2['title'].'">'.$add2['title'].'</option>';
                                                        }  
                                              ?>
                                                                 </select>
                                                             </div>
                                                             <div class="form-group col-sm-8 mx-auto">
                                                                 <label for="name">Observaciones:</label>
                                                                 <textarea name="observacion_interna"
                                                                     class="form-control" cols="30"
                                                                     rows="10"><?php echo $observacion_interna; ?></textarea>
                                                             </div>
                                                             <div class="form-group col-sm-8 mx-auto">
                                                                 <label for="name">Total:</label>
                                                                 <input type="number" value="<?php echo $in_ars; ?>"
                                                                     name="in_ars" class="form-control">
                                                             </div>
                                                             <div class="form-group col-sm-8 mx-auto">
                                                                 <label for="name">Modo de Pago</label>
                                                                 <select name="payment_method[]" class="form-control">
                                                                     <option value="<?php echo $payment_mode; ?>">
                                                                         <?php echo $payment_mode; ?></option>
                                                                     <option value="Transferencia">Transferencia
                                                                     </option>
                                                                     <?php
                                                $query_payment_mode = $conn -> query ("SELECT * FROM `payment_method`");
                                                while ($payment_mode= mysqli_fetch_array($query_payment_mode)) {                                           
                                                    echo '<option value="'.$payment_mode['modo_de_pago'].'">'.$payment_mode['modo_de_pago'].'</option>';
                                                }  
                                            ?>
                                                                 </select>
                                                             </div>
                                                             <div class="row">
                                                                 <div class="col-sm-4 mx-auto"
                                                                     style="text-align: center;">
                                                                     <button type="submit" name="editar" id="editar"
                                                                         class="btn btn-primary">Editar</button>
                                                                 </div>
                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- FIN ====================== MODAL EDITAR  ======================-->
                                 <a class="btn btn-primary" target="_blank"
                                     href="https://api.whatsapp.com/send?phone=54<?php echo $cel_phone;?>&text=Hola,%20te%20escribo%20de%20Picadas%20Macanudas"
                                     title="Contactar" href="#"><i class="fa fa-user"></i></a>
                                 <a class="btn btn-danger" title="Eliminar"
                                     href="../actions/delete_pedidos.php?id=<?php echo $id;?>&dia=miercoles"
                                     type="button"><i class="fa fa-trash"></i></a>
                             </div>
                         </td>
                     </tr>

                     </tbody>
                     <?php };?>
             </table>
         </div>
         <div class="row">
             <div class="col-sm-1"></div>
             <div class="col-sm-3 mx-auto">
                 <form action="../report/report_miercoles.php" method="POST">
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary">Descargar Listado</button>
                 </form>
             </div>
             <div class="col-sm-3 mx-auto">
                 <form action="../report/report_fletes_miercoles.php" method="POST">
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary">Descargar Fletis</button>
                 </form>
             </div>
             <div class="col-sm-3 mx-auto">
                 <form action="../actions/envio_mail_flete.php" method="POST">
                     <button type="submit" id="envio_miercoles" name="envio_miercoles" value="Export to excel"
                         class="btn btn-primary">Enviar a Fletis</button>
                 </form>
             </div>


             <!--button type="button" href="../actions/agregar_picada.php"></button-->
         </div>
         <br>
     </div>
 </div>
 <br>


 <br>


 <?php include('../fijos/footer.php');?>