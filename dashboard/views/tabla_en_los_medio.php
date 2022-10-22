<?php

include('../db.php');

include('../fijos/header.php'); 

include('../fijos_user/pannel_left_super_user.php'); 

include('../fijos/pannel_right.php'); 

?>

<section id="specials" class="specials">
    <div class="container">
        <div class="section-title">
            <h2>Picadas Macanudas en <span>los medios</span></h2>
            <p>Estamos en los medios y participamos de diferentes eventos.</p>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <?php
                    $query_medios1 = "SELECT * FROM `medios`";
                    $result_medios1 = mysqli_query($conn, $query_medios1);

                    while ($row = mysqli_fetch_assoc($result_medios1)) {

                        $id = $row['id'];
                        $titulo = $row['titulo'];
                       
                        if ($id == "1") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab"
                                href="#tab-<?php echo $id; ?>"><?php echo $titulo; ?></a>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-<?php echo $id; ?>"><?php echo $titulo; ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    <?php
                    $query_medios2 = "SELECT * FROM `medios`";
                    $result_medios2 = mysqli_query($conn, $query_medios2);

                    while ($row = mysqli_fetch_assoc($result_medios2)) {

                        $id = $row['id'];
                        $titulo = $row['titulo'];
                        $subtitulo = $row['subtitulo'];
                        $link = $row['link'];
                        $desc = $row['descripcion'];
                        $img = $row['img'];
                        if ($id == "1") {?>
                            <div class="tab-pane active show" id="tab-<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3><?php echo $titulo; ?></h3>
                                        <p class="font-italic"><?php echo $subtitulo; ?></p>
                                        <p><?php echo $desc; ?></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="../../assets/img/<?php echo $img; ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        <?php }elseif(empty($link)){ ?>
                            <div class="tab-pane" id="tab-<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3><?php echo $titulo; ?></h3>
                                        <p class="font-italic"><?php echo $subtitulo; ?></p>
                                        <p><?php echo $desc; ?></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="../../assets/img/<?php echo $img; ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="tab-pane" id="tab-<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3><?php echo $titulo; ?></h3>
                                        <p class="font-italic"><?php echo $subtitulo; ?></p>
                                        <p><?php echo $desc; ?></p>
                                    </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <a href="<?php echo $link; ?>" target="_blank">
                                        <img src="../../assets/img/<?php echo $img; ?>" alt="" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container mb-5">
    <div class="d-flex text-center">
        <div class="col-sm-8 mx-auto">
            <br>
        <?php 
        $query_medios2 = "SELECT * FROM `medios`";
        $result_medios2 = mysqli_query($conn, $query_medios2);
        while($rows = mysqli_fetch_assoc($result_medios2)){ ?>
        <a href="formMedios.php?id=<?php echo $rows['id']; ?>" class="a btn btn-outline-primary mr-5">Editar
        <?php echo $rows['titulo']; ?> </a>
        <br>
        <br>
        <?php } ?>
        </div>
    </div>
</div>
<?php include('../fijos/footer.php');?>