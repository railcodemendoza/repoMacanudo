<?php
$query = "SELECT * FROM picadas_especiales";
$result = mysqli_query($conn, $query);

while ($row = $result->fetch_array()) {
    $id = $row['id'];
    $titulomodal[$id] = $row['titulo'];
    $descripcion[$id] = $row['descripcion'];
    $activo[$id] = $row['activo'];
    $preciomodal[$id] = $row['precio'];
    $imagen[$id] = $row['imagen'];
}
while ($id > 0) {
    if (isset($activo[$id])) {
        if ($activo[$id] == 1) {
?>
<script src="assets/vendor/jquery/jquery.min.js "></script>
<script>
$(document).ready(function() {

    function showPopup() {
        $('.pop-up').addClass('show');
        $('.pop-up-wrap').addClass('show');
    }

    $("#close").click(function() {
        $('.pop-up').removeClass('show');
        $('.pop-up-wrap').removeClass('show');
    });

    $(".btn-abrir").click(showPopup);

    setTimeout(showPopup, 1000);

});
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="assets/css/style_modal.css" rel="stylesheet">
<style>
.pop-up {
    z-index: 4500;
}

.pop-up-title {
    height: 430px;
    max-width: 350px;
    z-index: 7000;
    background-image: url('assets/img/picadas_especiales/<?php echo $imagen[$id]; ?>');
}
</style>
<div class="pop-up">
    <div class="pop-up-wrap">
        <div class="pop-up-title">
        </div>
        <div class="subcription">
            <div class="line"></div>
            <i class="bi bi-x-circle" id="close"></i>
            <div class="sub-content">
                <h2><?php echo $titulomodal[$id] ?></h2>
                <p><?php echo $descripcion[$id] ?></p>
                <a href="control/forms/forms_retiros_especial.php?id_modal=<?php echo $id; ?>" class="subs-send">Pedido
                    con retiro</a>
                <a href="control/forms/forms_envios_especial.php?id_modal=<?php echo $id; ?>" class="subs-send">Pedido
                    con envio</a>
            </div>
            <div class="line"></div>
        </div>
    </div>
</div>
<?php
        }
    }
    $id--;
}
?>