<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `tipo_picada` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente el Tipo de Picada';
    $_SESSION['message_type'] = 'success';
    header('location:../views/cotizador_tabla_tipo.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar el Tipo de Picada. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/cotizador_tabla_tipo.php');
  }
    
}


?>