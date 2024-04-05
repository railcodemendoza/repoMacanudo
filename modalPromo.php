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
        max-width: 700px; /* Ajusta según tus necesidades */
        background-color: rgb(176, 141, 87);
        text-align: center;
        color: white;
        padding: 5px;
        box-sizing: border-box;
        overflow-y: auto; /* Añade desplazamiento vertical si el contenido es demasiado largo */
        border-radius: 15px;
    }
   
    .carousel-item img {
        max-width: 100%;
        height: auto; /* Para mantener la relación de aspecto */
        object-fit: cover; /* Utiliza cover para llenar el espacio y mantener la relación de aspecto */
        border-radius: 15px;
    }

    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.8);
        padding: 20px;
        margin-top: 10px;
        border-radius: 15px;
    }

    .btn-warning {
        font-size: 30px;
        background-color: rgb(176, 141, 87);
    }

    @media (max-width: 768px) {
        .popup-content {
            width: 90%;
            height: auto;
            max-height: 90vh;
        }
        
        .carousel-caption {
            position: sticky;
            margin-top: 25px;
            background-color: rgba(0, 0, 0, 0.9);
        }
    }
</style>

<div id="popup" class="popup">
    <div class="popup-content">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php foreach ($picadas as $index => $picada): ?>
                    <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                        <img src="<?php echo $urlApi;?>/storage/picadas/<?php echo $picada['imagen']; ?>" alt="...">
                        <div class="carousel-caption ">
                            <h1><?php echo $picada['title_especial']; ?></h1>
                            <p><?php echo $picada['comentario_especial']; ?></p>
                            <a href="control/forms/pedido.php?id_modal=<?php echo $picada['id']; ?>" class="btn btn-warning btn-lg">Realizar Pedido</a>
                            <div >
                                <button style="margin-top: 10px;" class="btn btn-light btn-sm" id="closePopup">X</button>
                            </div>
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