<?php include '../db.php';?>


<?php

if (isset($_POST['confirmar'])) {

    $customer = $_POST['customer'];
    $cel_phone = $_POST['cel_phone'];
    $cnee = $_POST['cnee'];
    $cnee_cel_phone = $_POST['cnee_cel_phone'];
    $inscription = $_POST['inscription'];
    $delivery_date = $_POST['delivery_date'];
    $address = $_POST['address'];
    $nro = $_POST['nro'];
    $referencia = $_POST['referencia'];
    $schedule_available = $_POST['schedule_available'];
    $payment_mode = $_POST['payment_mode'];
    
    $pedId = $_POST['pedido_id'];
    $trimmedPedId = trim($pedId);
    $url = 'https://apisandbox.picadasmacanudas.com/api/general/' . $trimmedPedId;

    $customer = $_POST['customer'];
    $cel_phone = $_POST['cel_phone'];
    $cnee = $_POST['cnee'];
    $cnee_cel_phone = $_POST['cnee_cel_phone'];
    $inscription = $_POST['inscription'];
    $delivery_date = $_POST['delivery_date'];
    $address = $_POST['address'];
    $nro = $_POST['nro'];
    $referencia = $_POST['referencia'];
    $schedule_available = $_POST['schedule_available'];
    $payment_mode = $_POST['payment_mode'];

    // Datos a enviar en formato JSON
    $data = array(
        'customer' => $customer,
        'cel_phone' => $cel_phone,
        'cnee' => $cnee,
        'cnee_cel_phone' => $cnee_cel_phone,
        'inscription' => $inscription,
        'delivery_date' => $delivery_date,
        'address' => $address,
        'nro' => $nro,
        'referencia' => $referencia,
        'schedule_available' => $schedule_available,
        'payment_mode' => $payment_mode,
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => json_encode($data), // Enviar datos como JSON
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $responseArray = json_decode($response, true);

    echo  $response;
    if (!$responseArray) {

        $_SESSION['message'] = 'Ups! no se envio el pedido';
        $_SESSION['message_type'] = 'danger';
        header('location:../forms/pedido.php');

    } else {
        if ($payment_mode == 'TRANSFERENCIA') {
            $_SESSION['message'] = 'Su pedido a sido registrado correctamente<br>
            Para hacer la Transferencia:<br>
            Banco Galicia<br>
            MARIA FLORENCIA<br>
            CTA: 4032793-1 247-0<br>
            CBU: 00702470-30004032793102<br>
            CUIL: 27-32975147-9';
            $_SESSION['message_type'] = 'warning';
            header('location:../forms/forms_envios.php');

        } elseif ($payment_mode == 'Mercado Pago') {

            header('location:../forms/mercadopago.php?id=' . $id);

        } else {
            $_SESSION['message'] = 'Su pedido a sido registrado correctamente';
            $_SESSION['message_type'] = 'warning';
            header('location:../forms/pedido.php');
        }
    }
}