<?php include('../db.php'); ?>


<?php 



if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $title = $_POST['title'];
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];
    $valor_por_persona = $_POST['valor_por_persona'];


    $query = "INSERT INTO `rango_picada`(`title`,`in_ars`,`out_ars`,`valor_por_persona`) VALUES ('$title','$in_ars','$out_ars','$valor_por_persona')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó Tipo de Picada!!');
                location.href='../views/tipos_picadas.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agregó tipo de picada correctamente');
                location.href='../views/tipos_picadas.php';
                </script>"; 

        
    }
}
