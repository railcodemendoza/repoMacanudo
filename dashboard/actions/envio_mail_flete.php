<?php include('../db.php'); ?>

<?php
// Establecer la conexión connuestra base de datos y que podamos ejecutar las instrucciones para recuperar la información.

if(isset($_POST['envio_lunes'])){

$query = "SELECT id, cnee, cnee_cel_phone,address, nro, location, referencia,CONCAT(product,add2,add3,add1), schedule_available, status_pago, in_ars FROM `general` where type = 'con_envio' and `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 0";
$resultado = mysqli_query ($conn, $query);
// sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    

$activas = array();
while( $row = mysqli_fetch_assoc($resultado) ) {
$activas[] = $row;
}

    $date = date('Y-m-d');
    
    $filename = "PlanillaFletes_$date.xls";
    $content= header("Content-Type: application/xls");    
    $content .=header("Content-Disposition: signal; filename=$filename"); 
    $content .=header("Pragma: no-cache"); 
    $content .=header("Expires: 0");

    $separator = "\t";
    if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
        
        $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");      
    
        $content .= implode($separator, $titulo) . "\n";
        
        //Loop through the rows
        foreach($activas as $row_activa){
            
            //Clean the data and remove any special characters that might conflict
            foreach($row_activa as $k => $v){
                if($k == 'status_pago'){
                    if($v == 'PAGADO'){
                        $row_activa['status_pago'] = $row_activa['in_ars'] = '-';

                    }else{
                        $row_activa['status_pago'] = $row_activa['in_ars'];
                    }
                }
                if($k == 'in_ars'){
                    $row_activa['in_ars'] = '';
                }

                $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                $row_activa[$k] = trim($row_activa[$k]);

            }
            
            
            //Implode and print the columns out using the 
            //$separator as the glue parameter
            
            $content .= implode($separator, $row_activa) . "\n";
        }

        file_put_contents( $filename,$content);

    }else{
        echo 'No hay datos a exportar';
    }
    
        
    $to = 'pablorio@botzero.tech,laboratorio@picadasmacanudas.com';
    $date = date('Y-m-d');

    //remitente del correo
    $from = 'pablorio@botzero.tech';
    $fromName = 'Picadas Macanudas';

//Asunto del email
$subject = '['.$date.'] Instrucciones de fletes Picadas Macanudas.'; 

//Ruta del archivo adjunto
$file_ad = $filename;

//Contenido del Email
$htmlContent = 
'<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0"

<style>
    body{
        font-family: "Baloo 2", cursive";
    }
</style>
</head>
<body>
<h4 style="color:#2E303E;"> Estimados:</h4>
<br>
<p>  En adjunto encontrará la Planilla de Fletes para entregas Correspondiente al día ' .$date. '</p>

<br>
<p>  Por Favor ante cualquier inconveniete comunicarse al Celular.</p>
<p>  Atte, Picadas Macanudas.</p>

<br>
<br>
<p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BUILD.IT</a> utilizada por Picadas Macanudas</p>
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

//preparación de archivo

if(!empty($file_ad)){
    if(is_file($file_ad)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file_ad,"rb");
        $data =  @fread($fp,filesize($file_ad));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
        "Content-Description: ".basename($files[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//Enviar EMail
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 

    if($mail == true){

    $_SESSION['message'] = 'mail enviado correctamente';
    $_SESSION['message_type'] = 'success';
    header('location:../views/picadas_lunes.php');
    }else{
        $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/picadas_lunes.php');
    }
/*Estado de envío de correo electrónico
echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/


}

if(isset($_POST['envio_martes'])){

    $query = "SELECT id, cnee, cnee_cel_phone,address, nro, location, referencia,CONCAT(product,add2,add3,add1), schedule_available, status_pago, in_ars FROM `general` where type = 'con_envio' and `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 1";
    $resultado = mysqli_query ($conn, $query);
    // sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    
    
    $activas = array();
    while( $row = mysqli_fetch_assoc($resultado) ) {
    $activas[] = $row;
    }
    
        $date = date('Y-m-d');
        
        $filename = "PlanillaFletes_$date.xls";//ods
        $content= header("Content-Type: application/xls");    
        $content .=header("Content-Disposition: signal; filename=$filename"); 
        $content .=header("Pragma: no-cache"); 
        $content .=header("Expires: 0");
    
        $separator = "\t";
        if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
            
            $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");
     
            $content .= implode($separator, $titulo) . "\n";
        
            
            //Loop through the rows
            foreach($activas as $row_activa){
                
                //Clean the data and remove any special characters that might conflict
                foreach($row_activa as $k => $v){
                    if($k == 'status_pago'){
                        if($v == 'PAGADO'){
                            $row_activa['status_pago'] = $row_activa['in_ars'] = '-';
    
                        }else{
                            $row_activa['status_pago'] = $row_activa['in_ars'];
                        }
                    }
                    if($k == 'in_ars'){
                        $row_activa['in_ars'] = '';
                    }
    
                    $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                    $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                    $row_activa[$k] = trim($row_activa[$k]);
    
                }
                
                
                //Implode and print the columns out using the 
                //$separator as the glue parameter
                
                $content .= implode($separator, $row_activa) . "\n";
                
        }

        file_put_contents( $filename,$content);

    
        }else{
            echo 'No hay datos a exportar';
        }
        
            
        $to = 'pablorio@botzero.tech,laboratorio@picadasmacanudas.com';
        $date = date('Y-m-d');
    
        //remitente del correo
        $from = 'pablorio@botzero.tech';
        $fromName = 'Picadas Macanudas';
    
    //Asunto del email
    $subject = '['.$date.'] Instrucciones de fletes Picadas Macanudas.'; 
    
    //Ruta del archivo adjunto
    $file_ad = $filename;
    
    //Contenido del Email
    $htmlContent = 
    '<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    
    <style>
        body{
            font-family: "Baloo 2", cursive";
        }
    </style>
    </head>
    <body>
    <h4 style="color:#2E303E;"> Estimados:</h4>
    <br>
    <p>  En adjunto encontrará la Planilla de Fletes para entregas Correspondiente al día ' .$date. '</p>
    
    <br>
    <p>  Por Favor ante cualquier inconveniete comunicarse al Celular.</p>
    <p>  Atte, Picadas Macanudas.</p>
    
    <br>
    <br>
    <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BUILD.IT</a> utilizada por Picadas Macanudas</p>
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
    
    //preparación de archivo
    
    if(!empty($file_ad)){
        if(is_file($file_ad)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file_ad,"rb");
            $data =  @fread($fp,filesize($file_ad));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //Enviar EMail
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    
        if($mail == true){
    
        $_SESSION['message'] = 'mail enviado correctamente';
        $_SESSION['message_type'] = 'success';
        header('location:../views/picadas_martes.php');
        }else{
            $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte';
            $_SESSION['message_type'] = 'danger';
            header('location:../views/picadas_martes.php');
        }
    /*Estado de envío de correo electrónico
    echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/
    
    
    }
    
if(isset($_POST['envio_miercoles'])){

    $query = "SELECT id, cnee, cnee_cel_phone,address, nro, location, referencia,CONCAT(product,add2,add3,add1), schedule_available, status_pago, in_ars FROM `general` where type = 'con_envio' and `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 2";
    $resultado = mysqli_query ($conn, $query);
    // sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    
    
    $activas = array();
    while( $row = mysqli_fetch_assoc($resultado) ) {
    $activas[] = $row;
    }
    
        $date = date('Y-m-d');
        
        $filename = "PlanillaFletes_$date.xls";
        $content= header("Content-Type: application/xls");    
        $content .=header("Content-Disposition: signal; filename=$filename"); 
        $content .=header("Pragma: no-cache"); 
        $content .=header("Expires: 0");
    
        $separator = "\t";
        if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
            
            $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");
     
            
        
            $content .= implode($separator, $titulo) . "\n";
            
            //Loop through the rows
            foreach($activas as $row_activa){
                
                //Clean the data and remove any special characters that might conflict
                foreach($row_activa as $k => $v){
                    if($k == 'status_pago'){
                        if($v == 'PAGADO'){
                            $row_activa['status_pago'] = $row_activa['in_ars'] = '-';
    
                        }else{
                            $row_activa['status_pago'] = $row_activa['in_ars'];
                        }
                    }
                    if($k == 'in_ars'){
                        $row_activa['in_ars'] = '';
                    }
    
                    $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                    $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                    $row_activa[$k] = trim($row_activa[$k]);
    
                }
                
                
                //Implode and print the columns out using the 
                //$separator as the glue parameter
                $content .= implode($separator, $row_activa) . "\n";
            }
    
            file_put_contents( $filename,$content);
    
    
        }else{
            echo 'No hay datos a exportar';
        }
        
            
        $to = 'pablorio@botzero.tech, laboratorio@picadasmacanudas.com';
        $date = date('Y-m-d');
    
        //remitente del correo
        $from = 'pablorio@botzero.tech';
        $fromName = 'Picadas Macanudas';
    
    //Asunto del email
    $subject = '['.$date.'] Instrucciones de fletes Picadas Macanudas.'; 
    
    //Ruta del archivo adjunto
    $file_ad = $filename;
    
    //Contenido del Email
    $htmlContent = 
    '<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    
    <style>
        body{
            font-family: "Baloo 2", cursive";
        }
    </style>
    </head>
    <body>
    <h4 style="color:#2E303E;"> Estimados:</h4>
    <br>
    <p>  En adjunto encontrará la Planilla de Fletes para entregas Correspondiente al día ' .$date. '</p>
    
    <br>
    <p>  Por Favor ante cualquier inconveniete comunicarse al Celular.</p>
    <p>  Atte, Picadas Macanudas.</p>
    
    <br>
    <br>
    <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BUILD.IT</a> utilizada por Picadas Macanudas</p>
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
    
    //preparación de archivo
    
    if(!empty($file_ad)){
        if(is_file($file_ad)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file_ad,"rb");
            $data =  @fread($fp,filesize($file_ad));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //Enviar EMail
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    
        if($mail == true){
    
        $_SESSION['message'] = 'mail enviado correctamente';
        $_SESSION['message_type'] = 'success';
        header('location:../views/picadas_miercoles.php');
        }else{
            $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte';
            $_SESSION['message_type'] = 'danger';
            header('location:../views/picadas_miercoles.php');
        }
    /*Estado de envío de correo electrónico
    echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/
    
    
    }
    
if(isset($_POST['envio_jueves'])){

    $query = "SELECT id, cnee, cnee_cel_phone,address, nro, location, referencia,CONCAT(product,add2,add3,add1), schedule_available, status_pago, in_ars FROM `general` where type = 'con_envio' and `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 3";
    $resultado = mysqli_query ($conn, $query);
    // sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    
    
    $activas = array();
    while( $row = mysqli_fetch_assoc($resultado) ) {
    $activas[] = $row;
    }
    
        $date = date('Y-m-d');
        
        $filename = "PlanillaFletes_$date.xls";
        $content= header("Content-Type: application/xls");    
        $content .=header("Content-Disposition: signal; filename=$filename"); 
        $content .=header("Pragma: no-cache"); 
        $content .=header("Expires: 0");
    
        $separator = "\t";
        if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
            
            $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");
     
            
        
            $content .= implode($separator, $titulo) . "\n";
            
            //Loop through the rows
            foreach($activas as $row_activa){
                
                //Clean the data and remove any special characters that might conflict
                foreach($row_activa as $k => $v){
                    if($k == 'status_pago'){
                        if($v == 'PAGADO'){
                            $row_activa['status_pago'] = $row_activa['in_ars'] = '-';
    
                        }else{
                            $row_activa['status_pago'] = $row_activa['in_ars'];
                        }
                    }
                    if($k == 'in_ars'){
                        $row_activa['in_ars'] = '';
                    }
    
                    $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                    $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                    $row_activa[$k] = trim($row_activa[$k]);
    
                }
                
                
                //Implode and print the columns out using the 
                //$separator as the glue parameter
                $content .= implode($separator, $row_activa) . "\n";
        }

        file_put_contents( $filename,$content);

    
        }else{
            echo 'No hay datos a exportar';
        }
        
            
        $to = 'pablorio@botzero.tech, laboratorio@picadasmacanudas.com';
        $date = date('Y-m-d');
    
        //remitente del correo
        $from = 'pablorio@botzero.tech';
        $fromName = 'Picadas Macanudas';
    
    //Asunto del email
    $subject = '['.$date.'] Instrucciones de fletes Picadas Macanudas.'; 
    
    //Ruta del archivo adjunto
    $file_ad = $filename;
    
    //Contenido del Email
    $htmlContent = 
    '<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    
    <style>
        body{
            font-family: "Baloo 2", cursive";
        }
    </style>
    </head>
    <body>
    <h4 style="color:#2E303E;"> Estimados:</h4>
    <br>
    <p>  En adjunto encontrará la Planilla de Fletes para entregas Correspondiente al día ' .$date. '</p>
    
    <br>
    <p>  Por Favor ante cualquier inconveniete comunicarse al Celular.</p>
    <p>  Atte, Picadas Macanudas.</p>
    
    <br>
    <br>
    <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BUILD.IT</a> utilizada por Picadas Macanudas</p>
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
    
    //preparación de archivo
    
    if(!empty($file_ad)){
        if(is_file($file_ad)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file_ad,"rb");
            $data =  @fread($fp,filesize($file_ad));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //Enviar EMail
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    
        if($mail == true){
    
        $_SESSION['message'] = 'mail enviado correctamente';
        $_SESSION['message_type'] = 'success';
        header('location:../views/picadas_jueves.php');
        }else{
            $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte';
            $_SESSION['message_type'] = 'danger';
            header('location:../views/picadas_jueves.php');
        }
    /*Estado de envío de correo electrónico
    echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/
    
    
    }
    
if(isset($_POST['envio_viernes'])){

    $query = "SELECT id, cnee, cnee_cel_phone,address, nro, location, referencia,CONCAT(product,add2,add3,add1), schedule_available, status_pago, in_ars FROM `general` where type = 'con_envio' and `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 4";
    $resultado = mysqli_query ($conn, $query);
    // sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    
    
    $activas = array();
    while( $row = mysqli_fetch_assoc($resultado) ) {
    $activas[] = $row;
    }
    
        $date = date('Y-m-d');
        
        $filename = "PlanillaFletes_$date.xls";
        $content= header("Content-Type: application/xls");    
        $content .=header("Content-Disposition: signal; filename=$filename"); 
        $content .=header("Pragma: no-cache"); 
        $content .=header("Expires: 0");
    
        $separator = "\t";
        if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
            
            $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");
     
            
        
            $content .= implode($separator, $titulo) . "\n";
            
            //Loop through the rows
            foreach($activas as $row_activa){
                
                //Clean the data and remove any special characters that might conflict
                foreach($row_activa as $k => $v){
                    if($k == 'status_pago'){
                        if($v == 'PAGADO'){
                            $row_activa['status_pago'] = $row_activa['in_ars'] = '-';
    
                        }else{
                            $row_activa['status_pago'] = $row_activa['in_ars'];
                        }
                    }
                    if($k == 'in_ars'){
                        $row_activa['in_ars'] = '';
                    }
    
                    $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                    $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                    $row_activa[$k] = trim($row_activa[$k]);
    
                }
                
                
                //Implode and print the columns out using the 
                //$separator as the glue parameter
                $content .= implode($separator, $row_activa) . "\n";
        }

        file_put_contents( $filename,$content);

        }else{
            echo 'No hay datos a exportar';
        }
        
            
        $to = 'pablorio@botzero.tech, laboratorio@picadasmacanudas.com';
        $date = date('Y-m-d');
    
        //remitente del correo
        $from = 'pablorio@botzero.tech';
        $fromName = 'Picadas Macanudas';
    
    //Asunto del email
    $subject = '['.$date.'] Instrucciones de fletes Picadas Macanudas.'; 
    
    //Ruta del archivo adjunto
    $file_ad = $filename;
    
    //Contenido del Email
    $htmlContent = 
    '<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    
    <style>
        body{
            font-family: "Baloo 2", cursive";
        }
    </style>
    </head>
    <body>
    <h4 style="color:#2E303E;"> Estimados:</h4>
    <br>
    <p>  En adjunto encontrará la Planilla de Fletes para entregas Correspondiente al día ' .$date. '</p>
    
    <br>
    <p>  Por Favor ante cualquier inconveniete comunicarse al Celular.</p>
    <p>  Atte, Picadas Macanudas.</p>
    
    <br>
    <br>
    <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BUILD.IT</a> utilizada por Picadas Macanudas</p>
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
    
    //preparación de archivo
    
    if(!empty($file_ad)){
        if(is_file($file_ad)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file_ad,"rb");
            $data =  @fread($fp,filesize($file_ad));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //Enviar EMail
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    
        if($mail == true){
    
        $_SESSION['message'] = 'mail enviado correctamente';
        $_SESSION['message_type'] = 'success';
        header('location:../views/picadas_viernes.php');
        }else{
            $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte';
            $_SESSION['message_type'] = 'danger';
            header('location:../views/picadas_viernes.php');
        }
    /*Estado de envío de correo electrónico
    echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/
    
    
    }
    
if(isset($_POST['envio_sabado'])){

    $query = "SELECT id, cnee, cnee_cel_phone,address, nro, location, referencia,CONCAT(product,add2,add3,add1), schedule_available, status_pago, in_ars FROM `general` where type = 'con_envio' and `delivery_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND delivery_date >= CURDATE() AND WEEKDAY(`delivery_date`) = 5";
    $resultado = mysqli_query ($conn, $query);
    // sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    
    
    $activas = array();
    while( $row = mysqli_fetch_assoc($resultado) ) {
    $activas[] = $row;
    }
    
        $date = date('Y-m-d');
        
        $filename = "PlanillaFletes_$date.xls";
        $content= header("Content-Type: application/xls");    
        $content .=header("Content-Disposition: signal; filename=$filename"); 
        $content .=header("Pragma: no-cache"); 
        $content .=header("Expires: 0");
    
        $separator = "\t";
        if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
            
            $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");
     
            
        
            $content .= implode($separator, $titulo) . "\n";
            
            //Loop through the rows
            foreach($activas as $row_activa){
                
                //Clean the data and remove any special characters that might conflict
                foreach($row_activa as $k => $v){
                    if($k == 'status_pago'){
                        if($v == 'PAGADO'){
                            $row_activa['status_pago'] = $row_activa['in_ars'] = '-';
    
                        }else{
                            $row_activa['status_pago'] = $row_activa['in_ars'];
                        }
                    }
                    if($k == 'in_ars'){
                        $row_activa['in_ars'] = '';
                    }
    
                    $row_activa[$k] = str_replace($separator . "$", "", $row_activa[$k]);
                    $row_activa[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row_activa[$k]);
                    $row_activa[$k] = trim($row_activa[$k]);
    
                }
                
                
                //Implode and print the columns out using the 
                //$separator as the glue parameter
                $content .= implode($separator, $row_activa) . "\n";
            }
    
            file_put_contents( $filename,$content);
    
    
        }else{
            echo 'No hay datos a exportar';
        }
        
            
        $to = 'pablorio@botzero.tech,laboratorio@picadasmacanudas.com';
        $date = date('Y-m-d');
    
        //remitente del correo
        $from = 'pablorio@botzero.tech';
        $fromName = 'Picadas Macanudas';
    
    //Asunto del email
    $subject = '['.$date.'] Instrucciones de fletes Picadas Macanudas.'; 
    
    //Ruta del archivo adjunto
    $file_ad = $filename;
    
    //Contenido del Email
    $htmlContent = 
    '<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    
    <style>
        body{
            font-family: "Baloo 2", cursive";
        }
    </style>
    </head>
    <body>
    <h4 style="color:#2E303E;"> Estimados:</h4>
    <br>
    <p>  En adjunto encontrará la Planilla de Fletes para entregas Correspondiente al día ' .$date. '</p>
    
    <br>
    <p>  Por Favor ante cualquier inconveniete comunicarse al Celular.</p>
    <p>  Atte, Picadas Macanudas.</p>
    
    <br>
    <br>
    <p style="text-align:center; color:#2E303E">Tecnología de <a style="color:#17A589;" href="https://bit.ly/botzero" >BUILD.IT</a> utilizada por Picadas Macanudas</p>
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
    
    //preparación de archivo
    
    if(!empty($file_ad)){
        if(is_file($file_ad)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file_ad,"rb");
            $data =  @fread($fp,filesize($file_ad));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file_ad)."\"\n" . 
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file_ad)."\"; size=".filesize($file_ad).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //Enviar EMail
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    
        if($mail == true){
    
        $_SESSION['message'] = 'mail enviado correctamente';
        $_SESSION['message_type'] = 'success';
        header('location:../views/picadas_sabados.php');
        }else{
            $_SESSION['message'] = 'Algo Salio Mal!! Instructivo NO enviado correctemnte';
            $_SESSION['message_type'] = 'danger';
            header('location:../views/picadas_sabados.php');
        }
    /*Estado de envío de correo electrónico
    echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/
    
    
    }
?>