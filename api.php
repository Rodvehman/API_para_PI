<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $url = 'avioes.json';

    $conversao = file_get_contents($url);

    $aviao = json_decode($conversao, true);

    $id = $_GET['id'];

    if ($id === null){
        print_r($aviao['avioes']);
    } else {   
        echo var_dump($aviao['avioes'][$id]);
    }


   