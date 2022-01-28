<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Promociones
        </div>
        <div class="card-body card-block">
            <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
            </div>
            <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Descuento</th>
                        <th>Activo</th>
                        <th>Opciones</th>
                    </tr>

                    <?php       
                    $query = "SELECT * FROM `promociones`"  ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $promocion = $row['promocion'];
                      $descuento = $row['descuento'];
                      $activo = $row['activo'];
                      $fecha = $row['created_at'];

                      ?>

                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $promocion;?></td>
                        <td><?php echo $descuento;?>%</td>
                        <td><?php if($activo=='1' ){ 
                                echo 'SI';
                                }else{ echo 'NO';}?></td>

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
                                                    id="scrollmodalLabel">Detalles de Promoción.</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align:center;"> <strong> Titulo:
                                                                    </strong> <br><?php echo $promocion;?> </h4>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align: center;"> <strong> Descuento:
                                                                    </strong><br> <?php echo  $descuento . '%';?> </h4>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align: center;"> <strong> Fecha de creación:
                                                                    </strong><br> <?php echo  $fecha;?> </h4>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align: center;"> <strong> Activo:
                                                                    </strong><br> <?php    if($activo=='1' ){ 
                                                                                            echo 'SI';
                                                                                            }else{ echo 'NO';}?> </h4>
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
                                <a class="btn btn-primary" title="Editar" href="#" type="button" data-toggle="modal"
                                    data-target="#editar<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" title="Eliminar"
                                    href="../actions/delete_promocion.php?id=<?php echo $id;?>" type="button"><i
                                        class="fa fa-trash"></i></a>
                                <!--Modal asigned CNTR-->
                                <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align:center;" class="modal-title"
                                                    id="scrollmodalLabel">Editar Promoción</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form
                                                            action="../actions/editar_promocion.php?id=<?php echo $id;?>"
                                                            method="POST">
                                                            <div class="row">
                                                                <div class="col-sm-5 mx-auto">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Datos
                                                                            de la Promoción:</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-bars"></i>
                                                                            </div>
                                                                            <input type="text" name="promocion"
                                                                                class="form-control"
                                                                                value="<?php echo $promocion;?>">
                                                                        </div>
                                                                        <br>

                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-dollar"></i>
                                                                            </div>
                                                                            <input type="number" name="descuento"
                                                                                class="form-control"
                                                                                value="<?php echo $descuento;?>">
                                                                        </div>
                                                                        <br>
                                                                        <!--PONER BONITO-->
                                                                        <div class="input-group">
                                                                            <label class="form-check-label"
                                                                                for="flexCheckDefault">
                                                                                ACTIVO
                                                                            </label>
                                                                            <div class="form-check ">
                                                                                <?php if($activo=='1' ){ ?>
                                                                                <input name="activo"
                                                                                    class="form-check-input"
                                                                                    type="checkbox" value="1" checked>
                                                                                <?php } else{ ?>
                                                                                <input name="activo"
                                                                                    class="form-check-input"
                                                                                    type="checkbox" value="1">
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <!--PONER BONITO-->
                                                                        <br>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4"></div>
                                                                <div class="col-sm-4" style="text-align: center;">
                                                                    <button type="submit" name="editar" id="editar"
                                                                        class="btn btn-primary">Cambiar</button>
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

        <div class="row" style="text-align: center;">
            <div class="col-sm-4 mx-auto">
                <a class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#agregar"><i
                        class="fa fa-hand-o-right"></i> Promoción</a>



                <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar
                                    Promoción</h4>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="../actions/agregar_promocion.php" method="POST">
                                            <div class="row">
                                                <div class="col-sm-5 mx-auto">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Datos de la
                                                            Promoción:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-bars"></i>
                                                            </div>
                                                            <input type="text" name="promocion" class="form-control"
                                                                placeholder="Nombre de la Promoción">
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-dollar"></i>
                                                            </div>
                                                            <input type="number" name="descuento" class="form-control"
                                                                placeholder="10%">
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="form-check ">
                                                                <input name="activo" class="form-check-input"
                                                                    type="checkbox" value="1">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    ACTIVO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 mx-auto" style="text-align: center;">
                                                    <button type="submit" name="agregar" id="agregar"
                                                        class="btn btn-primary">Agregar</button>
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