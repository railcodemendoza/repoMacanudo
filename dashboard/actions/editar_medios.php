<?php 

include('../db.php');

    if(isset($_POST['modificar'])){


        $id = $_GET['id'];
        
        $tit = $_POST['tit'];  
        $subtitulo = $_POST['subtitulo'];             
        $desc = $_POST['desc'];
        $link = $_POST['link'];
        $imagen = $_FILES['imagen']['name'];
        

        if(empty($imagen)){ 
            $query = "UPDATE `medios` SET `titulo`='$tit',`subtitulo`='$subtitulo',`descripcion`='$desc',`link`='$link' WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
        }else{
            $imagen_antigua = $_GET['ruta'];
            $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
            $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
            $ruta_nuevo_destino = '../../assets/img/' . $_FILES['imagen']['name'];
            unlink('../../assets/img/'.$imagen_antigua);

        if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
                 if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                    $query = "UPDATE `medios` SET `titulo`='$tit',`subtitulo`='$subtitulo',`descripcion`='$desc',`link`='$link',`img`='$imagen' WHERE id = '$id'";
                    $result = mysqli_query($conn, $query);
                    }
            }
        }
        if(!$result) {
            echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/tabla_en_los_medio.php'; 
                </script>"; 
        }else{

            echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/tabla_en_los_medio.php'; 
                
                </script>"; 
        
        }
    }
?>