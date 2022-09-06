<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<!--Cotizador del tipo tabla de pícada-->
<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Detalles de la Tabla Picada
        </div>
        <div class="card-body card-block">
            <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
            </div>
            <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>

                    <?php       
                    $query = "SELECT * FROM `tablas`"  ;
                    $result = mysqli_query($conn, $query);                        
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $titulo = $row['titulo'];
                      $precio = $row['precio'];

                      ?>

                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $titulo;?></td>
                        <td><?php echo $precio;?></td>

                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" title="Ver Detalle" href="#" type="button"
                                    data-toggle="modal" data-target="#verTablaPicada<?php echo $id;?>"><i
                                        class="fa fa-eye"></i></a>

                                <!--Modal VER PICADA -->
                                <div class="modal fade" id="verTablaPicada<?php echo $id;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align:center;" class="modal-title"
                                                    id="scrollmodalLabel">Detalles de la Tabla Picada.</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align:center;"> <strong> Título:
                                                                    </strong> <br><?php echo $titulo;?> </h4>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align: center;"> <strong> Precio:
                                                                    </strong><br> <?php echo '$'. $precio;?> </h4>
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
                                    data-target="#editarTablaPicada<?php echo $id;?>"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" title="Eliminar"
                                    href="../actions/delete_cotizador_tabla_picada.php?id=<?php echo $id;?>"
                                    type="button"><i class="fa fa-trash"></i></a>
                                <!--Modal editar  tipo de picada-->
                                <div class="modal fade" id="editarTablaPicada<?php echo $id;?>" tabindex="-1"
                                    role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align:center;" class="modal-title"
                                                    id="scrollmodalLabel">Editar Tabla de Picada</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form
                                                            action="../actions/editar_cotizador_tabla_picada.php?id=<?php echo $id;?>"
                                                            method="POST">
                                                            <div class="row">
                                                                <div class="col-sm-5 mx-auto">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Datos
                                                                            Tabla de Picada:</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-bars"></i>
                                                                            </div>
                                                                            <input type="text" name="titulo"
                                                                                class="form-control"
                                                                                value="<?php echo $titulo;?>">
                                                                        </div>
                                                                        <br>
                                                                        <label for="" class="form-control-label">Precio
                                                                            Tabla de Picada:</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-dollar"></i>
                                                                            </div>
                                                                            <input type="number" name="precio"
                                                                                class="form-control"
                                                                                value="<?php echo $precio;?>">
                                                                        </div>
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
        <a class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#agregarTablaPicada"><i
                class="fa fa-hand-o-right"></i> Agregar Tabla de Picada</a>
        <div class="modal fade" id="agregarTablaPicada" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar Tabla de Picada
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="../actions/agregar_cotizador_tabla_picada.php" method="POST">
                                    <div class="row">
                                        <div class="col-sm-5 mx-auto">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Datos de la Tabla de Picada:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="text" name="titulo" class="form-control"
                                                        placeholder="Nombre del Tipo de Picada">
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Precio:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                    <input type="number" name="precio" class="form-control"
                                                        placeholder="230.00">
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



<?php include('../fijos/footer.php');?>