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

    $query = "UPDATE `add2` SET `title`= '$title',`in_ars`= '$in_ars',`description`= '$description',`proveedor`= '$proveedor' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    
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
