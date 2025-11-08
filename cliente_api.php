<?php
    $url = "http://localhost/API_para_PI/api.php";

    $resultado = file_get_contents($url);
 
    $avioes = json_decode($resultado, true);

    $estrutura = [
        'http' => [
            'method' => 'GET',
            'header' => 'Content-Type: application/json\r\n',
            'content' => json_encode($avioes)
        ]
    ];

    $dados = $avioes["avioes"];
?>