<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `type_picadas` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente la Tabla';
    $_SESSION['message_type'] = 'success';
    header('location:../views/tabla_picadas.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Tabla. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/tabla_picadas.php');
  }
    
}


?>