 
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
           Stock de Insumos
        <div class="card-body card-block">
        <div class="dataTables_info reponsive" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                <thead style="text-align: center;">
                  <tr>
                    <th>id</th>
                    <th>Titulo</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>P. Vta</th>
                    <th>Costo</th>
                    <th>Opciones</th>
                  </tr>
                  <?php
                    $query = "SELECT * FROM `add5`" ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 
                      
                      $id = $row['id'];
                      $title = $row['title'];
                      $q = $row['q'];
                      $proveedor = $row['proveedor'];
                      $in_ars = $row['in_ars'];
                      $out_ars = $row['out_ars'];
                      $description = $row['description'];                 
                      ?>

                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $title?></td>
                    <td><?php echo $proveedor;?></td>
                    <td><?php echo $q;?></td>
                    <td><?php echo $in_ars;?></td>
                    <td><?php echo $out_ars;?></td>
                    <td><?php echo $description;?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button"  data-toggle="modal" data-target="#ver<?php echo $id;?>"><i class="fa fa-eye"></i></a>
                          
                          <!--Modal asigned CNTR-->
                          <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Detalles del Producto<strong><?php echo $title;?></strong></h4>    
                                </div>
                                <div class="modal-body">
                                  <div class="card border">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align:center;"> <strong> Producto: </strong> <?php echo $title ; ?> </h4>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Descrición: </strong></h4>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"><?php echo $description;?></h4>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Precio Venta: </strong> <?php echo $in_ars ; ?> </h4>
                                        </div>
                                      </div>
                                      
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Costo: </strong> <?php echo $out_ars ; ?> </h4>
                                        </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" > 
                                          <h4 style="text-align: center;"> <strong> Cantidad: </strong> <?php echo $q ; ?> </h4>
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
                        <a class="btn btn-primary" title="Agregar pedido" href="#" type="button"  data-toggle="modal" data-target="#agregar_pedido<?php echo $id;?>"> <i class="fa fa-plus-square-o"></i> </a>
                           <!--Modal asigned CNTR-->
                          <div class="modal fade" id="agregar_pedido<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Agregar Productos <strong><?php echo $title;?></strong></h4>    
                                </div>
                                <div class="modal-body">
                                  <div class="card border">
                                    <div class="card-body">
                                      <form action="../actions/agregar_add5.php?id=<?php echo $id;?>&vista=insumos" method="POST">
                                        <div class="row">
                                          <div class="col-sm-5 mx-auto">
                                          <div class="form-group">
                                            <label for="" class="form-control-label">Datos del pedido</label>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                              </div>
                                              <select name="proveedor[]" id="selectSm" class="form-control form-control">
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
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-file-text-o"></i>
                                              </div>
                                              <input type="text" name="invoice" class="form-control" placeholder="A-000012">
                                            </div>
                                            <br>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-shopping-cart"></i>
                                              </div>
                                              <input type="number" name="cantidad" class="form-control" placeholder="12">
                                            </div>
                                            
                                            <br>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                              </div>
                                              <input type="number" name="out" class="form-control" placeholder="500.00">
                                            </div>
                                            <small class="form-text text-muted">solo correspondiente a este item</small>
                                            </div>
                                          </div>
                                      </div> 
                                      <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4" style="text-align: center;">
                                          <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
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
                          <a class="btn btn-primary" title="editar Item" href="#" type="button"  data-toggle="modal" data-target="#editar_item<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
                           <!--Modal asigned CNTR-->
                          <div class="modal fade" id="editar_item<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Agregar Productos <strong><?php echo $title;?></strong></h4>    
                                </div>
                                <div class="modal-body">
                                  <div class="card border">
                                    <div class="card-body">
                                      <form action="../actions/editar_add5.php?id=<?php echo $id;?>&vista=insumos" method="POST">
                                        <div class="row">
                                          <div class="col-sm-5 mx-auto">
                                            <div class="form-group">
                                              <label for="" class="form-control-label">Editar Items</label>
                                              <br>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-shopping-cart"></i>
                                                </div>
                                                  <input type="text" name="title" class="form-control" value="<?php echo $title;?>"> 
                                              </div>
                                              <br>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-stack-exchange"></i>
                                                </div>
                                                  <input type="text" name="description" class="form-control" value="<?php echo $description;?>"> 
                                              </div>
                                              <br>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-dollar"></i>
                                                </div>
                                                <input type="number" name="in" style="border-color: #2fc5d9;" class="form-control" value="<?php echo $in_ars;?>">
                                              </div>
                                              <small class="form-text text-muted">precio de venta unitario</small>
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-dollar"></i>
                                                </div>
                                                <input type="number" name="out" style="border-color: #d92f37;" class="form-control" value="<?php echo $out_ars;?>">
                                              </div>
                                              <small class="form-text text-muted">costo unitario</small>
                                            </div>
                                          </div>
                                        </div>
                                      <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4" style="text-align: center;">
                                          <button type="submit" name="actualizar" id="actualizar" class="btn btn-primary">Actualizar</button>
                                        </div>
                                      <div class="col-sm-4"></div>
                                    </form>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--Final Modal View CNTR-->

                        <!--a class="btn btn-primary" target="_blank" href="https://api.whatsapp.com/send?phone=54<?php echo $cel_phone;?>&text=Hola,%20te%20escribo%20de%20Picadas%20Macanudas"title="Contactar" href="#"><i class="fa fa-user"></i></a-->
                      </div>
                    </td>
                  </tr>
                  
                </tbody>
                    <?php };?>
                    </table>
        </div>
        <form action="../report/report_insumos.php" method="POST">
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

            