<?php include('../db.php');
include ("../../variables.php");


$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $codigo = $_POST['codigo'];
    $descuento = $_POST['descuento']; 
    $activo = $_POST['activo']?? 0;

    $curl = curl_init();

    // Configurar la solicitud cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlApi.'/api/updateCodigo/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'codigo' => $codigo,
            'descuento' => $descuento,
            'activo' => $activo,
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
            location.href='../views/tabla_promociones.php';
            </script>";
        } 
    }
    curl_close($curl);

}
