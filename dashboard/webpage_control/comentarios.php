 <?php include('../db.php'); ?>

 <?php include('../fijos/header.php'); ?>

 <?php include('../fijos/pannel_right.php'); ?>

 <?php include('../fijos_user/pannel_left_super_user.php'); ?>
 <br>
 <div class="container-fluid">
     <div class="card">
         <div style="text-align:center;" class="card-header">
             Satisfacción de Clientes.
         </div>
         <div class="card-body card-block">
             <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
             </div>
             <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                 <thead style="text-align: center;">
                     <tr>
                         <th>id</th>
                         <th>Cliente</th>
                         <th>Comentario</th>
                         <th>Observaciones</th>
                         <th title="Satisfacccion Producto">SP</th>
                         <th title="Satisfacccion Servicio">SS</th>
                         <th title="Satisfacccion Agregado">SA</th>
                         <th title="Satisfacccion Delivery">SD</th>
                         <th>Pag.</th>
                         <th>Opciones</th>
                     </tr>
                     <?php               
                    $query = "SELECT id,`cnee`,`product`,`satisfaction_product`,`satisfaction_servicio`,`satisfaccion_add`,`satisfaction_entrega`,`satisfaction_observation`,`comentario_pagina`,`pagina` FROM `general` WHERE (`satisfaction_product`+`satisfaction_servicio`+`satisfaccion_add`+`satisfaction_entrega`+`satisfaction_observation`)>'0'"  ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $cnee = $row['cnee'];
                      $product = $row['product'];
                      $satisfaction_product = $row['satisfaction_product'];
                      $satisfaction_servicio = $row['satisfaction_servicio'];
                      $satisfaction_add = $row['satisfaccion_add'];
                      $satisfaction_entrega = $row['satisfaction_entrega'];
                      $satisfaction_observation = $row['satisfaction_observation'];
                      $comentario_pagina = $row['comentario_pagina'];
                      $pagina = $row['pagina'];

                      if($pagina == 'si'){

                        $pagina = '<i class="fa fa-comment text-success"></i>';

                      }else{

                        $pagina = '<i class="fa fa-comment-o text-secondary"></i>';

                      }

                      
                      if($satisfaction_product == 1){

                        $satisfaction_product_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                      
                      }elseif($satisfaction_product == 2){
                      
                        $satisfaction_product_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_product == 3){
                      
                        $satisfaction_product_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_product == 4){
                      
                        $satisfaction_product_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }else{
                      
                        $satisfaction_product_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning " ></i>';

                      }
                      
                      // Satisfaccion Servicio

                      if($satisfaction_servicio == 1){

                        $satisfaction_servicio_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                      
                      }elseif($satisfaction_servicio == 2){
                      
                        $satisfaction_servicio_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_servicio == 3){
                      
                        $satisfaction_servicio_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_servicio == 4){
                      
                        $satisfaction_servicio_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }else{
                      
                        $satisfaction_servicio_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning " ></i>';

                      }

                      // Satisfaccion Agregado

                      if($satisfaction_add == 1){

                        $satisfaction_add_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                      
                      }elseif($satisfaction_add == 2){
                      
                        $satisfaction_add_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_add == 3){
                      
                        $satisfaction_add_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_add == 4){
                      
                        $satisfaction_add_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }else{
                      
                        $satisfaction_add_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning " ></i>';

                      }
                      // Satisfaccion Delivery

                      if($satisfaction_entrega == 1){

                        $satisfaction_entrega_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                      
                      }elseif($satisfaction_entrega == 2){
                      
                        $satisfaction_entrega_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_entrega == 3){
                      
                        $satisfaction_entrega_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }elseif($satisfaction_entrega == 4){
                      
                        $satisfaction_entrega_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary " ></i>';

                      }else{
                      
                        $satisfaction_entrega_star = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning " ></i>';

                      }
                      ?>

                     <tr>
                         <td><?php echo $id;?></td>
                         <td><?php echo $cnee;?></td>
                         <td><?php echo $comentario_pagina;?></td>
                         <td><?php echo $satisfaction_observation;?></td>
                         <td><?php echo $satisfaction_product;?></td>
                         <td><?php echo $satisfaction_servicio;?></td>
                         <td><?php echo $satisfaction_add;?></td>
                         <td><?php echo $satisfaction_entrega;?></td>
                         <td><?php echo $pagina;?></td>


                         <td style="width: 14%;">
                             <div class="btn-group">
                                 <a class="btn btn-primary" title="Ver" href="#" type="button" data-toggle="modal"
                                     data-target="#ver<?php echo $id;?>"><i class="fa fa-eye"></i></a>
                                 <!--Modal asigned CNTR-->
                                 <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog"
                                     aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 style="text-align:center;" class="modal-title"
                                                     id="scrollmodalLabel">Detalles del Comentario</h4>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="card">
                                                     <div class="card-body">
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Cliente Final:
                                                                     </strong> <br><?php echo $cnee;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong>
                                                                         Obeservaciones: </strong><br>
                                                                     <?php echo $satisfaction_observation;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Producto:
                                                                     </strong><br>
                                                                     <?php echo $satisfaction_product_star;?> </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Servicio:
                                                                     </strong><br>
                                                                     <?php echo $satisfaction_servicio_star;?> </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Agregado:
                                                                     </strong><br>
                                                                     <?php echo $satisfaction_add_star;?> </h4>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Delivery:
                                                                     </strong><br>
                                                                     <?php echo $satisfaction_entrega_star;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                     </div>
                                                     <br>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--Final Modal View CNTR-->
                             <a class="btn btn-primary" title="Enviar a la Pagina" href="#" type="button"
                                 data-toggle="modal" data-target="#enviar<?php echo $id;?>"><i
                                     class="fa fa-comment"></i></a>
                             <a class="btn btn-danger" title="Eliminar"
                                 href="../actions/delete_comentario.php?id=<?php echo $id;?>" type="button"><i
                                     class="fa fa-trash"></i></a>
                             <!--Modal asigned CNTR-->
                             <div class="modal fade" id="enviar<?php echo $id;?>" tabindex="-1" role="dialog"
                                 aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                 Enviar a la Página</h4>
                                         </div>
                                         <div class="modal-body">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <form
                                                         action="../actions/enviar_comentario_pagina.php?id=<?php echo $id;?>"
                                                         method="POST">
                                                         <div class="row">
                                                             <div class="col-sm-5 mx-auto">
                                                                 <div class="form-group">
                                                                     <label for="" class="form-control-label">Enviar a
                                                                         Pagina</label>
                                                                     <select name="enviar[]" id="" class="form-control">
                                                                         <option value="si">Enviar</option>
                                                                         <option value="no">Quitar</option>
                                                                     </select>
                                                                     <br>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                 </div>
                                                 <div class="row">
                                                     <div class="col-sm-4"></div>
                                                     <div class="col-sm-4" style="text-align: center;">
                                                         <button type="submit" name="cambiar" id="cambiar"
                                                             class="btn btn-primary">Editar</button>
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
         <!--form action="../report/report_agregados.php" method="POST">
             <div class="row" style="text-align: center;">
                 <div class="col-sm-4 mx-auto">
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary"> <i class="fa fa-download"></i> Listado</button>
         </form>
         <a class="btn btn-primary" href="../views/proveedores_bebidas.php"><i class="fa fa-hand-o-right"></i>
             Producto</a-->


         <br>
     </div>
 </div>
 



 <?php include('../fijos/footer.php');?>