<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "UPDATE `general` SET `satisfaction_product`= '',`satisfaction_servicio`='',`satisfaccion_add`='',`satisfaction_entrega`='',`satisfaction_observation`='',`comentario_pagina`='',`pagina`='' where id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {
    
    $_SESSION['message'] = 'Se eliminó correctamente el Comentario';
    $_SESSION['message_type'] = 'success';
    header('location:../webpage_control/comentarios.php');
  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Comentario. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
      header('location:../webpage_control/comentarios.php');
        
  }
    
}


?>