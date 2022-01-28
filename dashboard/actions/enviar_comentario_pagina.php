<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];

if(isset($_POST['cambiar'])) {

    foreach ($_POST['enviar'] as $enviar);
     
    $query = "UPDATE `general` set `pagina` = '$enviar' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    
    if(!$result) {
        

        echo "<script>
                alert('Ups, No se pudo enviar a la página');
                location.href='../webpage_control/comentarios.php'; 
                </script>"; 


    }else{
       
        echo "<script>
                alert('Comentarrio envíado a la Página correctamete!');
                location.href='../webpage_control/comentarios.php'; 
                </script>"; 
    }
}
?>