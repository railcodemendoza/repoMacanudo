<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];

if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $title = $_POST['title'];
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];
    $comentario = $_POST['comentario'];



    $query = "INSERT INTO `type_picada`(`title`,`in_ars`,`out_ars`,`comentario`) VALUES ('$title','$in_ars','$out_ars','$comentario')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó Tipo de Tabla!!');
                location.href='../views/tipos_picadas.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agegó tipo de tabla correctamente');
                location.href='../views/tipos_picadas.php';
                </script>"; 

        
    }
}
