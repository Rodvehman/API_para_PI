<?php
    // Capturando o endereço da URL
    $url = "http://localhost/API_para_PI/api.php";

    // Armazenando o conteúdo da URL
    $resultado = file_get_contents($url);
 
    // Decodificando o conteúdo e convertendo em um Array Associativo (Chave => Valor)
    $avioes = json_decode($resultado, true);

    // Construíndo a estrutura do método REST
    $estrutura = [
        'http' => [
            'method' => 'GET',
            'header' => 'Content-Type: application/json\r\n',
            'content' => json_encode($avioes)
        ]
    ];

    // 
    $dados = $avioes["avioes"];
?>