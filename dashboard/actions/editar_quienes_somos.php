<?php 

include('../db.php');

    if(isset($_POST['modificar'])){


        $id = $_GET['id'];
        
        $activo = 1;

        $desc = $_POST['desc'];  
        $titModal = $_POST['titModal'];
        $descModal = $_POST['descModal'];
        $desc2Modal = $_POST['desc2Modal'];

        $query = "UPDATE `quienes_somos` SET `descripcion`='$desc',`activo`='$activo',`titulo_2`='$titModal',`descripcion_2`='$descModal',`epigrafe`='$desc2Modal' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        $imgModal = $_FILES['imgModal']['name'];
        $tmpImagenModal = $_FILES['imgModal']['tmp_name'];

        if($tmpImagenModal!=""){
    
        move_uploaded_file($tmpImagenModal,"../../images/" . $imgModal);

        $query = "UPDATE `quienes_somos` SET `imagen`='$imgModal' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
    
        }

        header('Location: ../views/tabla_quienes_somos.php');
        
    }



?>