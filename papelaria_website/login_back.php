<?php
session_start();
require_once 'db_lara_site/conexao_db.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST["password"];

if (!$email || !$password) {
    die("Dados inválidos!");
}

$sql_user = "SELECT * FROM usuario WHERE email = ?";
$stmt = $conexao->prepare($sql_user);
if (!$stmt) {
    die("Erro ao preparar: ". $conexao->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if (password_verify($password, $usuario['senha'])) {
        $_SESSION['usuario_ID'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        // Use um campo 'is_admin' para verificar se é admin
        if (!empty($usuario['is_admin']) && $usuario['is_admin'] == 1) {
            header("Location: admin/painel.html");
            exit();
        } else {
            header("Location: index.html");
            exit();
        }
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}
?>