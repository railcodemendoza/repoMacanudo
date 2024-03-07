<?php include('../db.php'); ?>
<?php include ("../../variables.php");?>


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
    $out_ars = $_POST['out_ars'];
    $proveedor = $_POST['proveedor'];
    $img = $_FILES['img']['tmp_name'];
    $stock = $_POST['stock'];
    
    $curl = curl_init();

    // Configurar la solicitud cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlApi.'/api/agregado',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'title' => $title,
            'description' => $description,
            'in_ars' => $in_ars,
            'out_ars' => $out_ars,
            'proveedor' => $proveedor,
            'stock' => $stock,
            'img' => $img ? new CURLFile($img) : null,
        ),
    ));
    $response = curl_exec($curl);
    //echo $response;
    //$responseArray = json_decode($response, true);
    //echo $responseArray['message'];
    if (curl_errno($curl)) {
        echo 'Error cURL: ' . curl_error($curl);
    } else {
        // No hubo errores en la solicitud cURL
        $responseArray = json_decode($response, true);

        if (isset($responseArray['message'])) {
            echo "<script>
            alert('{$responseArray['message']}');
            location.href='../views/agregados.php';
            </script>";
        } 
    }

    curl_close($curl);
}

