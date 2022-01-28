<?php 

include('../db.php');

    if(isset($_POST['modificar'])){


        $id = $_GET['id'];
        
        $tit = $_POST['tit'];           
        $tipo = $_POST['tipo'];
        $quesos = $_POST['quesos'];
        $fiambres = $_POST['fiambres'];
        $ademas = $_POST['ademas'];
        $pan = $_POST['pan'];

        $query = "UPDATE `nuestros_productos` SET `titulo`='$tit',`subtitulo`='$tipo',`quesos`='$quesos',`fiambres`='$fiambres',`ademas`='$ademas',`pan`='$pan' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        $img = $_FILES['img']['name'];
        $tmpImg = $_FILES['img']['tmp_name'];

        if($tmpImg!=""){
    
        move_uploaded_file($tmpImg,"../images/" . $img);

        $query = "UPDATE `nuestros_productos` SET `imagen`='$img' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
    
        }

        header('Location: ../views/tabla_nuestros_productos.php');
        
    }



?>