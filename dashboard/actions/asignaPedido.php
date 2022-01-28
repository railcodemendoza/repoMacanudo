<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];
$id_pedido = $_GET['id_pedido'];

$query ="UPDATE preparadas SET `asignacion` = 'ASIGNADA' WHERE id=$id";
$result = mysqli_query($conn, $query);

$query2 ="UPDATE general SET `status` = 'PARA ENTREGAR' WHERE id=$id_pedido";
$result2 = mysqli_query($conn, $query2);


    if(!$result) {
        

            echo "<script>
                alert('Ups, no se asignó picada!!');
                location.href='../views/asifnarAPedido.php?id=$id'; 
                </script>"; 


    }else{
        if($result2) {

       
                echo "<script>
                alert('Picada asignada correctamente');
                location.href='../views/stock_picadas.php'; 
                </script>"; 
            }else{
                
                echo "<script>
                alert('Ups, no se asignó picada!!');
                location.href='../views/asifnarAPedido.php?id=$id'; 
                </script>"; 
            }

        
    }


