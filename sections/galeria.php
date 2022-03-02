<section id="gallery" class="gallery">
    <div class="container-fluid">
        <div class="section-title">
            <h2>Algunas imágenes de nuestros <span>Productos</span></h2>
            <p>Sabores que compartimos</p>
        </div>
        <div class="row no-gutters">
            <?php 
            
            $query = "SELECT * FROM `galeria`";
            $result = mysqli_query($conn, $query);

            
            while ($row = mysqli_fetch_array($result)) { 
                                                          
               
           
            
            ?>
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="http://localhost/laboratoriomacanudo/assets/img/gallery/<?php echo $row['img'];?>" class="venobox" data-gall="gallery-item">
                        <img src="assets/img/slide/Galeria/<?php echo $row['img'];?>" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            <?php } ?>
           
        </div>
    </div>
</section><!-- End Gallery Section -->