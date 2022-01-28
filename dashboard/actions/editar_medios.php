<?php 

include('../db.php');

    if(isset($_POST['modificar'])){


        $id = $_GET['id'];
        
        $tit = $_POST['tit'];           
        $desc = $_POST['desc'];

        $query = "UPDATE `medios` SET `titulo`='$tit',`descripcion`='$desc' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        $img = $_FILES['img']['name'];
        $tmpImg = $_FILES['img']['tmp_name'];

        if($tmpImg!=""){
    
        move_uploaded_file($tmpImg,"../images/" . $img);

        $query = "UPDATE `medios` SET `img`='$img' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
    
        }

        header('Location: ../views/tabla_nuestros_productos.php');
        
    }



?>