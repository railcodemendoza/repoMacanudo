<?php
 include('../db.php'); 
 include ("../../variables.php");


$id = $_GET['id'];
if(isset($_POST['editar'])) {

    $tipo = $_POST['tipo'];
    $description = $_POST['description'];
    $activo = $_POST['activo']?? 0;
    $in_ars = $_POST['in_ars'];
    $out_ars = $_POST['out_ars'];
    $valor_por_persona = $_POST['valor_por_persona'];
    $costo_por_persona = $_POST['costo_por_persona'];
    $picada_especial = $_POST['picada_especial'] ?? null;
    $title_especial = $_POST['title_especial'] ?? null;
    $comentario_especial = $_POST['comentario_especial'] ?? null;
    $tipo_tabla_ids = json_encode(array_map('intval', $_POST['tipo_tabla_ids']));
    if(isset($_POST['agregado_ids']) && !empty($_POST['agregado_ids'])) {
        $agregado_ids = json_encode(array_map('intval', $_POST['agregado_ids']));
    } else {
        $agregado_ids = null;
    }
    $imagen = $_FILES['imagen']['tmp_name'];
    
    $curl = curl_init();

    // Configurar la solicitud cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlApi.'/api/updateTipoPicada/'.$id,
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
            'activo' => $activo,
            'in_ars' => $in_ars,
            'out_ars' => $out_ars,
            'valor_por_persona' => $valor_por_persona,
            'costo_por_persona' => $costo_por_persona,
            'picada_especial' => $picada_especial,
            'title_especial' => $title_especial,
            'comentario_especial' => $comentario_especial,
            'tipo_tabla_ids' => $tipo_tabla_ids,
            'agregado_ids' => $agregado_ids,
            'imagen' => $imagen ? new CURLFile($imagen) : null,
        ),
    ));
    $response = curl_exec($curl);
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
            location.href='../views/tipos_picadas.php';
            </script>";
        } 
    }

    curl_close($curl);
}
