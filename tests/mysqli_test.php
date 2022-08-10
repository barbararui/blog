<?php

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysqli.php';
require_once '../core/sql.php';
require_once '../core/mysqli.php';

insert_teste('Barbara', 'cristina.barbara@ifsp.edu.br', "23455");
buscar_teste();
update_teste(18, 'barbara', 'cristina.barbara@ifsp.edu.br');
buscar_teste();

function insert_test($nome, $email, $senha) : void
{
    $dados = ['nome' => $nome, 'email' => $email, 'senha' => $senha];
    insere('usuario', $dados);
}

function buscar_teste() : void
{
    $usuarios = buscar('usuario', [ 'id', 'nome', 'email'], [], '');
    print_r($usuarios);
}

function update_teste($id, $nome, $email) : void
{
    $dados = ['nome' => $nome, 'email' => $email];
    $criterio = [['id', '=', $id]];
    atualiza('usuario', $dados, $criterio); 
} 

?>