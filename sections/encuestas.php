<section id="specials" class="specials bg-light" >
            <div class="container">
                <div class="section-title pb-0">
                    <h2>La opinion de nuestros <span>Clientes Felices</span></h2>

                    <hr>
                </div>
                <div class="owl-carousel events-carousel">
                    <?php
                     $conn2 = mysqli_connect(
                        '193.203.175.53', //193.203.175.53
                        'u101685278_pachimanok', //  u101685278_labmac
                        'Pachiman9102', // Rail2021
                        'u101685278_macanudas' // u101685278_labmac
                    );
                    $query_satisfaction = "SELECT satisfaction_servicio, product, cnee, comentario_pagina  FROM `general` WHERE pagina = 'si' ORDER BY created_at DESC LIMIT 5";
                    $result_satifaction = mysqli_query($conn2, $query_satisfaction);

                    while ($rows = mysqli_fetch_assoc($result_satifaction)) {

                        $servicio = $rows['satisfaction_servicio'];
                        $profuct = $rows['product'];
                        $cnee = $rows['cnee'];
                        $comentario = $rows['comentario_pagina'];

                        if ($servicio == 1) {
                            $servicio = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                        } elseif ($servicio == 2) {
                            $servicio = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                        } elseif ($servicio == 3) {
                            $servicio = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                        } elseif ($servicio == 4) {
                            $servicio = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-secondary " ></i>';
                        } else {
                            $servicio = '<i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning p-1" ></i></i><i class="fa fa-star text-warning p-1" ></i><i class="fa fa-star text-warning " ></i>';
                        }
                    ?>
                        <div class="row event-item">
                            <div class="col-lg-8 mx-auto">
                                <div class="row">
                                    <div class="col-sm-3 mx-auto" style="text-align: center;">
                                        <?php echo $servicio; ?>
                                    </div>
                                </div>
                                <br>
                                <p style="text-align: center;"><?php echo $comentario; ?></p>
                                <p class="font-italic mb-0" style="text-align: center;">
                                    <strong><?php echo $cnee; ?></strong></span>
                                </p>
                                <p class="font-italic" style="text-align: center;"><?php echo $profuct; ?></span></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <hr>
            </div>

        </section>