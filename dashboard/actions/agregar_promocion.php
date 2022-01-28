<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];

if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $promocion = $_POST['promocion'];
    $descuento = $_POST['descuento']; 
    $activo = $_POST['activo'];


    $query = "INSERT INTO `promociones`(`promocion`,`descuento`,`activo`) VALUES ('$promocion','$descuento','$activo')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó la Promoción!!');
                location.href='../views/tabla_promociones.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agegó la Promoción correctamente');
                location.href='../views/tabla_promociones.php';
                </script>"; 

        
    }
}
