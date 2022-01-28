<?php include('../db.php'); ?>
<?php 

$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $title = $_POST['title'];
    $in_ars = $_POST['in_ars']; 
    $out_ars = $_POST['out_ars'];

    $query = "UPDATE `rango_picada` SET `in_ars`= '$in_ars', `out_ars`='$out_ars',`title`='$title' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        

        echo "<script>
                alert('Ups, Picada no Editado!!');
                location.href='../views/tipos_picadas.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Picada cambiado correctamente');
                location.href='../views/tipos_picadas.php'; 
                </script>";   
    }
}
