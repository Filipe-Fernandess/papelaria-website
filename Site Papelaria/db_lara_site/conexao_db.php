<?php
// Conexão com o banco de dados MySQL


$host = 'nome do host';
$usuario = "user";
$senha = "*******";
$nome_banco = "nome do banco de dados";

// Cria a conexão
$conexao = mysqli_connect($host, $usuario, $senha, $nome_banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao === false) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>