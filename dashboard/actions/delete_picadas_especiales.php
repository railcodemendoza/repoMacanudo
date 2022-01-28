<?php

include("../db.php");

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $imagen = $_GET['ruta'];

    $query = "DELETE FROM picadas_especiales WHERE id =  '$id'";
    $result = mysqli_query($conn,$query);
  
    if($result) {  
      $_SESSION['message'] = 'Se eliminó correctamente la Promoción';
      $_SESSION['message_type'] = 'success';
      unlink('../../images/picadas_especiales/'.$imagen);
      header('location:../views/tabla_picadas_especiales.php');
    }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Promoción. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/tabla_picadas_especiales.php');
    }
    
}


?>