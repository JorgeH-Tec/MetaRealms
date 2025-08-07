<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['id_usuario_token'])) {
    die("Acesso inválido.");
}

$id = $_SESSION['id_usuario_token'];

if (empty($_POST['senha']) || strlen($_POST['senha']) < 8) {
    die("A senha deve ter pelo menos 8 caracteres.");
}

$nova_senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn, "UPDATE usuarios SET senha = ?, token_recuperacao = NULL, token_expira_em = NULL WHERE id = ?");
mysqli_stmt_bind_param($stmt, "si", $nova_senha, $id);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['id_usuario_token']);
    header("Location: login.php?reset=ok");
    exit;
} else {
    echo "Erro ao redefinir senha.";
}

mysqli_stmt_close($stmt);
?>
