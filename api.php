<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $url = 'avioes.json';

    $conversao = file_get_contents($url);

    $aviao = json_decode($conversao, true);

    $id = $_GET['id'];

    if ($aviao['avioes'][$id]){
        echo "Modelo: ".$aviao['avioes'][$id]['modelo']."\n";
        echo "Fabricante: ".$aviao['avioes'][$id]['fabricante']."\n";
        echo "Velocidade de Cruzeiro: ".$aviao['avioes'][$id]['velocidade_cruzeiro_km_h']." km/h\n";
        echo "Capacidade: ".$aviao['avioes'][$id]['capacidade_passageiros']."\n";
        echo "Autonomia: ".$aviao['avioes'][$id]['autonomia_km']." Kms\n";
        echo "Em Operação Por: ".$aviao['avioes'][$id]['companhia_exemplo']."\n";
        echo "Início de Operação: ".$aviao['avioes'][$id]['ano_primeiro_voo']."\n";
        echo "Situação: ".$aviao['avioes'][$id]['status']."\n";
    } else {
        echo "Para especificar um modelo, insira '?', 'id=' e o número do modelo desejado.<br>";
        echo "Segue a lista completa.";
        echo var_dump($aviao['avioes']);
    }