<?php include('../db.php');

$id = $_GET['id'];

if(isset($_POST['editar'])) {


    $codigo = $_POST['codigo'];
    $descuento = $_POST['descuento'];
    
    $query = "UPDATE `promo` set`codigo`= '$codigo', `descuento`= '$descuento' WHERE id = '1'";
    $result = mysqli_query($conn, $query);

    if(!$result) {

        echo "<script>
                alert('Ups, PROMO no Editada!!');
                location.href='../webpage_control/tabla_promociones.php'; 
                </script>"; 
    }else{


        echo "<script>
                alert('PROMO cambiada correctamente');
                location.href='../webpage_control/tabla_promociones.php'; 
                </script>";   
    }
}else{
    echo 'no hay';
}
