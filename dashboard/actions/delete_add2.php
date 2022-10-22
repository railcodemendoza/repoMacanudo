<?php

include("../db.php");

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $imagen = $_GET['ruta'];

    $query = "DELETE FROM add2 WHERE id =  '$id'";
    $result = mysqli_query($conn,$query);
  
    if($result) {  
      $_SESSION['message'] = 'Se eliminó correctamente el Producto';
      $_SESSION['message_type'] = 'success';
      unlink('../../assets/img/add2/'.$imagen);
      header('location:../webpage_control/agregados.php');
    }else{
    
        $_SESSION['message'] = 'No se pudo eliminar el Producto. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../webpage_control/agregados.php');
    }
    
}


?>