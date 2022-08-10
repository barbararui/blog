<?php

function conecta() : mysqli
{
    $servidor = 'localhost';
    $banco = 'blog';
    $port  = 3307;
    $usuario = 'root';
    $senha = ' ';
    $conexao  = mysqli_connect($servidor, $usuario, $senha, $banco, $port);

    if(!$conexao)
    {
        echo 'erro: não foi possível conectar ao mysql.' . PHP_EOL;
        echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
        echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;

        return null;
    }
    return $conexao;
}

function desconecta($conexao)
{
    mysqli_close($conexao);
}

?>