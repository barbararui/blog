<?php

    session_start();
    require_once '../includes/valida_login.php';
    require_once '../includes/funcoes.php';
    require_once 'conexao_mysqli.php';
    require_once 'sql.php';
    require_once 'mysql.php';

    print_r($_POST);

    foreach($_POST as $indice => $dado)
    {
        $$indice = limparDados($dado);   
    }

    foreach($_GET as $indice => $dado)
    {
        $$indice = limparDados($dado);
    }

    $id = (int)$id;
    
    switch($acao)
    {
        case 'insert':
            $dados = [
                'titulo'        => $titulo,
                'texto'         => $texto,
                'data_postagem' => "$data_postagem $hora_postagem",
                'usuario_id'    => $_SESSION['login']['usuario']['id']
            ];
            print_r($dados);
            insere(
                'post',
                $dados
            );

            break;

        case 'update':
            $dados = [
                'titulo'        => $titulo,
                'texto'         => $texto,
                'data_postagem' => "$data_postagem $hora_postagem",
                'usuario_id'    => $_SESSION['login']['usuario']['id']
            ];

            $criterio = [
                ['id', '=', $id]
            ];

            atualiza(
                'post',
                $dados,
                $criterio
            );

            break;
        
        case 'delete':
            $criterio = [
                ['id', '=', $id]
            ];

            deleta(
                'post',
                $criterio
            );

            break;
    }

    header('Location: ../index.php');

?>