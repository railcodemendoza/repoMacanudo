<?php include('../db.php'); ?>
<?php include ("../../variables.php");?>

<?php 


if(isset($_POST['agregar'])) {

    // traemos todos los datos. 
    $horario = $_POST['horario'];
    $delivery = $_POST['delivery'];

    $curl = curl_init();
    // Configurar la solicitud cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlApi.'/api/deliveryHora',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'horario' => $horario,
            'delivery' => $delivery,
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
            location.href='../views/tabla_horarios.php';
            </script>";
        } 
    }

    curl_close($curl);
}

