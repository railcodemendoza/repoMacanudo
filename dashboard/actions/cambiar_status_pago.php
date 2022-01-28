<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];

if(isset($_POST['confirmar'])) {

    foreach ($_POST['status_pago'] as $status_pago);
     
    $query = "UPDATE general set status_pago = '$status_pago' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    
    if(!$result) {
        

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/picadas_vendidas.php'; 
                </script>"; 


    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/picadas_vendidas.php'; 
                </script>"; 

        
    }
}
