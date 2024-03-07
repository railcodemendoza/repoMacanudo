<?php include('../db.php');
include ("../../variables.php");

$id = $_GET['id'];

if(isset($_POST['editar'])) {


    $location = $_POST['location'];
    $km_to_zero = $_POST['km_to_zero'];
    $px_km= $_POST['px_km'];
    

    $curl = curl_init();

    // Configurar la solicitud cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlApi.'/api/updateDelivery/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'location' => $location,
            'km_to_zero' => $km_to_zero,
            'px_km' => $px_km,
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
            location.href='../views/tabla_localidades.php';
            </script>";
        } 
    }

    curl_close($curl);


}
