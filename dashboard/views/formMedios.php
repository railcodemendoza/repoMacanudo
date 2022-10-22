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
        $sub = $row['subtitulo'];
        $link = $row['link'];
       
    }
}


?>


<div class="container">

    <div class="col-sm-12 pt-3">
        <h1>Modificar seccion medios</h1>
        <form method="POST" action="../actions/editar_medios.php?id=<?php echo $id;?>&ruta=<?php echo $img ?>" enctype="multipart/form-data">

            <label class="pt-3 pb-2" for="tit">Titulo: </label>
            <input class="form-control " name="tit" required type="text" id="tit" value="<?php echo $tit ?>">

            <label class="pt-3 pb-2" for="subtitulo">Subtitulo: </label>
            <textarea maxlength="150" class="form-control " name="subtitulo" cols="30" rows="5" id="subtitulo"><?php echo $sub ?></textarea>

            <label class="pt-3 pb-2" for="desc">Descripcion: </label>
            <textarea maxlength="150" class="form-control " name="desc" required cols="30" rows="5" id="desc"><?php echo $desc ?></textarea>

            <label class="pt-3 pb-2" for="link">Link: </label>
            <input class="form-control " name="link"  type="text" id="link" value="<?php echo $link ?>">

            <label class="pt-3 pb-2" for="imagen">Imagen primer producto:</label>
            <input type="file" class="form-control" id="imagen" name="imagen" >
                <br>
                <?php
                    echo "Imagen Actual: $img";
                    echo "<br>";
                    echo "<img src='../../assets/img/$img' width='15%' />";
                ?>
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="text-align: center;">
                    <button type="submit" name="modificar" id="modificar" class="btn btn-primary">Editar</button>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </form>                                        
    </div>
</div>

<?php include('../fijos/footer.php');?>
