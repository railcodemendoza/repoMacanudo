<?php include('../db.php'); ?>

<?php

$user = 'Tincho';
$company = 'Picadas Macanudas';

if(isset($_POST['enviar'])) {   // me traigo la informacion segun ID seleccionada. 
    
   /* $query_contacto = "SELECT * FROM users WHERE username = '$user'";
    $result_contacto = mysqli_query($conn, $query_contacto);

    if (mysqli_num_rows($result_contacto) == 1) {

        $row = mysqli_fetch_array($result_contacto);

        $email = $row['email'];
        $celular = $row['celular'];
        $permiso = $row['permiso'];

    }*/

    
    foreach($_POST['area'] as $area);
    $deadline = $_POST['deadline'];
    $title = $_POST['title'];
    $description = $_POST['description']; 
    
    $conn_builit = mysqli_connect(
        '31.170.161.22',
        'u101685278_buildit',
        'Pachiman2020',
        'u101685278_buildit'
      );

    $query = "INSERT INTO `ticket_macanudas`(`title`, `dead_line`, `descripcion`, `user`, `empresa`, `status`,`area`) VALUES ('$title','$deadline','$description','$user','$company','resolver','$area')";
    $result = mysqli_query($conn_builit, $query);
   
    $to = 'pablorio@builditdesing.com';

    //remitente del correo
    $from = 'Picadas Macanudas';
    $fromName = 'Picadas Macanudas';

            //Asunto del email
            $subject = 'Nuevo Ticket :: '.$area.' - '.$user .'['.$company.']'; 

            //Contenido del Email
            $htmlContent = 
            '<head>

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
            <style>
                body{
                    font-family: "Baloo 2", cursive";
                }
            </style>
            </head>
            <body>
            <h4 style="color:#2E303E;"> Estimados:</h4>
            <br>
            <p>  Hay un nuevo ticket para resolver:</p>
            <p><strong>User: <strong>' . $user . '</p>
            <p><strong>Celular: <strong> 2613405502</p>
            <p><strong>Permiso: <strong>all</p>
            <br>
            <br>
            <br>
            <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://builditdesing.com" >BUILD.IT</a> utilizada por Picadas Macanudas.</p>
            </body>
            </html>';

            //Encabezado para información del remitente
            $headers = "De: $fromName"." <".$from.">";

            //Limite Email
            $semi_rand = md5(time()); 
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

            //Encabezados para archivo adjunto 
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

            //límite multiparte
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;

            //Enviar EMail
                $mail = @mail($to, $subject, $message, $headers, $returnpath); 

                if($result = true){
                    
                    $_SESSION['message'] = 'Ticket Generado Correctamente  ';
                    $_SESSION['message_type'] = 'info';
                    header('location:../ayuda/ayuda.php');
                }else{

                    $_SESSION['message'] = 'Hubo algun error en el Ticket, vuelva a intentarlo!';
                    $_SESSION['message_type'] = 'danger';
                    header('location:../ayuda/ayuda.php');

                }

        }
        
if(isset($_POST['enviar_respuesta'])) {   // me traigo la informacion segun ID seleccionada. 
    
    /*$query_contacto = "SELECT * FROM users WHERE username = '$user'";
    $result_contacto = mysqli_query($conn, $query_contacto);

    if (mysqli_num_rows($result_contacto) == 1) {

        $row = mysqli_fetch_array($result_contacto);

        $email = $row['email'];
        $celular = $row['celular'];
        $permiso = $row['permiso'];

    }*/

    
    $deadline = $_POST['deadline'];
    $area = $_POST['area'];
    $title = $_POST['title'];
    $description = $_POST['description']; 
    
    $conn_builit = mysqli_connect(
        '31.170.161.22',
        'u101685278_buildit',
        'Pachiman2020',
        'u101685278_buildit'
      );

    $query = "INSERT INTO `ticket_macanudas`(`title`, `dead_line`, `descripcion`, `user`, `empresa`, `status`,`area`) VALUES ('$title','$deadline','$description','$user','$company','resolver','$area')";
    $result = mysqli_query($conn_builit, $query);
   
    $to = 'pablorio@builditdesing.com';

    //remitente del correo
    $from = 'Picadas Macanudas';
    $fromName = 'Picadas Macanudas';

            //Asunto del email
            $subject = 'Nuevo Ticket :: '.$area.' - Tincho [ Picadas Macanudas]'; 

            //Contenido del Email
            $htmlContent = 
            '<head>

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
            <style>
                body{
                    font-family: "Baloo 2", cursive";
                }
            </style>
            </head>
            <body>
            <h4 style="color:#2E303E;"> Estimados:</h4>
            <br>
            <p>  Hay un nuevo ticket para resolver:</p>
            <p><strong>User: <strong>' . $user . '</p>
            <p><strong>Celular: <strong> 2613405502</p>
            <p><strong>Permiso: <strong>all</p>
            <br>
            <br>
            <br>
            <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://builditdesing.com" >BUILD.IT</a> utilizada por Picadas Macanudas.</p>
            </body>
            </html>';

            //Encabezado para información del remitente
            $headers = "De: $fromName"." <".$from.">";

            //Limite Email
            $semi_rand = md5(time()); 
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

            //Encabezados para archivo adjunto 
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

            //límite multiparte
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;

            //Enviar EMail
                $mail = @mail($to, $subject, $message, $headers, $returnpath); 

                if($result = true){
                    
                    $_SESSION['message'] = 'Ticket Generado Correctamente  ';
                    $_SESSION['message_type'] = 'info';
                    header('location:../ayuda/ayuda.php');
                }else{

                    $_SESSION['message'] = 'Hubo algun error en el Ticket, vuelva a intentarlo!';
                    $_SESSION['message_type'] = 'danger';
                    header('location:../ayuda/ayuda.php');

                }

        }