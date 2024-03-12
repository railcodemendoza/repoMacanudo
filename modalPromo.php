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
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 800px; /* Ajusta según tus necesidades */
        background-color: rgba(0, 0, 0, 0.8);
        text-align: center;
        color: white;
        padding: 20px;
        box-sizing: border-box;
    }

    .popup-text {
        position: relative; /* Cambia a relativo para que el texto no se salga del contenedor */
        padding: 20px;
        color: white;
    }

    .close {
        z-index: 4;
        position: absolute;
        top: 10px;
        left: 10px; /* Ajusta la posición izquierda según tus necesidades */
        font-size: 20px;
        cursor: pointer;
        color: white;
    }

    .carousel-item img {
        max-width: 100%;
        max-height: 450px; /* Establece la altura máxima que desees */
        object-fit: contain; /* Ajusta las imágenes del carrusel de la misma manera */
    }
    

    @media (max-width: 768px) {
        .popup-content {
            width: 90%;
            height: auto;
        }
       
    }
</style>

<div id="popup" class="popup" >
    <div class="popup-content">
        <span class="close" id="closePopup"><strong>X</strong></span>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php foreach ($picadas as $index => $picada): ?>
                    <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                        <img src="<?php echo $urlApi;?>/storage/picadas/<?php echo $picada['imagen']; ?>" alt="...">
                        <div class="popup-text">
                            <h1><?php echo $picada['title_especial']; ?></h1>
                            <p><?php echo $picada['comentario_especial']; ?></p>
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