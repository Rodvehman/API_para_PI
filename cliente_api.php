<?php
    $url = "http://localhost/API-Cafe3/api.php?id=1";

    $resultado = file_get_contents($url);

    echo $resultado;

  
    $avioes = json_decode($resultado, true);

    $estrutura = [
        'http' => [
            'method' => 'GET',
            'header' => 'Content-Type: application/json\r\n',
            'content' => json_encode($avioes)
        ]
    ];

    $dados = $avioes["avioes"];

    echo $dados;
?>