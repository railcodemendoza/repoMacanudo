<?php include('../db.php'); ?>
<?php 

$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $promocion = $_POST['promocion'];
    $descuento = $_POST['descuento']; 
    $activo = $_POST['activo'];

    $query = "UPDATE `promociones` SET `promocion`= '$promocion', `descuento`='$descuento',`activo`='$activo' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        

        echo "<script>
                alert('Ups, Promoción no Editada!!');
                location.href='../views/tabla_promociones.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Promoción cambiada correctamente');
                location.href='../views/tabla_promociones.php'; 
                </script>";   
    }
}
