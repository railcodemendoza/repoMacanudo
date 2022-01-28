<?php

include('../db.php');

include('../fijos/header.php'); 

include('../fijos_user/pannel_left_super_user.php'); 

include('../fijos/pannel_right.php'); 


if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM `nuestros_productos` WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_array($result);
    
        $tit = $row['titulo'];
        $tipo = $row['subtitulo'];
        $quesos = $row['quesos'];
        $fiambres = $row['fiambres'];
        $ademas = $row['ademas'];
        $pan = $row['pan'];
        $img = $row['img'];
        
        
    }
}


?>


<div class="container">

    <div class="col-sm-12 pt-3">
        <h1>Modificar seccion Nuestros Productos</h1>
        <form method="POST" action="actions/editar_nuestros_productos.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

            <label class="pt-3 pb-2" for="tit">Titulo primer producto: </label>
            <input class="form-control " name="tit" required type="text" id="tit" value="<?php echo $tit ?>">

            <label class="pt-3 pb-2" for="tipo">Tipo primer producto: </label>
            <input class="form-control " name="tipo" required type="text" id="tipo" value="<?php echo $tipo ?>">

            <label class="pt-3 pb-2" for="quesos">"Quesos" primer producto:</label>
            <textarea maxlength="150" class="form-control " name="quesos" required cols="30" rows="5" id="quesos"><?php echo $quesos ?></textarea>

            <label class="pt-3 pb-2" for="fiambres">"Fiambres" primer producto:</label>
            <textarea maxlength="150" class="form-control " name="fiambres" required cols="30" rows="5" id="fiambres"><?php echo $fiambres ?></textarea>

            <label class="pt-3 pb-2" for="ademas">"Ademas" primer producto:</label>
            <textarea maxlength="150" class="form-control " name="ademas" required cols="30" rows="5" id="ademas"><?php echo $ademas ?></textarea>

            <label class="pt-3 pb-2" for="pan">"Pan" primer producto: </label>
            <input class="form-control " name="pan" required type="text" id="pan" value="<?php echo $pan ?>">            

            <label class="pt-3 pb-2" for="img">Imagen primer producto:</label>
            <input type="file" name="img" class="form-control" id="img">

            <br><input class="btn btn-success mb-5" name="modificar" type="submit" value="Modificar">
            
        </form>
    </div>

</div>
</div>
<?php include('../fijos/footer.php');?>
