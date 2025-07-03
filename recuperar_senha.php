<?php
include("conexao.php");

$mensagem = "";
$classeMensagem = "";
$link_recuperacao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
        $mensagem = "E-mail inválido.";
        $classeMensagem = "erro";
    } else {
        // Verifica se o email existe no banco
        $stmt = mysqli_prepare($conn, "SELECT id FROM usuarios WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            $token = bin2hex(random_bytes(16));
            $expira = date("Y-m-d H:i:s", strtotime('+1 hour'));

            $stmt2 = mysqli_prepare($conn, "UPDATE usuarios SET token_recuperacao = ?, token_expira_em = ? WHERE email = ?");
            mysqli_stmt_bind_param($stmt2, "sss", $token, $expira, $email);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_close($stmt2);

            $link_recuperacao = "http://localhost:8090/rv_10_final/nova_senha.php?token=$token";

            $mensagem = "Simulação: link de recuperação gerado abaixo.";
            $classeMensagem = "sucesso";
        } else {
            $mensagem = "E-mail não encontrado.";
            $classeMensagem = "erro";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
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
        <h2>Recuperar Senha</h2>
        <form method="POST">
            <div class="input-group">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Digite seu email" required maxlength="100">
            </div>
            <button type="submit">Enviar link</button>
        </form>
        <p>Lembrou a senha? <a href="login.php">Voltar ao login</a></p>
    </div>

    <?php if ($mensagem != ""): ?>
        <div class="mensagem <?php echo htmlspecialchars($classeMensagem); ?>">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
    <?php endif; ?>

    <?php if ($link_recuperacao != ""): ?>
        <div class="mensagem sucesso" style="margin-top: 15px;">
            <strong>Link de redefinição:</strong><br>
            <a href="<?php echo htmlspecialchars($link_recuperacao); ?>" target="_blank">
                <?php echo htmlspecialchars($link_recuperacao); ?>
            </a>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
