<?php

include("../db.php");

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $imagen = $_GET['ruta'];

    $query = "DELETE FROM galeria WHERE id =  '$id'";
    $result = mysqli_query($conn,$query);
  
    if($result) {  
      $_SESSION['message'] = 'Se eliminó correctamente la imagen';
      $_SESSION['message_type'] = 'success';
      unlink('../../assets/img/slide/Galeria/'.$imagen);
      header('location:../views/galeria.php');
    }else{
    
        $_SESSION['message'] = 'No se pudo eliminar la imagen. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/galeria.php');
    }
    
}


?>