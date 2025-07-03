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
  <title>Velkaria - Mundo de Fantasia</title>

  <!-- Fonte Cinzel Decorative -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" />

  <!-- Seu CSS externo, se houver -->
  <link rel="stylesheet" href="css/layout.css" />


  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Cinzel Decorative', serif;
      background: #0b0b15;
      color: #fff;
      overflow-x: hidden;
      position: relative;
      min-height: 100vh;
    }

    /* Fundo de partículas */
    #tsparticles {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
      background: transparent;
    }

    /* Conteúdo acima das partículas */
    .hero,
    .titulo-continentes,
    .cards-container,
    .sobre-velkaria {
      position: relative;
      z-index: 10;
    }

    /* Navbar fica acima também */
    nav, /* supondo que navbar seja <nav> */
    .modal {
      position: relative;
      z-index: 20;
    }

    .hero {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
      background: url('img/fundomagic2.png') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }

    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      z-index: 0;
    }

    .hero-text {
      z-index: 1;
      max-width: 800px;
      padding: 20px;
    }

    .hero-text h1 {
      font-size: 3rem;
      font-weight: 800;
      background: linear-gradient(90deg, #29f0ff, #d3a4ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 20px;
    }

    .hero-text p {
      font-size: 1.25rem;
      color: #e0dfff;
    }

    .btn-hero {
      margin-top: 20px;
      display: inline-block;
      padding: 14px 28px;
      background: linear-gradient(90deg, #29f0ff, #d3a4ff);
      color: #000;
      font-weight: bold;
      border-radius: 30px;
      font-size: 1rem;
      text-decoration: none;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      position: relative;
      z-index: 10;
    }

    .btn-hero:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(41, 240, 255, 0.4);
    }

    .cards-container {
      padding: 80px 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2.5rem;
      position: relative;
      z-index: 10;
    }

    .card {
      background-color: #0f0f1c;
      border-radius: 30px;
      text-align: center;
      padding: 1.5rem;
      width: 400px;
      height: 600px;
      position: relative;
      overflow: hidden;
      transition: transform 0.3s;
      box-shadow: inset 0 0 15px #0c0c18, 0 0 25px rgba(255, 255, 255, 0.05);
      border: 1px solid #ffffff10;
      z-index: 10;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card img {
      width: 270px;
      height: 400px;
      object-fit: cover;
      border-radius: 30px;
      margin-bottom: 1rem;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .elarion img {
      border-color: #00cc99;
      box-shadow: 0 0 15px #00cc99;
    }

    .solcarmis img {
      border-color: gold;
      box-shadow: 0 0 15px gold;
    }

    .umbraveyl img {
      border-color: #ff6666;
      box-shadow: 0 0 10px #ff6666;
    }

    .card h3 {
      font-size: 20px;
      margin-bottom: 0.5rem;
    }

    .card p {
      font-size: 14px;
      color: #ccc;
    }

    .card button {
      margin-top: 1rem;
      padding: 10px 20px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-weight: bold;
      font-size: 14px;
      transition: background 0.3s ease, transform 0.2s;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
      position: relative;
      z-index: 10;
    }

    .elarion h3 {
      color: #33ffcc;
    }

    .elarion button {
      background-color: #00cc99;
      color: #000;
    }

    .elarion button:hover {
      background-color: #00b38f;
      transform: translateY(-2px);
    }

    .solcarmis h3 {
      color: gold;
    }

    .solcarmis button {
      background-color: gold;
      color: #000;
    }

    .solcarmis button:hover {
      background-color: #e6c200;
      transform: translateY(-2px);
    }

    .umbraveyl h3 {
      color: #ff6666;
    }

    .umbraveyl button {
      background-color: #800020;
      color: #fff;
    }

    .umbraveyl button:hover {
      background-color: #a00000;
      transform: translateY(-2px);
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.85);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #121222;
      padding: 2rem;
      border-radius: 30px;
      text-align: center;
      max-width: 600px;
      width: 90%;
      box-shadow: 0 0 50px rgba(255, 255, 255, 0.1);
      border: 2px solid #ffffff22;
      position: relative;
    }

    .modal-content h2 {
      font-family: 'Cinzel Decorative', serif;
      font-size: 32px;
      color: #fefefe;
      text-shadow: 0 0 10px #c9f5ff, 0 0 20px #74e4ff;
      margin-bottom: 1rem;
    }

    .modal-content p {
      font-size: 16px;
      color: #ccc;
    }

    .close {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 2rem;
      cursor: pointer;
      color: white;
    }

    .sobre-velkaria {
      font-family: 'Cinzel Decorative', serif;
      padding: 100px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
      z-index: 10;
    }

    .box-sobre {
      
      border: 2px solid #a34bff;
      border-radius: 20px;
      padding: 50px 40px;
      max-width: 900px;
      width: 100%;
      text-align: center;
      box-shadow: 0 0 25px rgba(163, 75, 255, 0.4);
      font-family: 'Cinzel Decorative', serif;
      color: #f0f0f0;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
      animation: glow 3s ease-in-out infinite alternate;
    }

    .box-sobre h2 {
      font-size: 3em;
      margin-bottom: 25px;
      color: #c285ff;
      animation: fadeInGlow 2.5s ease-out forwards;
      opacity: 0;
      animation-delay: 0.5s;
      animation-fill-mode: forwards;
    }

    .box-sobre p {
      font-size: 1.2em;
      line-height: 1.8;
      color: #e0d6f9;
    }

    @keyframes glow {
      from {
        box-shadow: 0 0 25px rgba(163, 75, 255, 0.4);
        border-color: #a34bff;
      }
      to {
        box-shadow: 0 0 35px rgba(163, 75, 255, 0.7);
        border-color: #d099ff;
      }
    }

    @keyframes fadeInGlow {
      0% {
        opacity: 0;
        transform: translateY(-20px);
        text-shadow: 0 0 0 rgba(195, 133, 255, 0);
      }
      50% {
        opacity: 0.7;
        transform: translateY(5px);
        text-shadow: 0 0 15px rgba(195, 133, 255, 0.4);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
        text-shadow: 0 0 25px rgba(195, 133, 255, 0.7);
      }
    }

    /* Botão para o mapa dentro do Sobre Velkaria */
    .btn-mapa {
      display: inline-block;
      margin-top: 30px;
      padding: 15px 35px;
      background: linear-gradient(90deg, #8e44ad, #c285ff);
      color: #fff;
      font-weight: 700;
      border-radius: 25px;
      text-decoration: none;
      font-size: 1.2rem;
      box-shadow: 0 0 20px #a164cc;
      transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
      position: relative;
      z-index: 10;
    }

    .btn-mapa:hover {
      background: linear-gradient(90deg, #c285ff, #8e44ad);
      box-shadow: 0 0 40px #d6a6ff;
      transform: translateY(-3px);
    }

    .titulo-continentes {
      text-align: center;
      font-size: 2.8rem;
      margin-top: 80px;
      margin-bottom: 30px;
      background: linear-gradient(90deg, #29f0ff, #d3a4ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-family: 'Cinzel Decorative', serif;
      text-shadow: 0 0 15px rgba(41, 240, 255, 0.3);
      animation: glowText 5s ease-in-out infinite alternate;
      position: relative;
      z-index: 10;
    }

    /* Animação de brilho */
    @keyframes glowText {
      from {
        text-shadow: 0 0 10px rgba(41, 240, 255, 0.2),
                     0 0 20px rgba(211, 164, 255, 0.2);
      }
      to {
        text-shadow: 0 0 25px rgba(41, 240, 255, 0.6),
                     0 0 40px rgba(211, 164, 255, 0.4);
      }
    }
  </style>

</head>
<body>

  <!-- Fundo de partículas roxas, atrás de todo o conteúdo -->
  <div id="tsparticles"></div>

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

  <script>
    tsParticles.load("tsparticles", {
      fpsLimit: 60,
      particles: {
        number: {
          value: 80,
          density: { enable: true, area: 900 }
        },
        color: {
          value: ["#7f00ff", "#a64dff", "#9a33ff", "#c285ff", "#d099ff"]
        },
        shape: { type: "circle" },
        opacity: {
          value: 0.5,
          random: true,
          anim: {
            enable: true,
            speed: 1.5,
            opacity_min: 0.2,
            sync: false
          }
        },
        size: {
          value: 4,
          random: { enable: true, minimumValue: 1 },
          anim: {
            enable: true,
            speed: 2,
            size_min: 1,
            sync: false
          }
        },
        move: {
          enable: true,
          speed: 0.3,
          direction: "none",
          random: true,
          straight: false,
          outModes: { default: "out" },
          attract: { enable: false }
        },
        shadow: {
          enable: true,
          color: "#b084ff",
          blur: 20,
          offset: { x: 0, y: 0 }
        },
        links: {
          enable: true,
          distance: 150,
          color: "#a366ff",
          opacity: 0.3,
          width: 1
        }
      },
      interactivity: {
        detectsOn: "canvas",
        events: {
          onHover: { enable: true, mode: "grab" },
          onClick: { enable: false },
          resize: true
        },
        modes: {
          grab: { distance: 160, links: { opacity: 0.5 } }
        }
      },
      detectRetina: true,
      background: { color: "transparent" }
    });

    // Modal
    function abrirModal(continente) {
      const modal = document.getElementById("modal");
      const titulo = document.getElementById("modal-title");
      const descricao = document.getElementById("modal-description");

      if (continente === "Elarion") {
        titulo.textContent = "Elarion - Terra dos Elfos";
        descricao.textContent = "O continente dos Elfos, onde a magia da vida e a natureza são reverenciadas. As florestas eternas abrigam seres antigos e sábios, que buscam manter o equilíbrio do mundo.";
      } else if (continente === "Solcarmis") {
        titulo.textContent = "Solcarmis - Terra dos Humanos";
        descricao.textContent = "O continente dos Humanos, dividido entre fé e razão, progresso e tradição. Aqui se desenrola uma guerra contra os Demônios, marcada por conflitos internos e ideais diversos.";
      } else if (continente === "Umbra'Veyl") {
        titulo.textContent = "Umbra'Veyl - Terra dos Demônios";
        descricao.textContent = "O continente dos Demônios, envolto em sombras e mistérios. Uma terra de sobrevivência, honra e antigas tradições, frequentemente alvo do preconceito dos Humanos.";
      }

      modal.style.display = "flex";
    }

    function fecharModal() {
      document.getElementById("modal").style.display = "none";
    }

    // Fecha modal ao clicar fora do conteúdo
    window.onclick = function(event) {
      const modal = document.getElementById("modal");
      if (event.target === modal) {
        fecharModal();
      }
    };

    
document.addEventListener("DOMContentLoaded", function () {
  const avatar = document.getElementById('abrirDropdownPerfil');
  const dropdown = document.getElementById('dropdownPerfil');

  if (avatar && dropdown) {
    avatar.addEventListener('click', function (e) {
      e.stopPropagation();
      if (getComputedStyle(dropdown).display === 'none') {
        dropdown.style.display = 'block';
      } else {
        dropdown.style.display = 'none';
      }
    });

    window.addEventListener('click', function (e) {
      if (!dropdown.contains(e.target) && e.target !== avatar) {
        dropdown.style.display = 'none';
      }
    });
  }
});

  </script>

</body>
</html>