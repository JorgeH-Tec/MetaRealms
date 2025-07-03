<?php
include("conexao.php");
session_start();

$token = $_GET['token'] ?? '';
$mensagem = "";
$classeMensagem = "";

// Verificar token
if ($token) {
    $stmt = mysqli_prepare($conn, "SELECT id, token_expira_em FROM usuarios WHERE token_recuperacao = ?");
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($usuario = mysqli_fetch_assoc($resultado)) {
        if (strtotime($usuario['token_expira_em']) < time()) {
            $mensagem = "O link expirou. Solicite um novo.";
            $classeMensagem = "erro";
        } else {
            $_SESSION['id_usuario_token'] = $usuario['id'];
        }
    } else {
        $mensagem = "Token inválido. Solicite um novo.";
        $classeMensagem = "erro";
    }

    mysqli_stmt_close($stmt);
} else {
    $mensagem = "Token não informado.";
    $classeMensagem = "erro";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Senha</title>
    <link rel="stylesheet" href="recuperar_senha.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header class="topo">
    <div class="logo"><a href="inicio.php">Virtual<span>Town</span></a></div>
</header>

<div class="page-container">
    <div class="form-container">
        <h2>Nova Senha</h2>

        <?php if ($mensagem != ""): ?>
            <div class="mensagem <?php echo htmlspecialchars($classeMensagem); ?>">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php elseif (isset($_SESSION['id_usuario_token'])): ?>
            <form method="POST" action="salvar_nova_senha.php">
                <div class="input-group">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="senha" placeholder="Digite a nova senha" required minlength="8">
                </div>
                <button type="submit">Salvar nova senha</button>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
