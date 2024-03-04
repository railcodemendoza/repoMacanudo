<?php include("db.php"); ?>
<?php include ("variables.php");?>
<?php
$url = $urlApi.'api/tipoPicadaEspecial';
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
echo $response;
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
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 100%;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .text-background {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 5px;
        color: white;
    }

    /* Estilos para hacer la imagen responsive */
    .carousel-item img {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .popup-content {
            height: 10rem;
            width: 90%;
        }
    }
</style>


<div id="popup" class="popup" style="display: none;">
    <div class="popup-content">
        <span class="close" id="closePopup" style="color: red;"><strong>X</strong></span>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php foreach ($picadas as $index => $picada): ?>
                    <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                        <img src="<?php echo $urlApi;?>storage/picadasEspeciales/<?php echo $picada['imagen']; ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="text-background">
                                <h1><?php echo $picada['tipo']; ?></h1>
                                <p><?php echo $picada['description']; ?></p>
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
