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
  <title>Velkaria - Mapa Interativo</title>
  <link rel="icon" href="img/logo_metarealms.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/mapa_velkarya.css" />
  
</head>
<body>

  <div id="tsparticles"></div>

  <div class="titulo-mapa">
    <a href="velkaria.php" target="_blank" class="botao-link" title="Voltar para página">
      ⤺
    </a>
    <h1><span class="icone-magico">✨</span> Mapa Interativo de Velkaria</h1>
    <p>Clique nos pontos mágicos para descobrir os locais mais importantes deste mundo fantástico.</p>
  </div>

  <div class="mapa-container">
    <img src="img/mapavel.png" alt="Mapa de Velkaria Atualizado" style="filter: brightness(1.2);" />

    <div class="hotspot" style="top: 26%; left: 22%;" 
         onclick="mostrarPopup(event, 'Lóth\'Anar', '🌿 Capital élfica nas copas das árvores milenares, iluminada por cristais de mana.')"></div>

    <div class="hotspot" style="top: 45%; left: 67%;" 
         onclick="mostrarPopup(event, 'Solaris', '☀️ Centro político e religioso de Solcarmis, feito de pedra rosa e ouro.')"></div>

    <div class="hotspot" style="top: 70%; left: 25%;" 
         onclick="mostrarPopup(event, 'Mor\'Venhar', '🩸 Fortaleza sombria de Umbra\'Veyl, cercada por neblina e escuridão.')"></div>

    <div id="popup" class="popup"></div>
  </div>

  <script>
    const popup = document.getElementById('popup');

    function mostrarPopup(event, titulo, texto) {
      const offsetX = 15;
      const offsetY = 10;

      const container = document.querySelector('.mapa-container');
      const containerRect = container.getBoundingClientRect();

      let x = event.clientX - containerRect.left + offsetX;
      let y = event.clientY - containerRect.top + offsetY;

      popup.innerHTML = `<strong>${titulo}</strong><br>${texto}`;
      popup.style.display = 'block';

      const popupRect = popup.getBoundingClientRect();

      if (x + popupRect.width > container.clientWidth) {
        x = container.clientWidth - popupRect.width - 10;
      }

      if (y + popupRect.height > container.clientHeight) {
        y = container.clientHeight - popupRect.height - 10;
      }

      if (x < 0) x = 10;
      if (y < 0) y = 10;

      popup.style.left = `${x}px`;
      popup.style.top = `${y}px`;
    }

    window.onclick = function(e) {
      if (!e.target.classList.contains('hotspot')) {
        popup.style.display = 'none';
      }
    };
  </script>

  <!-- tsparticles lib -->
  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.10.1/tsparticles.bundle.min.js"></script>
  <script src="js/mapa_velkarya.js"></script>
  
</body>
</html>