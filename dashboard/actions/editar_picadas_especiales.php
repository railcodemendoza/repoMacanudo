<?php include('../db.php'); ?>
<?php 


if(isset($_POST['editar'])) {

    $id = $_GET['id'];
    // traemos todos los datos. 

    $id= $_GET['id'];
    $titulo =$_POST['titulo'];
    $descripcion =$_POST['descripcion'];
    $precio =$_POST['precio'];
    $activo =$_POST['activo'];
    $imagen = $_FILES['imagen']['name'];
    

    if(empty($imagen)){    //Devuelve false si var existe y tiene un valor no vacío, distinto de cero. De otro modo devuelve true.
        $query = "UPDATE `picadas_especiales` SET `titulo`='$titulo',`descripcion`='$descripcion',
                         `precio`='$precio',`activo`='$activo' WHERE id = $id";
                $result = mysqli_query($conn, $query);
    }else{
        $imagen_antigua = $_GET['ruta'];
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
       /*  $max_tamanyo = 1024 * 1024 * 8; */
        $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
        $ruta_nuevo_destino = '../../images/picadas_especiales/' . $_FILES['imagen']['name'];
        unlink('../images/picadas_especiales/'.$imagen_antigua);

        if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
           /*  if ( $_FILES['imagen']['size']< $max_tamanyo ) { */
                if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {

                    $query = "UPDATE `picadas_especiales` SET `imagen`='$imagen',`titulo`='$titulo',`descripcion`='$descripcion',
                         `precio`='$precio',`activo`='$activo' WHERE id = $id";
                    $result = mysqli_query($conn, $query);
                }
          /*   } */
        }
    }
    if(!$result) {
        echo "<script>
                alert('Ups, Picada no Editada!!');
                location.href='../views/tabla_picadas_especiales.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Picada cambiada correctamente');
                location.href='../views/tabla_picadas_especiales.php'; 
                </script>";   
    }
}