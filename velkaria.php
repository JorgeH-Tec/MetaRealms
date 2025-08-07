<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

include("conexao.php");
// resto da página
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mundo de Magia - Velkaria</title>

  <link rel="icon" href="img/logo_metarealms.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" />

  <!-- CSS externo -->
  <link rel="stylesheet" href="css/layout.css" />
  <link rel="stylesheet" href="css/velkarya.css" />
</head>
<body>
<div id="particles-js" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; pointer-events: none;"></div>

  <?php include 'includes/navbar.php'; ?>

  <section class="hero">
    <div class="hero-text">
      <h1>Bem-vindo a Velkaria</h1>
      <p>O eterno conflito entre Vida, Luz e Sombra te espera.</p>
      <a href="#continents" class="btn-hero">Comece agora</a>
    </div>
  </section>

  <h2 class="titulo-continentes" id="continents">
    Continentes de Velkaria
  </h2>

  <div class="cards-container">
    <div class="card elarion">
      <img src="img/elfo.png" alt="Continente Elarion" style="filter: brightness(1.5);" />
      <h3><span style="font-size: 1.4em;">🌿</span> <span style="margin-left: 4px;">Elarion</span></h3>
      <p>O continente dos Elfos. Guardiões da vida e da magia natural.</p>
      <button onclick="abrirModal('Elarion')">Saiba mais</button>
    </div>

    <div class="card solcarmis">
      <img src="img/humanos.png" alt="Continente Solcarmis" />
      <h3><span style="font-size: 1.4em;">☀️</span> <span style="margin-left: 4px;">Solcarmis</span></h3>
      <p>O continente dos Humanos. Dividido entre fé e razão.</p>
      <button onclick="abrirModal('Solcarmis')">Saiba mais</button>
    </div>

    <div class="card umbraveyl">
      <img src="img/demonios.png" alt="Continente Umbra'Veyl" style="filter: brightness(1.5);" />
      <h3><span style="font-size: 1.4em;">🩸</span> <span style="margin-left: 4px;">Umbra'Veyl</span></h3>
      <p>O continente dos Demônios. Sombra, honra e sobrevivência.</p>
      <button onclick="abrirModal('Umbra\'Veyl')">Saiba mais</button>
    </div>
  </div>

  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="fecharModal()">&times;</span>
      <h2 id="modal-title"></h2>
      <p id="modal-description"></p>
    </div>
  </div>

  <section class="sobre-velkaria">
    <div class="box-sobre">
      <h2>Sobre Velkaria</h2>
      <p>
        Em um vasto mundo de magia chamado <strong>Velkaria</strong>, três grandes continentes dominam a paisagem: os sábios <strong>Elfos</strong>, os racionais <strong>Humanos</strong> e os misteriosos <strong>Demônios</strong>.<br /><br />
        Atualmente, os Humanos travam uma guerra contra os Demônios, motivados por preconceitos contra a magia negra. Enquanto isso, os Elfos tentam preservar o equilíbrio entre luz e trevas, observando o conflito com sabedoria ancestral.
      </p>
      <a href="velkaria_mapa.php" class="btn-mapa" target="_blank" rel="noopener noreferrer">Clique aqui para ver o mapa do continente</a>
    </div>
  </section>

  <!-- Biblioteca tsparticles -->
  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.10.1/tsparticles.bundle.min.js"></script>
  <script src="js/velkarya.js"></script>


</body>
</html>