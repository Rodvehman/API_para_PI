<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $url = 'avioes.json';

    $conversao = file_get_contents($url);

    $aviao = json_decode($conversao, true);

    $id = $_GET['id'];
    $fabricante = $_GET['fabricante'];

    try {
        
    } catch (\Throwable $e) {
        echo 'Parâmetro não localizado. Erro: '.$e->
        print_r($aviao['avioes']);
    }

    if ($id === null){
    } else if ($id !== null) {   
        echo var_dump($aviao['avioes'][$id]);
    } else if ($){
        echo var_dump(($aviao['avioes'][$fabricante]));
    }


   