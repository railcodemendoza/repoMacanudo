<?php

include('../db.php');

include('../fijos/header.php'); 

include('../fijos_user/pannel_left_super_user.php'); 

include('../fijos/pannel_right.php'); 




?>
<?php include('../../sections/quienesSomos.php');  ?>
<div class="container mb-5">
    <div class="d-flex text-center">
        <div class="col-sm-8 mx-auto">
        <?php while($rows = mysqli_fetch_assoc($result1)){ ?>
        <a href="formQuienesSomos.php?id=<?php echo $rows['id']; ?>" class="a btn btn-outline-primary mr-5">Editar
            <?php echo $rows['titulo']; ?> </a>
        <?php } ?>
        </div>
    </div>
</div>
<?php include('../fijos/footer.php');?>