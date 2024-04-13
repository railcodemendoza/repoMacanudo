<?php

if ($a == 0) {


    $query_QS = "SELECT * FROM `quienes_somos` WHERE id = 1";
    $resultQS = mysqli_query($conn, $query_QS);

    $rowQS = mysqli_fetch_array($resultQS);

    $query_M = "SELECT * FROM `quienes_somos` WHERE id = 2";
    $resultM = mysqli_query($conn, $query_M);

    $rowM = mysqli_fetch_array($resultM);

    $query_O = "SELECT * FROM `quienes_somos` WHERE id = 3";
    $resultO = mysqli_query($conn, $query_O);

    $rowO = mysqli_fetch_array($resultO);

    $querya = "SELECT * FROM `quienes_somos` WHERE id = 1";
    $result = mysqli_query($conn, $querya);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $desc = $row['descripcion'];
        $titModal = $row['titulo_2'];
        $descModal = $row['descripcion_2'];
        $check = $row['activo'];
        $imgModal = $row['imagen'];
        $desc2Modal = $row['epigrafe'];
    }
    $querya = "SELECT * FROM `quienes_somos`";
    $result1 = mysqli_query($conn, $querya);
} else {

    $query_QS = "SELECT * FROM `quienes_somos` WHERE id = 1";
    $resultQS = mysqli_query($conn, $query_QS);

    $rowQS = mysqli_fetch_array($resultQS);

    $query_M = "SELECT * FROM `quienes_somos` WHERE id = 2";
    $resultM = mysqli_query($conn, $query_M);

    $rowM = mysqli_fetch_array($resultM);

    $query_O = "SELECT * FROM `quienes_somos` WHERE id = 3";
    $resultO = mysqli_query($conn, $query_O);

    $rowO = mysqli_fetch_array($resultO);

   
}
?>

<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5" style="padding: 0px;">
                <img src="<?php
                                if($a == 0){
                                    echo '../../assets/img/quienes_somos/' . $rowO['imagen'];
                                
                                }else{
                                    echo 'assets/img/quienes_somos/' . $rowO['imagen'];
                                }
                                
                            ?>" class="img-fluid" alt="" style=" object-fit: cover;">
            </div>
            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
                <div class="content">
                    <h3 style="color: #ffb03b;"><strong><?php echo $rowQS['titulo']; ?></strong></h3>
                    <p><?php echo $rowQS['descripcion']; ?></p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-secondary" data-toggle="modal" data-target="#macanudas"><?php echo $rowQS['titulo_2']; ?></button>
                    </div>
                    <br>
                    <h3 style="color: #ffb03b;"><strong><?php echo $rowM['titulo']; ?></strong></h3>
                    <p class="font-italic"><?php echo $rowM['descripcion']; ?></p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-secondary mb-4" data-toggle="modal" data-target="#historia"><?php echo $rowM['titulo_2']; ?></button>
                    </div>
                    <h3><strong><?php echo $rowO['titulo']; ?></strong></h3>
                    <p><?php echo $rowO['descripcion']; ?></p>
                    <div class="modal fade" id="macanudas" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body" style="padding: 0%;">
                                    <br>
                                    <h3 style="text-align: center !important; color: #ffb03b;"><?php echo $rowQS['titulo_2']; ?></h3>
                                    <br>
                                    <p style="margin: 0% 15% 1%; text-align: center;">
                                        <?php echo $rowQS['descripcion_2']; ?></p>

                                    <br>
                                    <img class="img-fluid" style=" object-fit: cover;" src="
                                    <?php
                                if($a == 0){
                                    echo '../../assets/img/quienes_somos/' . $rowQS['imagen'];
                                
                                }else{
                                    echo 'assets/img/quienes_somos/' . $rowQS['imagen'];
                                }
                                
                            ?>" alt="">
                                    <br>
                                    <br>
                                    <hr class="mx-auto"style="width:70%; ">
                                    <p style="margin: 0% 15% 1%; text-align: center;" class="font-italic">
                                        <?php echo $rowQS['epigrafe']; ?>
                                    </p>
                                    <br>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-secondary rounded-circle" data-dismiss="modal">X</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="historia" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body" style="padding: 0%;">
                                    <br>
                                    <h3 style="text-align: center !important; color: #ffb03b;"><?php echo $rowM['titulo_2']; ?>
                                    </h3>
                                    <br>
                                    <img class="img-fluid" style=" object-fit: cover;" src="<?php
                                if($a == 0){
                                    echo '../../assets/img/quienes_somos/' . $rowM['imagen'];
                                }else{
                                    echo 'assets/img/quienes_somos/' . $rowM['imagen'];
                                }
                                
                             ?>" alt="mrecedes">
                                    <br>
                                    <br>
                                    <p style="margin: 0% 15% 5%; text-align: center;"> <?php echo $rowM['descripcion_2']; ?></p>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-secondary rounded-circle" data-dismiss="modal">X</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section><!-- End About Section -->