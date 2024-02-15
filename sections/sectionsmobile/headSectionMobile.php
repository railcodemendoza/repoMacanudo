<section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->

                    <?php
                    $query_medios1 = "SELECT * FROM `head`";
                    $result_medios1 = mysqli_query($conn, $query_medios1);

                    while ($row = mysqli_fetch_assoc($result_medios1)) {

                        $id = $row['id'];
                        $img = $row['img'];
                        $descrip = $row['descripcion'];
                    
                        if ($id == "1") {
                        ?>
                    <div class="carousel-item active" style="background: url(assets/img/slide/<?php echo $img; ?>); background-size: 100% 100%;">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <img style="width: 60%;" src="assets/img/MCND_Logo_2160_WHITE.png" alt="">
                                <p class="animate__animated animate__fadeInUp"><?php echo $descrip; ?></p>
                                <div>
                                    <a href="control/forms/forms_envios.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Arma tu Pedido</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background: url(assets/img/slide/<?php echo $img; ?>); background-size: 100% 100%;">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <img style="width: 60%;" src="assets/img/MCND_Logo_2160_WHITE.png" alt="">
                                <p class="animate__animated animate__fadeInUp"><?php echo $descrip; ?></p>
                                <div>
                                    <a href="control/forms/forms_envios.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Arma tu Pedido</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                    
                </div>
                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section><!-- End Hero -->