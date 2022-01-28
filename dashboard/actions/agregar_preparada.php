<?php include('../db.php'); ?>


<?php 

if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $fecha_preparacion = $_POST['fecha_preparacion'];
    foreach ($_POST['tamano'] as $tamano);
    foreach ($_POST['tipo'] as $tipo);
    foreach ($_POST['picada'] as $picada);


    $query = "INSERT INTO `preparadas`(`picada`, `tamano`, `tipo`,`fecha_preparacion`,`asignacion`) VALUES ('$picada','$tamano','$tipo','$fecha_preparacion','NO ASIGNADA')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó picada!!');
                location.href='../views/agregar_picada.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Picada Agregada');
                location.href='../views/stock_picadas.php';
                </script>"; 

        
    }
}
