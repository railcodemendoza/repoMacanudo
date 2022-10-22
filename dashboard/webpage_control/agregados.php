 <?php include('../db.php'); ?>

 <?php include('../fijos/header.php'); ?>

 <?php include('../fijos/pannel_right.php'); ?>

 <?php include('../fijos_user/pannel_left_super_user.php'); ?>
 <br>
 <div class="container-fluid">
     <div class="card">
         <div style="text-align:center;" class="card-header">
             Detalles de Precios en Web
         </div>
         <div class="card-body card-block">
             <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
             </div>
             <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                 <thead style="text-align: center;">
                     <tr>
                         <th>id</th>
                         <th>Tiítulo</th>
                         <th>Descripción</th>
                         <th>cant.</th>
                         <th>Precio</th>
                         <th>Tipo</th>
                         <th>Opciones</th>
                     </tr>
                     <?php               
                    $query = "SELECT * FROM `add2`"  ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $title = $row['title'];
                      $description = $row['description'];
                      $imagen = $row['img'];
                      $q = $row['q'];
                      $proveedor = $row['proveedor'];
                      $in_ars = $row['in_ars'];

                      ?>

                     <tr>
                         <td><?php echo $id;?></td>
                         <td><?php echo $title;?></td>
                         <td><?php echo $description;?></td>
                         <td><?php echo $q;?></td>
                         <td><?php echo $proveedor;?></td>
                         <td><?php echo $in_ars;?></td>
                         <td>
                             <div class="btn-group">
                                 <a class="btn btn-primary" title="Ver Detalle" href="#" type="button"
                                     data-toggle="modal" data-target="#ver<?php echo $id;?>"><i
                                         class="fa fa-eye"></i></a>
                                 <!--Modal asigned CNTR-->
                                 <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog"
                                     aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 style="text-align:center;" class="modal-title"
                                                     id="scrollmodalLabel">Detalles de Producto.</h4>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="card">
                                                     <div class="card-body">
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Título:
                                                                     </strong> <br><?php echo $title;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Descripción:
                                                                     </strong><br> <?php echo $description;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align:center;"> <strong> Cantidad:
                                                                     </strong><br> <?php echo $q;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong> Precio:
                                                                     </strong><br> <?php echo '$'. $in_ars;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong>Proveedor:
                                                                     </strong><br> <?php echo $proveedor ;?> </h4>
                                                             </div>
                                                         </div>
                                                         <br>
                                                         <div class="row">
                                                             <div class="col-sm-2"></div>
                                                             <div class="col-sm-8">
                                                                 <h4 style="text-align: center;"> <strong>Imagen:</strong><br></h4>
                                                                 <img src='../../assets/img/add2/<?php echo $imagen ;?>' width='50%' /> 
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
                                 <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                     data-target="#editar<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                                 <a class="btn btn-danger" title="Eliminar"
                                     href="../actions/delete_add2.php?id=<?php echo $id;?>&ruta=<?php echo $imagen ?>" type="button"><i
                                         class="fa fa-trash"></i></a>
                                 <!--Modal asigned CNTR-->
                                 <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog"
                                     aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h4 style="text-align:center;" class="modal-title"
                                                     id="scrollmodalLabel">Editar Producto</h4>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="card">
                                                     <div class="card-body">
                                                         <form
                                                             action="../actions/editar_add2.php?id=<?php echo $id;?>&vista=0&ruta=<?php echo $imagen ?>"
                                                             method="POST" enctype="multipart/form-data">
                                                             <div class="row">
                                                                 <div class="col-sm-5 mx-auto">
                                                                     <div class="form-group">
                                                                         <label for="" class="form-control-label">Datos
                                                                             del producto:</label>
                                                                         <div class="input-group">
                                                                             <div class="input-group-addon">
                                                                                 <i class="fa fa-bars"></i>
                                                                             </div>
                                                                             <input type="text" name="title"
                                                                                 class="form-control"
                                                                                 value="<?php echo $title;?>">
                                                                         </div>
                                                                         <br>
                                                                         <div class="input-group">
                                                                             <div class="input-group-addon">
                                                                                 <i class="fa  fa-comment-o"></i>
                                                                             </div>
                                                                             <input type="text" name="description"
                                                                                 class="form-control"
                                                                                 value="<?php echo $description;?>">
                                                                         </div>
                                                                         <br>
                                                                         <div class="input-group">
                                                                             <div class="input-group-addon">
                                                                                 <i class="fa fa-dollar"></i>
                                                                             </div>
                                                                             <input type="number" name="in_ars"
                                                                                 class="form-control"
                                                                                 value="<?php echo $in_ars;?>">
                                                                         </div>
                                                                         <br>
                                                                         <div class="input-group">
                                                                             <div class="input-group-addon">
                                                                                 <i class="fa fa-child"></i>
                                                                             </div>
                                                                             <input type="text" name="proveedor"
                                                                                 class="form-control"
                                                                                 value="<?php echo $proveedor;?>">
                                                                         </div>
                                                                         <br>
                                                                         <div class="input-group">
                                                                             <div class="input-group-addon">
                                                                                 <i class="fa fa-shopping-cart"></i>
                                                                             </div>
                                                                             <input type="text" name="stock"
                                                                                 class="form-control"
                                                                                 value="<?php echo $q;?>">
                                                                         </div>
                                                                         <br>
                                                                         <div class="input-group">
                                                                             <div class="input-group-addon">
                                                                                 <label>Seleccione imagen a
                                                                                     cargar</label>
                                                                             </div>
                                                                             <div class="form-group">
                                                                                 <div>
                                                                                     <input type="file"
                                                                                         class="form-control"
                                                                                         id="imagen" name="imagen"
                                                                                         multiple>
                                                                                     <br>
                                                                                     <?php
                                                                                            echo "Imagen Actual: $imagen";
                                                                                            echo "<img src='../../assets/img/add2/$imagen' width='50%' />";
                                                                                        ?>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-sm-4"></div>
                                                         <div class="col-sm-4" style="text-align: center;">
                                                             <button type="submit" name="editar_pagina"
                                                                 id="editar_pagina"
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
         <form action="../report/report_agregados.php" method="POST">
             <div class="row" style="text-align: center;">
                 <div class="col-sm-4 mx-auto">
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary"> <i class="fa fa-download"></i> Listado</button>
         </form>
         <a class="btn btn-success" title="Agregar pedido" href="#" type="button"  data-toggle="modal"
             data-target="#agregar_pedido<?php echo $id;?>"><i class="fa fa-plus-square-o"> Nuevo Producto</i></a>

         <!--Modal asigned CNTR-->
         <div class="modal fade" id="agregar_pedido<?php echo $id;?>" tabindex="-1" role="dialog"
             aria-labelledby="scrollmodalLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar Productos</h4>
                     </div>
                     <div class="modal-body">
                         <div class="card border">
                             <div class="card-body">
                                 <form action="../actions/agregar_add2.php" method="POST" enctype="multipart/form-data">
                                     <div class="row">
                                         <div class="col-sm-5 mx-auto">
                                             <div class="form-group">
                                                 <label for="" class="form-control-label">Titulo del producto:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-bars"></i>
                                                     </div>
                                                     <input type="text" name="title" class="form-control" value="">
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Descripción del
                                                     producto:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa  fa-comment-o"></i>
                                                     </div>
                                                     <input type="text" name="description" class="form-control"
                                                         value="">
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Precio del producto:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-dollar"></i>
                                                     </div>
                                                     <input type="number" name="in_ars" class="form-control" value="">
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Proveedor del
                                                     producto:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-user"></i>
                                                     </div>
                                                     <select name="proveedor[]" id="selectSm"
                                                         class="form-control form-control">
                                                         <option value="">-.Seleccionar Proveedor.-</option>
                                                         <?php
                                                        $query_proveedor = $conn -> query ("SELECT * FROM `proveedor`");
                                                                while ($proveedor= mysqli_fetch_array($query_proveedor)) {                                           
                                                                    echo '<option value="'.$proveedor['razon_social'].'">'.$proveedor['razon_social'].'</option>';
                                                                }  
                                                    ?>
                                                     </select>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Stock del producto:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-shopping-cart"></i>
                                                     </div>
                                                     <input type="number" name="stock" class="form-control" value="">
                                                 </div>
                                                 <br>

                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-file-image-o"></i><label for=""
                                                             class="form-control-label"> Seleccione imagen del
                                                             producto:</label>
                                                     </div>
                                                     <div class="form-group">
                                                         <div>
                                                             <input type="file" class="form-control" id="imagen"
                                                                 name="imagen" multiple>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                             </div>
                             <div class="row">
                                 <div class="col-sm-4"></div>
                                 <div class="col-sm-4" style="text-align: center;">
                                     <button type="submit" name="agregar_producto" id="agregar"
                                         class="btn btn-primary">Agregar</button>
                                 </div>
                                 <div class="col-sm-4"></div>
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



 <?php include('../fijos/footer.php');?>