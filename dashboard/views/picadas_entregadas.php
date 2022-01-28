 <?php include('../db.php'); ?>

 <?php include('../fijos/header.php'); ?>

 <?php include('../fijos/pannel_right.php'); ?>

 <?php include('../fijos_user/pannel_left_super_user.php'); ?>
 <br>
 <div class="container-fluid">
     <div class="card">
         <div style="text-align:center;" class="card-header">
             Pedidos engregados
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
                         <th>Medio de Pago</th>
                         <th>Status Pago</th>
                         <th>Opciones</th>
                     </tr>

                     <?php
                    
                    $query = "SELECT * FROM `general` where status = 'ENTREGADA' ORDER BY `id` DESC" ;
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
                      $payment_mode = $row['payment_mode'];
                      $address = $row['address'];
                      $referencia = $row['referencia'];
                      $location = $row['location'];
                      $status = $row['status'];
                      $status_pago = $row['status_pago'];
                      $type = $row['type'];
                      
                      ?>
                     <tr>
                         <td><?php echo $id;?></td>
                         <td><?php echo $delivery_date;?></td>
                         <td><?php echo $customer;?></td>
                         <td><?php echo $product;?></td>
                         <td><?php echo $payment_mode;?></td>
                         <td><?php echo $payment_mode;?><br>
                             <p style="font-size: 5;"><?php echo $status_pago;?></p>
                         </td>
                         <td>
                             <div class="btn-group">
                                 <a class="btn btn-primary" href="#"><i class="fa fa-eye"></i></a>
                                 <a class="btn btn-primary" title="Reclamar Pago" target="_blank"
                                     href="https://api.whatsapp.com/send?phone=54<?php echo $cel_phone;?>&text=Hola,%20te%20escribo%20de%20Picadas%20Macanudas%20para%20consultarte%20por%20el%20pago%20de%20la%20picada%20<?php echo $product;?>"><i
                                         class="fa fa-dollar"></i></a>
                                 <a class="btn btn-primary" title="Enviar Encuesta" target="_blank"
                                     href="https://api.whatsapp.com/send?phone=54<?php echo $cel_phone;?>&text=Hola,%20esperamos%20que%20hayas%20disfrutado%20la%20picada%20.%20Nos%20interesa%20tu%20opinion,%20podrás%20ingresar%20y%20dejarnos%20un%20comentario:http://picadasmacanudas.com/encuesta/encuesta.php?id=<?php echo $id;?>"><i
                                         class="fa fa-thumbs-o-up"></i></a>
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
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary">Descargar Listado</button>
                 </div>
             </div>
         </form>
         <br>
     </div>
 </div>
 <br>


 <br>


 <?php include('../fijos/footer.php');?>