<?php include('../db.php'); ?>


<?php 

//$id = $_GET['id'];

if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    var_dump($_POST['agregar']);
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio']; 
    $descripcion = $_POST['descripcion']; 
    $activo = $_POST['activo'];
    $imagen = $_FILES['imagen']['name'];

    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    $max_tamanyo = 1024 * 1024 * 8;

    $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
    $ruta_nuevo_destino = '../../images/picadas_especiales/' . $_FILES['imagen']['name'];
    if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
        if ( $_FILES['imagen']['size']< $max_tamanyo ) {
            if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {

                $query = "INSERT INTO `picadas_especiales`(`imagen`, `titulo`, `descripcion`, `precio`, `activo`)
                         VALUES ('$imagen','$titulo','$descripcion','$precio' ,'$activo')";
                $result = mysqli_query($conn, $query);
            }
        }

    }
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó la Picada especial!!');
                location.href='../views/tabla_picadas_especiales.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agegó la Picada correctamente');
                location.href='../views/tabla_picadas_especiales.php';
                </script>"; 

        
    }
}
