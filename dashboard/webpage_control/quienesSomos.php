<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid text-center">
    <h2>Sección Quienes somos?</h2>
    <p><small>vista previa:</small></p>    
    <iframe src="http://localhost/laboratoriomacanudo/dashboard/quienessomos.php" style="width: -webkit-fill-available;
    height: 37rem;
    border: none;"></iframe>
    <div class="row">
        <div class="col-sm-5 mx-auto text-center mt-4 mb-5">
            <a class="btn btn-primary btn-lg pl-5 pr-5 text-white">Editar</a>
            <a class="btn btn-outline-primary btn-lg pl-5 pr-5 text-primary">Revertir</a>

        </div>
    </div>
</div>
<?php include('../fijos/footer.php');?>