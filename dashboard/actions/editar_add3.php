<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];
$vista = $_GET['vista'];


if(isset($_POST['actualizar'])) {


    // traemos todos los datos. 
    $in = $_POST['in'];
    $out = $_POST['out'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE `add3` SET `in_ars`= '$in', `out_ars`='$out',`title`='$title',`description`='$description' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    
    if(!$result) {
        

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/proveedores_$vista.php'; 
                </script>"; 


    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/proveedores_$vista.php'; 
                </script>"; 

        
    }
}
