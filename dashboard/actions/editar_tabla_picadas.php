
<?php 
include('../db.php'); 
include ("../../variables.php");

$id = $_GET['id'];
if(isset($_POST['editar'])) {

    // traemos todos los datos. 
    $tipo = $_POST['tipo'];
    $description = $_POST['description'];
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];
    $maximo_personas = $_POST['maximo_personas'];
    $imagen = $_FILES['imagen']['tmp_name'];
    
    $curl = curl_init();

    // Configurar la solicitud cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlApi.'/api/updateTipoTabla/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'tipo' => $tipo,
            'description' => $description,
            'in_ars' => $in_ars,
            'out_ars' => $out_ars,
            'maximo_personas' => $maximo_personas,
            'imagen' => $imagen ? new CURLFile($imagen) : null,
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
            location.href='../views/tabla_picadas.php';
            </script>";
        } 
    }

    curl_close($curl);
        
}
