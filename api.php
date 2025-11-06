<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $url = 'avioes.json';

    $conversao = file_get_contents($url);

    var_dump($conversao);
    $aviao = json_decode($conversao, true);
    echo "teste";
    switch ($metodo){
        case 'GET':
            $id=$_GET['id']
            getAviao($aviao);
            break;
        case 'POST':

            break;
        case 'PUT':

            break;
        case 'DELETE':

            break;
        default:
            
            echo 'Opção Inválida!.';
            break;
    }

    $opcao = $metodo;

    function getAviao($opcao){
        $opcao = json_decode(file_get_contents('php://input'), true);

        if ($opcao === 'GET'){
            echo "teste";
            var_dump($aviao);
            echo json_encode($aviao['avioes']);
        }
    }
?>