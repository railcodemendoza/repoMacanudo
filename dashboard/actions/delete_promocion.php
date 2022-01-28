<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `promociones` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente la Promoción';
    $_SESSION['message_type'] = 'success';
    header('location:../views/tabla_promociones.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Promoción. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/tabla_promociones.php');
  }
    
}


?>