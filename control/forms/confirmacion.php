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
    $location = $_POST['location'];
    $referencia = $_POST['referencia'];
    $product = $_POST['product'];
    $add1 = $_POST['add1'];
    $add3 = $_POST['add3'];
    $schedule_available = $_POST['schedule_available'];
    $payment_mode = $_POST['payment_mode'];
    $total = $_POST['total'];
    $costo = $_POST['costo'];
    $add2 = $_POST['add2'];
    $add4 = $_POST['add4'];
    $add5 = $_POST['add5'];

    $BDadd2 = $add2 . ' - ' . $add4 . ' - ' . $add5;

    $query_q2 = "SELECT q FROM `add2` WHERE `title` = '$add2'";
    $result_q2 = mysqli_query($conn, $query_q2);

    if (mysqli_num_rows($result_q2) == 1) {

        $row = mysqli_fetch_array($result_q2);

        $q = $row['q'];
        $qn = $q - 1;

        $query_uq2 = "UPDATE `add2` SET `q` = '$qn' WHERE `title` = '$add2'";
        $result_uq2 = mysqli_query($conn, $query_uq2);

    }
    $query_q4 = "SELECT q FROM `add2` WHERE `title` = '$add4'";
    $result_q4 = mysqli_query($conn, $query_q4);

    if (mysqli_num_rows($result_q4) == 1) {
        $row = mysqli_fetch_array($result_q4);

        $q = $row['q'];
        $qn = $q - 1;

        $query_uq4 = "UPDATE `add2` SET `q` = '$qn' WHERE `title` = '$add4'";
        $result_uq4 = mysqli_query($conn, $query_uq4);

    }
    $query_q5 = "SELECT q FROM `add2` WHERE `title` = '$add5'";
    $result_q5 = mysqli_query($conn, $query_q5);

    if (mysqli_num_rows($result_q5) == 1) {
        $row = mysqli_fetch_array($result_q5);

        $q = $row['q'];
        $qn = $q - 1;

        $query_uq5 = "UPDATE `add2` SET `q` = '$qn' WHERE `title` = '$add5'";
        $result_uq5 = mysqli_query($conn, $query_uq5);

    }

    $query_general = "INSERT INTO `general`(`type`, `customer`, `cel_phone`, `cnee`, `cnee_cel_phone`, `inscription`, `delivery_date`, `address`,`nro`, `location`, `referencia`, `product`, `add1`, `add2`,`add3`, `schedule_available`, `payment_mode`, `in_ars`,`out_ars`,`status`, `status_pago`) VALUES ('con_envio', '$customer', '$cel_phone', '$cnee', '$cnee_cel_phone', '$inscription', '$delivery_date', '$address','$nro', '$location', '$referencia', '$product', '$add1', '$BDadd2','$add3', '$schedule_available', '$payment_mode', '$total','$costo','PARA HACER', 'NO PAGADO')";
    $result_general = mysqli_query($conn, $query_general);

    $id = mysqli_insert_id($conn);

    $to = 'laboratorio@picadasmacanudas.com';

    //remitente del correo
    $from = 'laboratorio@picadasmacanudas.com';
    $fromName = 'Picadas Macanudas';

    //Asunto del email
    $subject = 'Nuevo Pedido CON ENVIO :: ' . $product;

    //Contenido del Email
    $htmlContent =
        '<head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
        </style>
        </head>
        <body>
        <h4 style="color:#2E303E;"> Estimada Sol:</h4>
        <br>
        <p> Hay un nuevo pedido para realizar para el dia:  ' . $delivery_date . '</p>
        <br>
        <p><strong>Cliente: <strong>' . $customer . '(' . $cel_phone . ')</p>
        <p><strong>Dedicatoria: <strong>' . $inscription . '</p>
        <p><strong>Fecha: <strong>' . $delivery_date . '(' . $schedule_available . ')</p>
        <p><strong>Direccion: <strong>' . $address . ' ' . $nro . ' ( ' . $referencia . ') - ' . $location . '</p>
        <p><strong>Pedido: <strong>' . $product . ' ( ' . $add3 . ' - ' . $add1 . ')</p>
        <p><strong>Agregados: <strong>' . $BDadd2 . '</p>
        <p><strong>Total: <strong>' . $total . '</p>
        <p><strong>Modo de Pago: <strong>' . $payment_mode . '</p>
        <br>
        <br>
        <br>
        <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="http://builditdesing.com" >BUILD.IT</a> utilizada por Picadas Macanudas :: Sabores que compartimos.</p>
        </body>
        </html>';

    //Encabezado para información del remitente
    $headers = "De: $fromName" . " <" . $from . ">";

    //Limite Email
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    //Encabezados para archivo adjunto
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    //límite multiparte
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

    //Enviar EMail
    $mail = @mail($to, $subject, $message, $headers);

    if (!$result_general) {

        $_SESSION['message'] = 'Ups! no se envio el pedido';
        $_SESSION['message_type'] = 'danger';
        header('location:../forms/forms_envios.php');

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
            header('location:../forms/forms_envios.php');
        }
    }
}

if (isset($_POST['confirmar_retiro'])) {

    $customer = $_POST['customer'];
    $cel_phone = $_POST['cel_phone'];
    $inscription = $_POST['inscription'];
    $delivery_date = $_POST['delivery_date'];
    $product = $_POST['product'];
    $add1 = $_POST['add1'];
    $schedule_available = $_POST['schedule_available'];
    $payment_mode = $_POST['payment_mode'];
    $total = $_POST['total'];
    $costo = $_POST['costo'];
    $add3 = $_POST['add3'];
    $add2 = $_POST['add2'];
    $add4 = $_POST['add4'];
    $add5 = $_POST['add5'];

    $BDadd2 = $add2 . ' - ' . $add4 . ' - ' . $add5;

    $query_q2 = "SELECT q FROM `add2` WHERE `title` = '$add2'";
    $result_q2 = mysqli_query($conn, $query_q2);

    if (mysqli_num_rows($result_q2) == 1) {

        $row = mysqli_fetch_array($result_q2);

        $q = $row['q'];
        $qn = $q - 1;

        $query_uq2 = "UPDATE `add2` SET `q` = '$qn' WHERE `title` = '$add2'";
        $result_uq2 = mysqli_query($conn, $query_uq2);

    }
    $query_q4 = "SELECT q FROM `add2` WHERE `title` = '$add4'";
    $result_q4 = mysqli_query($conn, $query_q4);

    if (mysqli_num_rows($result_q4) == 1) {
        $row = mysqli_fetch_array($result_q4);

        $q = $row['q'];
        $qn = $q - 1;

        $query_uq4 = "UPDATE `add2` SET `q` = '$qn' WHERE `title` = '$add4'";
        $result_uq4 = mysqli_query($conn, $query_uq4);

    }
    $query_q5 = "SELECT q FROM `add2` WHERE `title` = '$add5'";
    $result_q5 = mysqli_query($conn, $query_q5);

    if (mysqli_num_rows($result_q5) == 1) {
        $row = mysqli_fetch_array($result_q5);

        $q = $row['q'];
        $qn = $q - 1;

        $query_uq5 = "UPDATE `add2` SET `q` = '$qn' WHERE `title` = '$add5'";
        $result_uq5 = mysqli_query($conn, $query_uq5);

    }

    $query_id = 'SELECT (MAX(id)+1) AS id FROM general';
    $result_id = mysqli_query($conn, $query_id);
    if (mysqli_num_rows($result_id) == 1) {

        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
    }

    $query_general = "INSERT INTO `general`(`type`, `customer`, `cel_phone`, `inscription`, `delivery_date`,`product`, `add1`, `add2`, `add3`, `schedule_available`, `payment_mode`, `in_ars`,`out_ars`,`status`, `status_pago`) VALUES ('con_retiro', '$customer', '$cel_phone', '$inscription', '$delivery_date', '$product', '$add1', '$BDadd2','$add3', '$schedule_available', '$payment_mode', '$total','$costo','PARA HACER', 'NO PAGADO')";
    $result_general = mysqli_query($conn, $query_general);
    $id = mysqli_insert_id($conn);

    $to = 'laboratorio@picadasmacanudas.com';

    //remitente del correo
    $from = 'laboratorio@picadasmacanudas.com';
    $fromName = 'Picadas Macanudas';

    //Asunto del email
    $subject = 'Nuevo Pedido CON RETIRO :: ' . $product;

    //Contenido del Email
    $htmlContent =
        '<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    </style>
    </head>
    <body>
    <h4 style="color:#2E303E;"> Estimada Sol:</h4>
    <br>
    <p> Hay un nuevo pedido para realizar para el dia:  ' . $delivery_date . '</p>
    <br>
    <p><strong>Cliente: <strong>' . $customer . '(' . $cel_phone . ')</p>
    <p><strong>Dedicatoria: <strong>' . $inscription . '</p>
    <p><strong>Fecha: <strong>' . $delivery_date . '(' . $schedule_available . ')</p>
    <p><strong>Pedido: <strong>' . $product . ' ( ' . $add3 . ' - ' . $add1 . ')</p>
    <p><strong>Agregados: <strong>' . $BDadd2 . '</p>
    <p><strong>Total: <strong>' . $total . '</p>
    <p><strong>Modo de Pago: <strong>' . $payment_mode . '</p>
    <br>
    <br>
    <br>
    <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="http://builditdesing.com" >BUILD.IT</a> utilizada por Picadas Macanudas :: Sabores que compartimos.</p>
    </body>
    </html>';

    //Encabezado para información del remitente
    $headers = "De: $fromName" . " <" . $from . ">";

    //Limite Email
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    //Encabezados para archivo adjunto
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

    //límite multiparte
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

    //Enviar EMail
    $mail = @mail($to, $subject, $message, $headers);

    if (!$result_general) {

        $_SESSION['message'] = 'Ups! no se envio el pedido';
        $_SESSION['message_type'] = 'danger';
        header('location:../forms/forms_retiros.php');

    } else {

        if ($payment_mode == 'TRANSFERENCIA') {

            $_SESSION['message'] = 'Genial! Retirar por Amado Nervo 562 - Dorrego <br>
                Para hacer la Transferencia:<br>
                Banco Galicia<br>
                MARIA FLORENCIA<br>
                CTA: 4032793-1 247-0<br>
                CBU: 00702470-30004032793102<br>
                CUIL: 27-32975147-9';
            $_SESSION['message_type'] = 'warning';
            header('location:../forms/forms_retiros.php');

        } elseif ($payment_mode == 'Mercado Pago') {

            header('location:../forms/mercadopago.php?id=' . $id);
            // payment mode = efectivo
        } else {

            $_SESSION['message'] = 'Genial! Retirar por Amado Nervo 562 - Dorrego';
            $_SESSION['message_type'] = 'warning';
            header('location:../forms/forms_retiros.php');
        }
    }
}
