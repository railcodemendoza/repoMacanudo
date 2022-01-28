<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];

if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    
    $title = $_POST['title'];
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];


    $query = "INSERT INTO `rango_picada`(`title`,`in_ars`,`out_ars`) VALUES ('$title','$in_ars','$out_ars')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        echo "<script>
                alert('Ups, no se agregó Tipo de Picada!!');
                location.href='../views/tipos_picadas.php';
                </script>"; 


    }else{
       
        echo "<script>
                alert('Se agegó tipo de picada correctamente');
                location.href='../views/tipos_picadas.php';
                </script>"; 

        
    }
}
