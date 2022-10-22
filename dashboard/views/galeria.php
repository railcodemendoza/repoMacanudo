<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid text-center">
    <h2>Galeria</h2>
    <p><small>vista previa:</small></p>
    <div class="row no-gutters">
        <?php 
            
            $query = "SELECT * FROM `galeria`";
            $result = mysqli_query($conn, $query);
            
            while ($row = mysqli_fetch_array($result)) { 
                $id = $row['id'];
                $imagen = $row['img'];                                                    
            ?>
        <div class="col-lg-3 col-md-4">
            <div class="gallery-item">

                <img src="../../assets/img/slide/Galeria/<?php echo $imagen; ?>" alt="" class="img-fluid">
                <a class="btn btn-danger" title="Eliminar"
                    href="../actions/delete_galeria.php?id=<?php echo $id;?>&ruta=<?php echo $imagen; ?>"
                    type="button"><i class="fa fa-trash"></i></a>
                <a class="btn btn-primary" title="Ver Galeria" href="#" type="button" data-toggle="modal"
                    data-target="#ver<?php echo $id;?>"><i class="fa fa-eye"></i></a>
                <!--Modal asigned CNTR-->
                <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog"
                    aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Imagen de la
                                    Galeria.</h4>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <h4 style="text-align:center;"> <strong> Imagen:
                                                    </strong>
                                                </h4>
                                                <br>
                                                <img style="width: 90%;"
                                                        src="../../assets/img/slide/Galeria/<?php echo $imagen;?>"
                                                        alt="">
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

            </div>
            <br>
        </div>
        <?php } ?>

    </div>
    <div class="row">
        <div class="col-sm-5 mx-auto text-center mt-4 mb-5">
            <a class="btn btn-success btn-lg pl-5 pr-5 text-white" title="Agregar imagen" data-toggle="modal"
                data-target="#agregar_imagen">Agregar Imagen</a>
        </div>
    </div>
    <!--Modal asigned CNTR-->
    <div class="modal fade" id="agregar_imagen" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar Imagen</h4>
                </div>
                <div class="modal-body">
                    <div class="card border">
                        <div class="card-body">
                            <form action="../actions/agregar_galeria.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-5 mx-auto">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-file-image-o"></i><label for=""
                                                        class="form-control-label"> Seleccione imagen a cargar:</label>
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
                                <button type="submit" name="agregar_imagen" id="agregar"
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


<?php include('../fijos/footer.php');?>