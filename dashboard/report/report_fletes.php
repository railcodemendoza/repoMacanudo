<?php include('../db.php'); 

// Establecer la conexión connuestra base de datos y que podamos ejecutar las instrucciones para recuperar la información.

$query = "SELECT id, cnee, cnee_cel_phone, address, nro, location, referencia, product, schedule_available, status_pago, in_ars  FROM `general` where type = 'con_envio'";
$resultado = mysqli_query ($conn, $query);
// sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    

$activas = array();
while( $row = mysqli_fetch_assoc($resultado) ) {
$activas[] = $row;
}


if(isset($_POST["export_data"])) { //  comprobar que se ha pulsado el botón
    $date = date('Y-m-d');
    $filename = "PlanillaFletes_$date.xls";
    
    //$content = header("Content-Type: application/xls"); 
    $content = header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");   
    $content .= header("Content-Disposition: attachement; filename=$filename"); 
    $content .= header("Pragma: no-cache");
    $content .= header('Cache-Control: max-age=0'); 
    $content .= header("Expires: 0");

    $separator = "\t";
    if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
        
        $titulo = array("#","Recibe","Telefono","Calle y Altura","Piso - Dpto","Localidad","Referencia","Bultos","Horarios","Cobrar");
 
        
       
        echo implode($separator, $titulo) . "\n";
        
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
            echo implode($separator, $row_activa) . "\n";
        }

    }else{
        echo 'No hay datos a exportar';
    }

    exit;
   }


?>
