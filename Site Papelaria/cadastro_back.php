<?php
require_once 'db_lara_site/conexao_db.php';

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Adiciona o campo is_admin na query e define como false (0)
$sql = 'INSERT INTO usuario (nome, sobrenome, cpf, telefone, email, senha, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?)';

$is_admin = 0; // padrão: não admin

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssssssi", $nome, $sobrenome, $cpf, $telefone, $email, $senha_hash, $is_admin);
if (!$stmt) {
    die("Erro ao preparar: ". $conexao->error);
}

if ($stmt->execute()) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: ". $stmt->error;
}

?>