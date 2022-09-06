<?php include('../db.php'); ?>


<?php 


if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];


    $query = "INSERT INTO `tablas`(`titulo`,`precio`) VALUES ('$titulo','$precio')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó la Tabla de Picada!!');
                location.href='../views/cotizador_tabla_picada.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agegó la Tabla de picada correctamente');
                location.href='../views/cotizador_tabla_picada.php';
                </script>"; 

        
    }
}
