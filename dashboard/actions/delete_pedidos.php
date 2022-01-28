<?php

include("../db.php");

$vista = $_GET['dia'];

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `general` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente el Pedido';
    $_SESSION['message_type'] = 'success';
    header('location:../views/picadas_'.$vista.'.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar el Pedido. Por favor reintente!';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/picadas_'.$vista.'.php');
  }
    
}


?>