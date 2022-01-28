<?php include('../db.php');

$id = $_GET['id'];

if(isset($_POST['editar'])) {


    $location = $_POST['location'];
    $km_to_zero = $_POST['km_to_zero'];
    $px_km= $_POST['px_km'];
    

    $query = "UPDATE `delivery` set`location`= '$location', `km_to_zero`= '$km_to_zero', `px_km`= '$px_km' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result) {

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/tabla_localidades.php'; 
                </script>"; 
    }else{


        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/tabla_localidades.php'; 
                </script>";   
    }
}else{
    echo 'no hay';
}
