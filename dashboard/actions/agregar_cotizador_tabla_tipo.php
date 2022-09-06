<?php include('../db.php'); ?>


<?php 


if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $valor_por_persona = $_POST['valor_por_persona'];


    $query = "INSERT INTO `tipo_picada`(`titulo`,`precio`,`valor_por_persona`) VALUES ('$titulo','$precio','$valor_por_persona')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó Tipo de Picada!!');
                location.href='../views/cotizador_tabla_tipo.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agegó tipo de picada correctamente');
                location.href='../views/cotizador_tabla_tipo.php';
                </script>"; 

        
    }
}
