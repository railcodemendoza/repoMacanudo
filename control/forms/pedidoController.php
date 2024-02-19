<?php 
    if (isset($_POST['enviar_pedido'])) {
        $tipoPicada = $_POST['tipoPicada'];
        $tipoTabla = $_POST['tipoTabla'];
        $cantidadComensales = $_POST['cantidadComensales'];
        $agregado1 = $_POST['agregado1'];
        $agregado2 = $_POST['agregado2'];
        $agregado3 = $_POST['agregado3'];
        $delivery = $_POST['delivery'];
        $precioTotal = $_POST['preciofinal'];
    
        $curl = curl_init();

        // Configurar la solicitud cURL
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8000/api/general',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'tipoPicada' => $tipoPicada,
                'tipoTabla' => $tipoTabla,
                'cantidadComensales' => $cantidadComensales,
                'delivery' => $delivery,
                'precioTotal' => $precioTotal,
                'agregado1' => $agregado1,
                'agregado2' => $agregado2,
                'agregado3' => $agregado3,
            ),
        ));
        $response = curl_exec($curl);
    
        curl_close($curl);
        echo $response;

    }
?>

