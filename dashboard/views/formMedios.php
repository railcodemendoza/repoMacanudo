<?php

include('../db.php');

include('../fijos/header.php'); 

include('../fijos_user/pannel_left_super_user.php'); 

include('../fijos/pannel_right.php'); 


if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM `medios` WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_array($result);
    
        $tit = $row['titulo'];
        $desc = $row['descripcion'];
        $img = $row['img'];
       
    }
}


?>


<div class="container">

    <div class="col-sm-12 pt-3">
        <h1>Modificar seccion medios</h1>
        <form method="POST" action="actions/editar_medios.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

            <label class="pt-3 pb-2" for="tit">Titulo: </label>
            <input class="form-control " name="tit" required type="text" id="tit" value="<?php echo $tit ?>">

            <label class="pt-3 pb-2" for="desc">Descripcion: </label>
            <textarea maxlength="150" class="form-control " name="desc" required cols="30" rows="5" id="desc"><?php echo $desc ?></textarea>

            <label class="pt-3 pb-2" for="img">Imagen primer producto:</label>
            <input type="file" name="img" class="form-control" id="img">

            <br><input class="btn btn-success mb-5" name="modificar" type="submit" value="Modificar">
            
        </form>
    </div>

</div>
</div>
<?php include('../fijos/footer.php');?>
