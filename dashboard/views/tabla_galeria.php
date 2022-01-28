<?php

include('../db.php');

include('../fijos/header.php'); 

include('../fijos_user/pannel_left_super_user.php'); 

include('../fijos/pannel_right.php'); 


$query = "SELECT * FROM quienes_somos";
$result = mysqli_query($conn, $query);

?>
<iframe src="http://laboratoriolanding.picadasmacanudas.com/iframe/galeria.php"
    style="width: -webkit-fill-available; height: 39rem; border: none;"></iframe>
<div class="container mb-5">
    <div class="d-flex text-center">
        <div class="col-sm-8 mx-auto">
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <a href="formGaleria.php?id=<?php echo $row['id']; ?>" class="a btn btn-outline-primary mr-5">Editar
            <?php echo $row['titulo']; ?> </a>
        <?php } ?>
        </div>
    </div>
</div>
<?php include('../fijos/footer.php');?>