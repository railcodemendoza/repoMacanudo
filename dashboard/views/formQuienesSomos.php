<?php

include('../db.php');

include('../fijos/header.php'); 

include('../fijos_user/pannel_left_super_user.php'); 

include('../fijos/pannel_right.php'); 

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM `quienes_somos` WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_array($result);
    
        $desc = $row['descripcion'];
        $titModal = $row['titulo_2'];
        $descModal = $row['descripcion_2'];
        $check = $row['activo'];
        $imgModal = $row['imagen'];
        $desc2Modal = $row['epigrafe'];
        
        
    }
}

?>


<div class="container">
    <div class="col-sm-12 pt-3">
        <h1>Modificar seccion ¿Quienes Somos?</h1>
        <form method="POST" action="../actions/editar_quienes_somos.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <!-- primer apartado -->

            <label class="pt-3 pb-2" for="desc"><b>Descripcion ¿Quienes Somos?: (limite de 250 caracteres)</b></label>
            <textarea maxlength="250" class="form-control" cols="30" rows="5" name="desc" required
                id="desc"><?php echo $desc ?></textarea>

                <label class="pt-2 pb-2" for="titModal">Titulo ver mas: </label>
                <input class="form-control " name="titModal" required type="text" id="titModal"
                    placeholder="Escriba el titulo del ver mas" value="<?php echo $titModal ?>">

                <label class="pt-3 pb-2" for="descModal">Descripcion ver mas:</label>
                <textarea maxlength="585" class="form-control" cols="30" rows="5" name="descModal" required
                    id="descModal"><?php echo $descModal ?></textarea>

                <label class="pt-3 pb-2" for="imgModal">Imagen del ver mas:</label>
                <input type="file" name="imgModal" class="form-control" id="imgModal">

                <label class="pt-3 pb-2" for="desc2Modal">Segunda descripcion ver mas:</label>
                <textarea maxlength="195" class="form-control" cols="30" rows="5" name="desc2Modal" required
                    id="desc2Modal"><?php echo $desc2Modal ?></textarea>

            <br><input class="btn btn-success mb-5" name="modificar" type="submit" value="modificar">
            <a href="tabla_quienes_somos.php" class="btn btn-success mb-5">Cancelar</a>
        </form>
    </div>

</div>
</div>

<?php include('../fijos/footer.php');?>