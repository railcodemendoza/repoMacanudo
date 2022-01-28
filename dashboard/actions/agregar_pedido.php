<?php include('../db.php'); ?>


<?php 

if(isset($_POST['agregar_retiro'])) {

// calculo del total 

  foreach ($_POST['product'] as $product);
  foreach ($_POST['add2'] as $add2);

  
  $query_pic = "SELECT in_ars, out_ars FROM `picadas` WHERE title = '$product'";
  $result_pic = mysqli_query($conn, $query_pic);

  if (mysqli_num_rows($result_pic) == 1) {
    
    $row = mysqli_fetch_array($result_pic);
    
    
    $total_picada = $row['in_ars'];
    $costo_picada = $row['out_ars'];
  }

  $total_add = 0;

  $query_add = "SELECT in_ars, out_ars FROM `add2` WHERE title = '$add2'";
  $result_add = mysqli_query($conn, $query_add);
  
  if (mysqli_num_rows($result_add) == 1) {
    
    $row = mysqli_fetch_array($result_add);
    
    $total_add = $row['in_ars'];
    $costo_add = $row['out_ars'];


  }

    $total = $total_picada + $total_add;
    $costo = $costo_picada + $costo_add;
  
    // fin calculo total

    $customer = $_POST['customer'];
    $cel_phone= $_POST['cel_phone'];
    $add1 = $_POST['add1'];

    $inscription= $_POST['inscription'];
    $delivery_date= $_POST['delivery_date'];
    $add1= $_POST['add1'];
    foreach ($_POST['schedule_available'] as $schedule_available);
    foreach ($_POST['payment_mode'] as $payment_mode);
    
    $query_general = "INSERT INTO `general`(`type`, `customer`, `cel_phone`, `inscription`, `delivery_date`,`product`, `add1`, `add2`, `schedule_available`, `payment_mode`, `in_ars`,`out_ars`,`status`, `status_pago`) VALUES ('con_retiro', '$customer', '$cel_phone', '$inscription', '$delivery_date', '$product', '$add1', '$add2', '$schedule_available', '$payment_mode', '$total','$costo','PARA HACER', 'NO PAGADO')";
    $result_general = mysqli_query($conn, $query_general);

    $query_stock ="SELECT * FROM stock where title = '$add2'";
    $result_stock = mysqli_query($conn, $query_stock);
    
    if (mysqli_num_rows($result_stock) == 1) {
    
        $row = mysqli_fetch_array($result_stock);
        
        $q = $row['cuantity'];
        $q_act = $q -1;
    
      }
        $query_act ="UPDATE stock SET `cuantity`= '$q_act' WHERE title = '$add2'";
        $result_act = mysqli_query($conn, $query_act);
        
        if(!$result_general) {
            
            $_SESSION['message'] = 'Ups! no se envio el pedido';
            $_SESSION['message_type'] = 'danger';
            header('location:../views/picadas_agregar_picada.php');

        }else{
            $_SESSION['message'] = 'Su pedido a sido registrado correctamente';
            $_SESSION['message_type'] = 'warning';
            header('location:../views/picadas_agregar_picada.php');
            
        }
}

if(isset($_POST['agregar_envios'])) {
    
   
// calculo del total 

foreach ($_POST['product'] as $product);
foreach ($_POST['add2'] as $add2);
foreach ($_POST['schedule_available'] as $schedule_available);
foreach ($_POST['location'] as $location);



  
  $query_pic = "SELECT in_ars, out_ars FROM `picadas` WHERE title = '$product'";
  $result_pic = mysqli_query($conn, $query_pic);

  if (mysqli_num_rows($result_pic) == 1) {
    
    $row = mysqli_fetch_array($result_pic);
    
    $total_picada = $row['in_ars'];
    $costo_picada = $row['out_ars'];


  }

  $total_add = 0;

  $query_add = "SELECT in_ars, out_ars FROM `add2` WHERE title = '$add2'";
  $result_add = mysqli_query($conn, $query_add);
  
  if (mysqli_num_rows($result_add) == 1) {
    
    $row = mysqli_fetch_array($result_add);
    
    $total_add = $row['in_ars'];
    $costo_add = $row['out_ars'];


  }

  
  $query_km = "SELECT px_km FROM `delivery` WHERE location = '$location'";
  $result_km = mysqli_query($conn, $query_km);

  if (mysqli_num_rows($result_km) == 1) {
    
    $row = mysqli_fetch_array($result_km);
    
    $total_delivery = $row['px_km'];

  }

  $total = $total_picada + $total_add + $total_delivery;
  $costo = $costo_picada + $costo_add + $total_delivery;

  // fin calculo total

    $customer = $_POST['customer'];
    $cel_phone= $_POST['cel_phone'];
    $add1 = $_POST['add1'];
    $cnee= $_POST['cnee'];
    $cnee_cel_phone= $_POST['cnee_cel_phone'];
    $inscription= $_POST['inscription'];
    $delivery_date= $_POST['delivery_date'];
    $address= $_POST['address'];
    $referencia= $_POST['referencia'];
    $add1= $_POST['add1'];
    foreach ($_POST['payment_mode'] as $payment_mode);
    
    
    
    //$total= $_POST['total'];

    $query_general = "INSERT INTO `general`(`type`, `customer`, `cel_phone`, `cnee`,`cnee_cel_phone`,`inscription`, `delivery_date`,`address`,`location`,`referencia`,`product`, `add1`, `add2`, `schedule_available`, `payment_mode`, `in_ars`,`out_ars`,`status`, `status_pago`) VALUES ('con_envio', '$customer', '$cel_phone', '$cnee','$cnee_cel_phone','$inscription', '$delivery_date', '$address', '$location', '$referencia', '$product', '$add1', '$add2', '$schedule_available', '$payment_mode', '$total','$costo','PARA HACER', 'NO PAGADO')";
    $result_general = mysqli_query($conn, $query_general);

    $query_stock ="SELECT * FROM stock where title = '$add2'";
    $result_stock = mysqli_query($conn, $query_stock);
    
    if (mysqli_num_rows($result_stock) == 1) {
    
        $row = mysqli_fetch_array($result_stock);
        
        $q = $row['cuantity'];
        $q_act = $q -1;
    
      }
        $query_act ="UPDATE stock SET `cuantity`= '$q_act' WHERE title = '$add2'";
        $result_act = mysqli_query($conn, $query_act);
        
    if(!$result_general) {
        
        $_SESSION['message'] = 'Ups! no se envio el pedido';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/picadas_agregar_picada.php');

    }else{
        $_SESSION['message'] = 'Su pedido a sido registrado correctamente';
        $_SESSION['message_type'] = 'warning';
        header('location:../views/picadas_agregar_picada.php');
        
    }
}
?>