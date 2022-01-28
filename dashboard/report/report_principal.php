
<?php include('../db.php'); ?>

<?php
// Establecer la conexión connuestra base de datos y que podamos ejecutar las instrucciones para recuperar la información.



$query = "SELECT id, type, customer, cel_phone, cnee, cnee_cel_phone, inscription, delivery_date, location, product, add1, add2, payment_mode, in_ars,status, status_pago  FROM `general`";
$resultado = mysqli_query ($conn, $query);
// sentencia SQL que se encargará de recuperar la información. En nuestro ejemplo, recuperamos todos los registros almacenados en la tabla “libros”.    

$activas = array();
while( $row = mysqli_fetch_assoc($resultado) ) {
$activas[] = $row;
}

if(isset($_POST["export_data"])) { //  comprobar que se ha pulsado el botón
    $date = date('Y-m-d');
    $filename = "Picadas_$date.xls";
    header("Content-Type: application/xls");    
    header("Content-Disposition: signal; filename=$filename");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $separator = "\t";
    if(!empty($activas)) { // comprobaremos que el array “activas” no está vacío. Si lo está mostraremos un mensaje indicando que no hay datos a mostrar.
  
        echo implode($separator, array_keys($activas[0])) . "\n";
    
        //Loop through the rows
        foreach($activas as $row_activa){
            
            //Clean the data and remove any special characters that might conflict
            foreach($row_activa as $k => $v){
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
