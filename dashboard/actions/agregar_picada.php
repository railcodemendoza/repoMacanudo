<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];

if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $in_ars = $_POST['in_ars'];
    foreach ($_POST['type'] as $type);

    $query = "INSERT INTO `picadas`(`title`, `description`, `in_ars`,`type`) VALUES ('$title','$description','$in_ars','$type')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../webpage_control/picadas.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../webpage_control/picadas.php';
                </script>"; 

        
    }
}
