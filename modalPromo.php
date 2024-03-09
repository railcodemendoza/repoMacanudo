<?php include ("variables.php");?>
<?php
$url = $urlApi.'/api/tipoPicadaEspecial';
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
curl_close($curl);
$picadas = json_decode($response, true);

// Verificar si hay picadas disponibles
$hayPicadas = !empty($picadas);
?>


<style>
    .popup {
  z-index: 4500;
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
}

.popup-content {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  max-width: 800px; /* Ancho máximo del modal */
  transform: translate(-50%, -50%);
  background: #fff; /* Fondo del modal */
  border-radius: 10px; /* Bordes redondeados */
  overflow: hidden;
  height: 80%; /* Ajusta el valor según tus necesidades */
}

.popup-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: white;
  z-index: 2; 
  width: 90%; /* Ajusta el ancho del texto según tus necesidades */
  background-color: rgba(0, 0, 0, 0.5);
  padding: 20px; /* Añade un relleno para mejorar la apariencia */
  border-radius: 10px; /* Bordes redondeados */
}

#imagen {
  max-width: 100%;
  height: auto;
  border-radius: 10px 10px 0 0; /* Bordes redondeados solo en la parte superior */
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
  color: black;
  z-index: 3;
}

.carousel-item img {
  max-width: 80%;
  height: auto;
}

/* Media queries para ajustar la visualización en pantallas pequeñas */

@media (max-width: 768px) {
  .popup-content {
    width: 95%;
    height: 70%; /* Ajusta la altura en pantallas más pequeñas */
  }
  .popup-text {
    position: static;
    transform: none;
  }
}
</style>



<div id="popup" class="popup" style="display: none;">
    <div class="popup-content">
        <span class="close" id="closePopup"><strong>X</strong></span>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php foreach ($picadas as $index => $picada): ?>
                    <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                        <img src="<?php echo $urlApi;?>/storage/picadas/<?php echo $picada['imagen']; ?>" class="d-block w-100" alt="..." id="imagen">
                        <div class="popup-text">
                            <div class="text-background">
                                <h1><?php echo $picada['title_especial']; ?></h1>
                                <p><?php echo $picada['comentario_especial']; ?></p>
                            </div>
                            <a href="control/forms/pedido.php?id_modal=<?php echo $picada['id']; ?>" class="btn btn-warning">Arma tu Pedido</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener el botón y el modal
        var popup = document.getElementById('popup');
        var closeButton = document.getElementById('closePopup');

        <?php if ($hayPicadas): ?>
            popup.style.display = 'block';
        <?php endif; ?>

        closeButton.addEventListener('click', function() {
            popup.style.display = 'none';
        });
    });
</script>
