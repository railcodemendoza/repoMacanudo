<?php include('../control/db.php');

if (isset($_POST['encuesta'])){

    $atencion = $_POST['atencion'];
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $add2 = $_POST['add2'];
    $envios = $_POST['envios'];
    $sugerencias = $_POST['sugerencias'];
    $comentario_pagina = $_POST['comentario_pagina']    ;

  $query = "UPDATE `general` SET `satisfaction_product`= '$producto',`satisfaction_servicio`='$atencion',`satisfaccion_add`='$add2',`satisfaction_entrega`= '$envios',`satisfaction_observation`='$sugerencias',`comentario_pagina` ='$comentario_pagina' WHERE id = '$id'";
  $result = mysqli_query($conn, $query);


  if(!$result){

    $_SESSION['message'] = 'no se envió tu Opinión. Volvé a intentarlo';
    $_SESSION['message_type'] = 'danger';
    header('location:encuesta.php'); 
  }else{

    $_SESSION['message'] = 'Muchas Gracias por su Opinión';
    $_SESSION['message_type'] = 'success';
    header('location:../index.php');
  }
  

    
}