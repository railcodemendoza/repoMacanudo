<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `rango_picada` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente la Picada';
    $_SESSION['message_type'] = 'success';
    header('location:../views/tipos_picadas.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Picada. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/tipos_picadas.php');
  }
    
}


?>