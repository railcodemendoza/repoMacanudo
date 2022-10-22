<?php include('../db.php'); ?>


<?php 



if(isset($_POST['agregar'])) {

    $id = $_GET['id'];
    $vista = $_GET['vista'];
    // traemos todos los datos. 

    $cantidad = $_POST['cantidad'];
    $out = $_POST['out'];
    $invoice = $_POST['invoice'];
    foreach ($_POST['proveedor'] as $proveedor);

    // seleccionamos los datos del articulo 

    $query_datos = "SELECT * FROM add2 WHERE id = $id";
    $result_datos = mysqli_query($conn, $query_datos);
    
    while($row = mysqli_fetch_assoc($result_datos)) { 
                                                
        $q = $row['q'];
    
    }
    
    // sumamos los tatos para actualizar el stock. 

    $q_total = $cantidad + $q;
    $total_invoice = $out * $q;
    

    // actualizamos los datos en las tablas.

    // --- Tabla Stock ----
    $query = "UPDATE `add2` SET `q`= $q_total,`out_ars`='$out' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // --- Tabla Administracion ----

    $query_out_list = "INSERT INTO `out_list`(`invoice`, `proveedor`, `out_ars`) VALUES ('$invoice','$proveedor','$total_invoice')";
    $result_out_list = mysqli_query($conn, $query_out_list);
    
    if(!$result_out_list) {
        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../views/proveedores_$vista.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../views/proveedores_$vista.php'; 
                </script>"; 

        
    }
}

if(isset($_POST['agregar_producto'])){
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $in_ars = $_POST['in_ars'];
    foreach ($_POST['proveedor'] as $proveedor);
    $imagen = $_FILES['imagen']['name'];
    $stock = $_POST['stock'];
    
    $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
    $max_tamanyo = 1024 * 1024 * 8;

    $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
    $ruta_nuevo_destino = '../../assets/img/add2/' . $_FILES['imagen']['name'];
    if ( in_array($_FILES['imagen']['type'], $extensiones) ) {
        if ( $_FILES['imagen']['size']< $max_tamanyo ) {
            if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {

                $query = "INSERT INTO `add2`(`title`, `description`, `in_ars`,`proveedor`,`q`,`img`) VALUES ('$title','$description','$in_ars','$proveedor','$stock','$imagen')";
                $result = mysqli_query($conn, $query);
            }
        }

    }

    if(!$result) {
        

        echo "<script>
                alert('Ups, Status no Editado!!');
                location.href='../webpage_control/agregados.php'; 
                </script>"; 
    }else{
       
        echo "<script>
                alert('Status cambiado correctamente');
                location.href='../webpage_control/agregados.php'; 
                </script>"; 

        
    }
}

