<?php
include("conexao.php");

$mensagem = "";
$classeMensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitizar os dados recebidos
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha_plain = $_POST['senha'];

    // Validações adicionais
    if (empty($nome) || strlen($nome) < 3 || strlen($nome) > 50) {
        $mensagem = "O nome deve ter entre 3 e 50 caracteres.";
        $classeMensagem = "erro";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
        $mensagem = "Email inválido ou muito longo.";
        $classeMensagem = "erro";
    } elseif (strlen($senha_plain) < 8 || strlen($senha_plain) > 50) {
        $mensagem = "A senha deve ter entre 8 e 50 caracteres.";
        $classeMensagem = "erro";
    } else {

        // Verificar se o e-mail já existe
        $stmt_check = mysqli_prepare($conn, "SELECT id FROM usuarios WHERE email = ?");
        mysqli_stmt_bind_param($stmt_check, "s", $email);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            $mensagem = "Este e-mail já está cadastrado.";
            $classeMensagem = "erro";
        } else {
            // E-mail não existe, prosseguir com cadastro
            $senha = password_hash($senha_plain, PASSWORD_DEFAULT);

            $stmt = mysqli_prepare($conn, "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

            if (mysqli_stmt_execute($stmt)) {
                $mensagem = "Cadastro realizado com sucesso! Redirecionando para o login...";
                $classeMensagem = "sucesso";
                header("refresh:3;url=login.php");
            } else {
                $mensagem = "Erro ao cadastrar: " . mysqli_stmt_error($stmt);
                $classeMensagem = "erro";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_stmt_close($stmt_check);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header class="topo">
    <div class="logo"><a href="inicio.php">Meta<span>Realms</span></a></div>
</header>

<div class="page-container">
    
    <div class="form-container">
        <h2>Cadastro</h2>
        <form method="POST" autocomplete="off">
            <div class="input-group">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="nome" placeholder="Nome" required minlength="3" maxlength="50">
            </div>
            <div class="input-group">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" placeholder="Email" required maxlength="100">
            </div>
            <div class="input-group">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="senha" placeholder="Senha" required minlength="8" maxlength="50">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </div>

    <?php if ($mensagem != ""): ?>
        <div class="mensagem <?php echo $classeMensagem; ?>">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
