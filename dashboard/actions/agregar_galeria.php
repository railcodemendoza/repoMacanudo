<?php include('../db.php'); ?>


<?php 


if(isset($_POST['agregar_imagen'])){
    
    
    $imagen = $_FILES['imagen']['name'];
    
    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    $max_tamanyo = 1024 * 1024 * 8;

    $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
    $ruta_nuevo_destino = '../../assets/img/slide/Galeria/' . $_FILES['imagen']['name'];
    if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
        if ( $_FILES['imagen']['size']< $max_tamanyo ) {
            if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {

                $query = "INSERT INTO `galeria`(`img`) VALUES ('$imagen')";
                $result = mysqli_query($conn, $query);
            }
        }

    }

    if(!$result) {
        echo "<script>
        alert('Ups, no se agregó la Picada especial!!');
        location.href='../views/galeria.php';
        </script>";  
    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/galeria.php';
                </script>"; 

        
    }
}

