<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Inicio
        </div>
        <div class="card-body card-block">
            <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
            </div>
            <table id="bootstrap-data-table responsive" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                    </tr>

                    <?php       
                    $query = "SELECT * FROM `head`"  ;
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)) { 

                      $id = $row['id'];
                      $imagen = $row['img'];
                      $descripcion = $row['descripcion'];
                      ?>

                    <tr>
                        <td><?php echo $id;?></td>
                        <td><img style="width: 25%;" src="../../assets/img/slide/<?php echo $imagen;?>" alt=""></td>
                        <td><?php echo $descripcion;?></td>

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
                                                    id="scrollmodalLabel">Detalles del Head.</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align:center;"> <strong> Descripcion:
                                                                    </strong> <br><?php echo $descripcion;?> </h4>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">
                                                                <h4 style="text-align:center;"> <strong> Imagen:
                                                                    </strong> <br><img style="width: 80%;" src="../../assets/img/slide/<?php echo $imagen;?>" alt="">
                                                                    </h4>
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
                                    href="../actions/delete_head.php?id=<?php echo $id;?>&ruta=<?php echo $imagen ?>" type="button"><i class="fa fa-trash"></i></a>
                                <!--Modal asigned CNTR-->
                                <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 style="text-align:center;" class="modal-title"
                                                    id="scrollmodalLabel">Editar Head</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form
                                                            action="../actions/editar_head.php?id=<?php echo $id;?>&ruta=<?php echo $imagen ?>"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-sm-5 mx-auto">
                                                                    <div class="form-group">
                                                                        <label for="" class="form-control-label">Datos:</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-bars"></i>
                                                                            </div>
                                                                            <input type="text" name="descripcion"
                                                                                class="form-control"
                                                                                value="<?php echo $descripcion;?>">
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
                                                                                        class="form-control" id="imagen"
                                                                                        name="imagen" multiple>
                                                                                        <?php
                                                                                            echo "Imagen Actual: $imagen ";
                                                                                            echo "<img src='../../assets/img/slide/$imagen' width='70%' />";
                                                                                        ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4"></div>
                                                                <div class="col-sm-4" style="text-align: center;">
                                                                    <button type="submit" name="editar" id="editar"
                                                                        class="btn btn-success ">Modificar</button>
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
                <a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#agregar"><i
                        class="fa fa-hand-o-right"></i> Agregar Head</a>
                <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar
                                   Head</h4>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="../actions/agregar_head.php" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-5 mx-auto">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Datos del Head:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-bars"></i>
                                                            </div>
                                                            <input type="text" name="descripcion" class="form-control"
                                                                placeholder="Descripcion del Head">
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <label>Seleccione imagen a cargar</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <div>
                                                                    <input type="file" class="form-control" id="imagen"
                                                                        name="imagen" multiple>
                                                                </div>
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