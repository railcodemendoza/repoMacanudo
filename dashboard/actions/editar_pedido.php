<?php include('../db.php');

$id = $_GET['id'];
$vista = $_GET['vista'];

if(isset($_POST['editar'])) {


    $customer = $_POST['customer'];
    $cel_phone = $_POST['cel_phone'];
    $cnee = $_POST['cnee'];
    $cnee_cel_phone = $_POST['cnee_cel_phone'];
    $inscription = $_POST['inscription'];
    $delivery_date = $_POST['delivery_date'];
    $address = $_POST['address'];
    $in_ars = $_POST['in_ars'];
    $observacion_interna = $_POST['observacion_interna'];



    foreach($_POST['type'] as $type);
    foreach($_POST['schedule_available'] as $schedule_available);
    foreach($_POST['location'] as $location);
    foreach($_POST['product'] as $product);
    foreach($_POST['payment_method'] as $payment_method);
    foreach($_POST['add2'] as $add2);
    foreach($_POST['add3'] as $add3);
    foreach($_POST['add1'] as $add1);

    $query_add2 = "SELECT add2 FROM general WHERE id = '$id'";
    $result_add2 = mysqli_query($conn, $query_add2);                        
                    while($row = mysqli_fetch_assoc($result_add2)) { 
                      $add2nuevo = $row['add2'];
                    }
    $query_envio = "SELECT px_km FROM delivery WHERE location = '$location'";
    $result_envio = mysqli_query($conn, $query_envio);                        
                    while($row = mysqli_fetch_assoc($result_envio)) { 
                      $envio = $row['px_km'];
                    }

    $add2final = $add2nuevo . $add2; 

    $in_real = $in_ars - $envio;
    $ganancia = $in_real*20/100;
    $out_ars = $in_real - $ganancia;

    

    
    $query = "UPDATE `general` SET `type`= '$type', `customer`= '$customer', `cel_phone`= '$cel_phone', `cnee`= '$cnee', `cnee_cel_phone`= '$cnee_cel_phone', `inscription`= '$inscription', `delivery_date`= '$delivery_date', `address`= '$address', `location`= '$location', `product`= '$product', `add2`= '$add2final',`add1`= '$add1',`add3`= '$add3', `schedule_available`= '$schedule_available', `payment_mode`= '$payment_method', `observacion_interna` = '$observacion_interna' , `in_ars`= '$in_ars', `out_ars`= '$out_ars'  WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result) {

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/picadas_$vista.php'; 
                </script>"; 
    }else{


        echo "<script>
                alert('Status cambiado correctamente');

                location.href='../views/picadas_$vista.php'; 
                </script>";   
    }
}else{
    echo 'no hay';
}
