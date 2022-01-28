<?php include('../db.php'); ?>


<?php 


$vista = $_GET['dia'];
$id = $_GET['id'];

if(isset($_POST['confirmar'])) {

    foreach ($_POST['status'] as $status);
     
    $query = "UPDATE general set status = '$status' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    
    if(!$result) {
        

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/picadas_$vista.php'; 
                </script>"; 


    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/picadas_$vista.php'; 
                </script>"; 

        
    }
}
