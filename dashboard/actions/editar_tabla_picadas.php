<?php include('../db.php'); ?>
<?php 

$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $title = $_POST['title'];
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];
    $comentario = $_POST['comentario'];

    
    $query = "UPDATE `type_picadas` SET `in_ars`= '$in_ars', `out_ars`='$out_ars', `comentario`='$comentario', `title`='$title' WHERE id = $id";
    $result = mysqli_query($conn, $query);
   
    if(!$result) {
        

        echo "<script>
                alert('Ups, Tipo de Tabla no Editado!!');
                location.href='../views/tabla_picadas.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Tipo de Tabla ha cambiado correctamente');
                location.href='../views/tabla_picadas.php'; 
                </script>";   
    }
        
}
