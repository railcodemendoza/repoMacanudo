<?php 

$id = $_GET['id'];
$conn_builit = mysqli_connect(
    '31.170.161.22',
    'u101685278_buildit',
    'Pachiman2020',
    'u101685278_buildit'
  );

$query = "UPDATE `ticket_macanudas` SET `status`='resuelto_cliente' WHERE id = '$id'";
$result = mysqli_query($conn_builit, $query);


if($result = true){
                    
    $_SESSION['message'] = 'Ticket Resuelto';
    $_SESSION['message_type'] = 'info';
    header('location:../ayuda/ayuda.php');

}else{

    $_SESSION['message'] = 'Algo salió mal. Por favor, repetir accion!';
    $_SESSION['message_type'] = 'danger';
    header('location:../ayuda/ayuda.php');

}

?>
