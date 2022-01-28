<?php 
include '../db.php';

if (isset($_POST['confirmar_promocion'])) {

    foreach ($_POST['location'] as $location);
    foreach ($_POST['schedule_available'] as $schedule_available);
    foreach ($_POST['payment_mode'] as $payment_mode);
    foreach ($_POST['cerveza'] as $cerveza);

    $customer = $_POST['customer'];
    $cel_phone = $_POST['cel_phone'];
    $cnee = $_POST['cnee'];
    $cnee_cel_phone = $_POST['cnee_cel_phone'];
    $inscription = $_POST['inscription'];
    $delivery_date = $_POST['delivery_date'];
    $address = $_POST['address'];
    $referencia = $_POST['referencia'];
    $add2 = 'Cerveza ' . $cerveza . ' - Mix de Chocolates';

    $query_id = 'SELECT (MAX(id)+1) AS id FROM general';
    $result_id = mysqli_query($conn, $query_id);
    
    if (mysqli_num_rows($result_id) == 1) {

        $row = mysqli_fetch_array($result_id);
        $id = $row['id'];
    }

    $query_general = "INSERT INTO `general`(`type`, `customer`, `cel_phone`, `cnee`, `cnee_cel_phone`, `inscription`, `delivery_date`, `address`, `location`, `referencia`, `product`, `add1`, `add2`,`add3`, `schedule_available`, `payment_mode`, `in_ars`,`out_ars`,`status`, `status_pago`) VALUES ('con_envio', '$customer', '$cel_phone', '$cnee', '$cnee_cel_phone', '$inscription', '$delivery_date', '$address', '$location', '$referencia', 'Fellini Dia de la Madre', '4', '$add2','MDF', '$schedule_available', '$payment_mode', '1800','1440','PARA HACER', 'NO PAGADO')";
    $result_general = mysqli_query($conn, $query_general);
    $id = mysqli_insert_id($conn);

    $to = 'laboratorio@picadasmacanudas.com';

    //remitente del correo
    $from = 'laboratorio@picadasmacanudas.com';
    $fromName = 'Picadas Macanudas';

    //Asunto del email
    $subject = 'Nuevo Pedido DIA DE LA MADRE :: ' . $product;

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
    <p><strong>Direccion: <strong>' . $address . ' ( ' . $referencia . ') - ' . $location . ')</p>
    <p><strong>Pedido: <strong> Fellini Dia de la Madre ( ' . $add2 . ') - MDF.</p>
    <p><strong>Total: <strong>$ 1800.00</p>
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
        header('location:../forms/forms_promociones.php');

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
            header('location:../forms/forms_promociones.php');

        } elseif ($payment_mode == 'Mercado Pago') {
            header('location:../forms/forms_promociones.php');

            // header('location:../forms/mercadopago.php?id='.$id);

        } else {
            $_SESSION['message'] = 'Su pedido a sido registrado correctamente';
            $_SESSION['message_type'] = 'warning';
            header('location:../forms/forms_promociones.php');
        }
    }
}

if ( isset($_GET['enamorados'])) {

    foreach ($_GET['product'] as $product);
    foreach ($_GET['location'] as $location);
    foreach ($_GET['schedule_available'] as $schedule_available);
    foreach ($_GET['payment_mode'] as $payment_mode);

    $customer = $_GET['customer'];
    $cel_phone = $_GET['cel_phone'];
    $cnee = $_GET['cnee'];
    $cnee_cel_phone = $_GET['cnee_cel_phone'];
    $inscription = $_GET['inscription'];
    $delivery_date = $_GET['delivery_date'];
    $address = $_GET['address'];
    $referencia = $_GET['referencia'];

    if ($product == 'felini') {

        $total_product = 2200;
        $costo_product = 1760;
        $product = 'Felini día de los enamorados.';

    } else {

        $total_product = 2600;
        $costo_product = 2080;
        $product = 'Picaso día de los enamorados.';

    }

    $result_km = "";

    if ($location == 'sinEntrega') {

        $total_delivery = 0;
        $tipo = 'con_retiro';

    } else {

        $query_km = "SELECT px_km FROM `delivery` WHERE location = '$location'";
        $result_km = mysqli_query($conn, $query_km);

        if (mysqli_num_rows($result_km) == 1) {

            $row = mysqli_fetch_array($result_km);

            $total_delivery = $row['px_km'];
            $tipo = 'con_envio';

        }
    }

    $total = $total_product + $total_delivery;
    $costo = $costo_product + $total_delivery;

    $query_general = "INSERT INTO `general`(`type`, `customer`, `cel_phone`, `cnee`, `cnee_cel_phone`, `inscription`, `delivery_date`, `address`, `location`, `referencia`, `product`,`schedule_available`, `payment_mode`, `in_ars`,`out_ars`,`status`, `status_pago`) VALUES ('$tipo', '$customer', '$cel_phone', '$cnee', '$cnee_cel_phone', '$inscription', '$delivery_date', '$address', '$location', '$referencia', '$product', '$schedule_available', '$payment_mode', '$total','$costo','PARA HACER', 'NO PAGADO')";
    $result_general = mysqli_query($conn, $query_general);
    $id = mysqli_insert_id($conn);

    $to = 'laboratorio@picadasmacanudas.com';

//remitente del correo
    $from = 'laboratorio@picadasmacanudas.com';
    $fromName = 'Picadas Macanudas';

//Asunto del email
    $subject = 'Nuevo Pedido DIA DE LOS ENAMORADOS :: ' . $product;

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
    <p><strong>Direccion: <strong>' . $address . ' ( ' . $referencia . ') - ' . $location . ')</p>
    <p><strong>Pedido: <strong>' . $product . '</p>
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
        header('location:../forms/forms_fin_de_año.php');

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
            header('location:../forms/forms_promociones.php');

        } elseif ($payment_mode == 'Mercado Pago') {
            // header('location:../forms/forms_fin_de_año.php');
            header('location:../forms/mercadopago.php?id=' . $id);

        } else {
            $_SESSION['message'] = 'Su pedido a sido registrado correctamente';
            $_SESSION['message_type'] = 'warning';
            header('location:../forms/forms_fin_de_año.php');

        }
    }
}

?>