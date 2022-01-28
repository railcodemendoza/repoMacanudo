<?php include('../db.php'); ?>


<?php 

$id = $_GET['id'];
$vista = $_GET['vista'];


if(isset($_POST['agregar'])) {


    // traemos todos los datos. 

    $cantidad = $_POST['cantidad'];
    $out = $_POST['out'];
    $invoice = $_POST['invoice'];
    foreach ($_POST['proveedor'] as $proveedor);

    // seleccionamos los datos del articulo 

    $query_datos = "SELECT * FROM add5 WHERE id = $id";
    $result_datos = mysqli_query($conn, $query_datos);
    
    while($row = mysqli_fetch_assoc($result_datos)) { 
                                                
        $q = $row['q'];
    
    }
    
    // sumamos los tatos para actualizar el stock. 

    $q_total = $cantidad + $q;
    $total_invoice = $out * $q;
    

    // actualizamos los datos en las tablas.

    // --- Tabla Stock ----
    $query = "UPDATE `add5` SET `q`= $q_total,`out_ars`='$out' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // --- Tabla Administracion ----

    $query_out_list = "INSERT INTO `out_list`(`invoice`, `proveedor`, `out_ars`) VALUES ('$invoice','$proveedor','$total_invoice')";
    $result_out_list = mysqli_query($conn, $query_out_list);
    
    if(!$result) {
        

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
