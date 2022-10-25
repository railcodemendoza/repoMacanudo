<?php include('../db.php'); ?>


<?php 


if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $title = $_POST['title'];
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];
    $comentario = $_POST['comentario'];



    $query = "INSERT INTO `type_picadas`(`title`,`in_ars`,`out_ars`,`comentario`) VALUES ('$title','$in_ars','$out_ars','$comentario')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó la Tabla de Picada!!');
                location.href='../views/tabla_picadas.php';
                </script>"; 


    }else{
        echo "<script>
                alert('Se agregó tipo de Tabla correctamente');
                location.href='../views/tabla_picadas.php';
                </script>"; 

        
    }
}
