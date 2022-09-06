<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `tablas` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente la Tabla de la Picada';
    $_SESSION['message_type'] = 'success';
    header('location:../views/cotizador_tabla_picada.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar la Tabla de la Picada. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/cotizador_tabla_picada.php');
  }
    
}


?>