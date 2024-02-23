<?php
$url = 'http://127.0.0.1:8000/api/tipoPicadaEspecial';
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

foreach ($picadas as $picada) {
    $id = $picada['id'];
    $titulo = $picada['tipo'];
    $descripcion = $picada['description'];
    $activo = $picada['activo'];
    $imagen = $picada['imagen'];
}
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
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
    /* Ajusta el espaciado según tu preferencia */
    border-radius: 10px;
    /* Agrega bordes redondeados si lo deseas */
    margin-bottom: 5px;
    color: white;
    /* Cambia el color del texto según tu preferencia */
}
</style>

<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" id="closePopup">&times;</span>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/picadas_especiales/box-macanuda.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="text-background">
                            <h1>Dia del padre</h1>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                        <a href="control/forms/pedido.php?id_modal=<?php echo $id; ?>" class="btn btn-warning">Arma tu
                            Pedido</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/tipo/duela.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="text-background">
                            <h1>Dia de la madre</h1>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                        <a href="control/forms/pedido.php?id_modal=<?php echo $id; ?>" class="btn btn-warning">Arma tu
                            Pedido</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/picadas_especiales/box-macanuda.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="text-background">
                            <h1>Dia de los enamorados</h1>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        <a href="control/forms/pedido.php?id_modal=<?php echo $id; ?>" class="btn btn-warning">Arma tu
                            Pedido</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
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