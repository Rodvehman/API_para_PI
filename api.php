<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    $metodo = $_SERVER['REQUEST_METHOD'];

    // Leitura do arquivo JSON
    $arquivo = 'avioes.json';
    $conteudo = file_get_contents($arquivo);

    // Validação se o arquivo existe (ou se deu a carga corretamente)
    if ($conteudo === false){
        http_response_code(500);
        echo (["erro => Arquivo 'avioes.json' não encontrado."]);
        exit;
    }

    // Converte o JSON
    $dados = json_decode($conteudo, true);
    if (json_last_error() !== JSON_ERROR_NONE){
        http_response_code(500);
        echo json_encode(["erro => Formato JSON inválido."]);
        exit;
    }

    $avioes = $dados['avioes'] ?? [];

    // Pega o parâmetro da URL
    $id = $_GET['id'] ?? null;
    $fabricante = $_GET['fabricante'] ?? null;

    // aplica o filtro
    $resultado = [];

    if ($id !== null){
        $id = (int) $id;
        foreach ($avioes as $aviao){
            if ($aviao['id'] == $id){
                $resultado = $aviao;
                break;
            }
        }
    } else if ($fabricante !== null){
        $fabricante = trim($fabricante);
        foreach ($avioes as $aviao) {
            if (strcasecmp($aviao['fabricante'], $fabricante) === 0){
                $resultado[] = $aviao;
            }
        }
    } else {
        $resultado = $avioes;
    }

    if (empty($resultado)){
        http_response_code(404);
        echo json_encode([
            "mensagem" => "Nenhum avião localizado",
            "filtro usados" => [
                "id" => $id,
                "fabricante" => $fabricante
            ]
        ]);
        exit;
    }

    // === 5. Retorna em JSON bonito ===
    echo json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>