<?php
session_start();
include("conexao.php");

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpeza e validação básica
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (empty($email) || strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagemErro = "Email inválido.";
    } elseif (empty($senha) || strlen($senha) < 8 || strlen($senha) > 50) {
        $mensagemErro = "Senha inválida. Deve ter entre 8 e 50 caracteres.";
    } else {
        $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $nome, $senha_hash);
            $stmt->fetch();

            if (password_verify($senha, $senha_hash)) {
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;
                header("Location: mundos.php");
                exit();
            } else {
                $mensagemErro = "Email ou senha incorretos.";
            }
        } else {
            $mensagemErro = "Email ou senha incorretos.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php if (isset($_GET['reset']) && $_GET['reset'] == "ok"): ?>
    <div style="color: green; text-align: center; margin-top: 20px;">
        Senha redefinida com sucesso! Faça login.
    </div>
<?php endif; ?>


<header class="topo">
    <div class="logo"><a href="inicio.php">Meta<span>Realms</span></a></div>
</header>

<div class="form-container">
    <h2>Login</h2>
    <form method="POST" autocomplete="off">
        <div class="input-group">
            <span class="icon"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" required maxlength="100">
        </div>
        <div class="input-group">
            <span class="icon"><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="senha" placeholder="Senha" required minlength="8" maxlength="50">
        </div>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
    <p><a href="recuperar_senha.php">Esqueceu a senha?</a></p>

    <?php if (!empty($mensagemErro)): ?>
        <div style="text-align:center; color:red; margin-top:20px;">
            <?php echo htmlspecialchars($mensagemErro); ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
