<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];
$vista = $_GET['vista'];


if(isset($_POST['actualizar'])) {


    // traemos todos los datos. 
    $in = $_POST['in'];
    $out = $_POST['out'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE `add2` SET `in_ars`= '$in', `out_ars`='$out',`title`='$title',`description`='$description' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    
    if(!$result) {
        

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/proveedores_$vista.php'; 
                </script>"; 


    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/proveedores_$vista.php'; 
                </script>"; 

        
    }
}

if(isset($_POST['editar_pagina'])) {

    // traemos todos los datos. 

    $title = $_POST['title'];
    $in_ars = $_POST['in_ars'];
    $description = $_POST['description'];
    $proveedor = $_POST['proveedor'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen']['name'];


    if(empty($imagen)){ 
        $query = "UPDATE `add2` SET `title`= '$title',`in_ars`= '$in_ars',`description`= '$description',`proveedor`= '$proveedor',`q`= '$stock'  WHERE id = $id";
        $result = mysqli_query($conn, $query);
    
    }else{
        $imagen_antigua = $_GET['ruta'];
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
        $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
        $ruta_nuevo_destino = '../../assets/img/add2/' . $_FILES['imagen']['name'];
        unlink('../../assets/img/add2/'.$imagen_antigua);

        if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
                 if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {

                    $query = "UPDATE `add2` SET `img`='$imagen', `title`= '$title',`in_ars`= '$in_ars',`description`= '$description',`proveedor`= '$proveedor',`q`= '$stock'  WHERE id = $id";
                    $result = mysqli_query($conn, $query);
                 }
        }
    }
    
    if(!$result) {

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../webpage_control/agregados.php'; 
                </script>"; 


    }else{

        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../webpage_control/agregados.php'; 
                
                </script>"; 
        
    }
}
