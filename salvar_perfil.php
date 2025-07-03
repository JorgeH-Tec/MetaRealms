<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$erros = [];

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$avatar = isset($_POST['avatar']) ? $_POST['avatar'] : null;
$reset_avatar = isset($_POST['reset_avatar']);

if (strlen($nome) < 3 || strlen($nome) > 50) {
    $erros[] = "Nome deve ter entre 3 e 50 caracteres.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
    $erros[] = "Email inválido.";
}

$avatars_validos = [
    'avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png',
    'avatar5.png', 'avatar6.png', 'avatar7.png', 'avatar8.png',
    'avatar9.png', 'avatar10.png', 'avatar11.png', 'avatar12.png',
    'avatar_padrao.png'
];

if ($reset_avatar) {
    $avatar = 'avatar_padrao.png';
} else {
    if (!in_array($avatar, $avatars_validos)) {
        $erros[] = "Avatar inválido.";
    }
}

if (empty($erros)) {
    $sql = "UPDATE usuarios SET nome = ?, email = ?, avatar = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $avatar, $_SESSION['id']);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['nome'] = $nome;
        header("Location: inicio.php");
        exit();
    } else {
        echo "Erro ao atualizar perfil: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
} else {
    foreach ($erros as $erro) {
        echo htmlspecialchars($erro) . "<br>";
    }
}
?>
