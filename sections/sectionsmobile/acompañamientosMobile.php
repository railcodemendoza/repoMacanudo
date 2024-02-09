<!-- ======= Events Section ======= -->
<section id="events" class="events">
    <div class="container">
        <div class="section-title">
            <h2>Acompañá bien nuestras <span>picadas</span></h2>
        </div>
        <div class="owl-carousel events-carousel">
            <?php
            $query_add2 = "SELECT * FROM `add2`";
            $result_add2 = mysqli_query($conn, $query_add2);

            while ($row = mysqli_fetch_assoc($result_add2)) {

                $img = $row['img'];
                $title = $row['title'];
                $proveedor = $row['proveedor'];
                $description = $row['description'];
                $in_ars = $row['in_ars'];

            ?>
                <div class="row event-item">
                    <div class="col-lg-6">
                        <img src="assets/img/add2/<?php echo $img; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h2><?php echo $title; ?></h2>

                        <p class="font-italic">by: <span><?php echo $proveedor; ?></span></p>
                        <p>
                            <br>
                            <?php echo $description; ?>
                        </p>
                        <h3>$ <strong><?php echo $in_ars; ?></strong></h3>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>