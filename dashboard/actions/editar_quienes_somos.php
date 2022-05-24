<?php 

include('../db.php');

    if(isset($_POST['modificar'])){

        /*
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
        */
        
        $id = $_GET['id'];
        
        $activo = 1;

        $desc = $_POST['desc'];  
        $titModal = $_POST['titModal'];
        $descModal = $_POST['descModal'];
        $desc2Modal = $_POST['desc2Modal'];
        $imgModal = $_FILES['imgModal']['name'];

        if(empty($imgModal)){    //Devuelve false si var existe y tiene un valor no vacío, distinto de cero. De otro modo devuelve true.
            $query = "UPDATE `quienes_somos` SET `descripcion`='$desc',`activo`='$activo',`titulo_2`='$titModal',`descripcion_2`='$descModal',`epigrafe`='$desc2Modal' WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
        }else{
            $imagen_antigua = $_GET['ruta'];
            $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
           /*  $max_tamanyo = 1024 * 1024 * 8; */
            $ruta_fichero_origen = $_FILES['imgModal']['tmp_name'];
            $ruta_nuevo_destino = '../../assets/img/quienes_somos/' . $_FILES['imgModal']['name'];
            unlink('../../assets/img/quienes_somos/'.$imagen_antigua);
    
            if ( in_array($_FILES['imgModal']['type'], $extensiones) ) {
               /*  if ( $_FILES['imagen']['size']< $max_tamanyo ) { */
                    if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                        $query = "UPDATE `quienes_somos` SET `imagen`='$imgModal', `descripcion`='$desc',`activo`='$activo',`titulo_2`='$titModal',`descripcion_2`='$descModal',`epigrafe`='$desc2Modal' WHERE id = '$id'";
                        $result = mysqli_query($conn, $query);
                    }
              /*   } */
            }
        }
        if(!$result) {
            echo "<script>
                    alert('Ups, Modificación no Editada!!');
                    location.href='../views/tabla_quienes_somos.php'; 
                    </script>"; 
        }else{
           
            echo "<script>
                    alert('Modificación realizada correctamente');
                    location.href='../views/tabla_quienes_somos.php'; 
                    </script>";   
        }

    }



?>