<?php

include("../db.php");

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $imagen = $_GET['ruta'];

    $query = "DELETE FROM head WHERE id =  '$id'";
    $result = mysqli_query($conn,$query);
  
    if($result) {  
      $_SESSION['message'] = 'Se eliminó correctamente la Promoción';
      $_SESSION['message_type'] = 'success';
      unlink('../../assets/img/slide/'.$imagen);
      header('location:../views/formHead.php');
    }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Promoción. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/formHead.php');
    }
    
}


?>