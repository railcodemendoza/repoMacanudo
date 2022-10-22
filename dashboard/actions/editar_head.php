<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];




if(isset($_POST['editar'])) {

    $description = $_POST['description'];
    $imagen = $_FILES['imagen']['name'];


    if(empty($imagen)){ 
        $query = "UPDATE `head` SET `description`= '$description' WHERE id = $id";
        $result = mysqli_query($conn, $query);
    
    }else{
        $imagen_antigua = $_GET['ruta'];
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
        $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
        $ruta_nuevo_destino = '../../assets/img/slide/' . $_FILES['imagen']['name'];
        unlink('../../assets/img/slide/'.$imagen_antigua);

        if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
                 if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {

                    $query = "UPDATE `head` SET `img`='$imagen',`description`= '$description' WHERE id = $id";
                    $result = mysqli_query($conn, $query);
                 }
        }
    }
    
    if(!$result) {

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/formHead.php'; 
                </script>"; 


    }else{

        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/formHead.php'; 
                
                </script>"; 
        
    }
}
