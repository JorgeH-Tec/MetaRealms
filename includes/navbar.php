<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/../conexao.php';

function getUsuario($userId, $conn) {
    $sql = "SELECT nome, email, avatar FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($linha = mysqli_fetch_assoc($resultado)) {
        return [
            'nome' => $linha['nome'],
            'email' => $linha['email'],
            'avatar' => !empty($linha['avatar']) ? $linha['avatar'] : 'avatar_padrao.png'
        ];
    }
    return null;
}

$usuario = isset($_SESSION['id']) ? getUsuario($_SESSION['id'], $conn) : null;
?>

<header class="topo">
  <div class="logo"><a href="inicio.php">Meta<span>Realms</span></a></div>

  <div class="botoes_center">
    <nav>
      <ul>
        <li><a href="inicio.php">INÍCIO</a></li>
        <li><a href="mundos.php">MUNDOS</a></li>
        <li><a href="avatar.php">AVATAR</a></li>
        <li><a href="sobre.php">SOBRE</a></li>
      </ul>
    </nav>
  </div>

  <div class="botoes-topo">
    <?php if ($usuario): ?>
      <div class="usuario-logado" style="position: relative;">
        <span>Olá <?php echo htmlspecialchars($usuario['nome']); ?></span>
        <?php
        $avatar = $usuario['avatar'];
        $classeBorda = '';

        if (in_array($avatar, ['avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png'])) {
            $classeBorda = 'borda-vermelha';
        } elseif (in_array($avatar, ['avatar5.png', 'avatar6.png', 'avatar7.png', 'avatar8.png'])) {
            $classeBorda = 'borda-azul';
        } elseif (in_array($avatar, ['avatar9.png', 'avatar10.png', 'avatar11.png', 'avatar12.png'])) {
            $classeBorda = 'borda-verde';
        }
        ?>

        <img src="img/avatars/<?php echo htmlspecialchars($avatar); ?>" 
             alt="Avatar" 
             class="avatar-pequeno <?php echo $classeBorda; ?>" 
             id="abrirDropdownPerfil"
             style="cursor:pointer;">

        <div id="dropdownPerfil" class="dropdown-perfil" style="display:none;">
          <form method="POST" action="salvar_perfil.php">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required minlength="3" maxlength="50">

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required maxlength="100">

            <label>Escolha seu avatar:</label>
            <div class="container-avatar">

              <div class="grupo-avatar">
                <h4 class="titulo-avatar vermelho">Artes Marciais</h4>
                <div class="avatar-opcoes">
                  <?php
                  for ($i = 1; $i <= 4; $i++) {
                      $checked = ($usuario['avatar'] === "avatar{$i}.png") ? "checked" : "";
                      echo '<label>
                              <input type="radio" name="avatar" value="avatar'.$i.'.png" '.$checked.'>
                              <img src="img/avatars/avatar'.$i.'.png" alt="Avatar '.$i.'" style="border-color: #ff4444;">
                            </label>';
                  }
                  ?>
                </div>
              </div>

              <div class="grupo-avatar">
                <h4 class="titulo-avatar azul">Magia</h4>
                <div class="avatar-opcoes">
                  <?php
                  for ($i = 5; $i <= 8; $i++) {
                      $checked = ($usuario['avatar'] === "avatar{$i}.png") ? "checked" : "";
                      echo '<label>
                              <input type="radio" name="avatar" value="avatar'.$i.'.png" '.$checked.'>
                              <img src="img/avatars/avatar'.$i.'.png" alt="Avatar '.$i.'" style="border-color: #44ccff;">
                            </label>';
                  }
                  ?>
                </div>
              </div>

              <div class="grupo-avatar">
                <h4 class="titulo-avatar verde">Dinossauros</h4>
                <div class="avatar-opcoes">
                  <?php
                  for ($i = 9; $i <= 11; $i++) {
                      $checked = ($usuario['avatar'] === "avatar{$i}.png") ? "checked" : "";
                      echo '<label>
                              <input type="radio" name="avatar" value="avatar'.$i.'.png" '.$checked.'>
                              <img src="img/avatars/avatar'.$i.'.png" alt="Avatar '.$i.'" style="border-color: #66ff66;">
                            </label>';
                  }
                  ?>
                </div>
              </div>

            </div>

            <div class="checkbox-reset-avatar">
              <label class="custom-checkbox">
                <input type="checkbox" name="reset_avatar" value="1">
                <span>Redefinir Avatar</span>
              </label>
            </div>

            <button type="submit">Salvar</button>
          </form>

          <form method="POST" action="logout.php" style="margin-top:10px;">
            <button type="submit" class="botao-sair">Sair</button>
          </form>
        </div>
      </div>
    <?php else: ?>
      <a href="login.php" class="btn-topo">Entrar</a>
      <a href="cadastro.php" class="btn-topo btn-secundario">Cadastre-se</a>
    <?php endif; ?>
  </div>
</header>
