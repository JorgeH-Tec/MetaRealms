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
  <title>Mapa Interativo - Velkaria</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Cinzel Decorative', serif;
      color: #fff;
      background: radial-gradient(circle at center, #0d0d15 0%, #06060b 100%);
      overflow-x: hidden;
      position: relative;
      min-height: 100vh;
      z-index: 0;
    }

    .mapa-container {
      position: relative;
      max-width: 900px;
      margin: 40px auto;
      border: 3px solid #a34bff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 0 30px rgba(163, 75, 255, 0.5);
      animation: glowBox 3s ease-in-out infinite alternate;
      background: #120c29;
      z-index: 10;
    }

    .mapa-container img {
      width: 100%;
      display: block;
    }

    .hotspot {
      position: absolute;
      width: 24px;
      height: 24px;
      background: radial-gradient(circle, #c285ff, #7f00ff);
      border: 2px solid #ffffffcc;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0 0 10px #a34bff, 0 0 20px #c285ff;
      animation: pulse 2s infinite ease-in-out;
      transition: transform 0.2s ease;
      z-index: 15;
    }

    .hotspot:hover {
      transform: scale(1.3);
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
        box-shadow: 0 0 10px #a34bff, 0 0 20px #c285ff;
      }
      50% {
        transform: scale(1.1);
        box-shadow: 0 0 20px #c285ff, 0 0 35px #d099ff;
      }
      100% {
        transform: scale(1);
        box-shadow: 0 0 10px #a34bff, 0 0 20px #c285ff;
      }
    }

    .popup {
      position: absolute;
      background: rgba(30, 30, 45, 0.95);
      border: 2px solid #a34bff;
      padding: 10px 15px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(195, 133, 255, 0.4);
      font-size: 14px;
      max-width: 250px;
      z-index: 20;
      display: none;
      pointer-events: none;
      color: #f8f8f8;
    }

    @keyframes glowBox {
      from {
        box-shadow: 0 0 25px rgba(163, 75, 255, 0.4);
        border-color: #a34bff;
      }
      to {
        box-shadow: 0 0 40px rgba(195, 133, 255, 0.7);
        border-color: #d099ff;
      }
    }

    .titulo-mapa {
      position: relative;
      text-align: center;
      padding: 40px 20px 20px;
      color: #fff;
      font-family: 'Cinzel Decorative', serif;
      animation: fadeInUp 1.5s ease-out;
      z-index: 15;
    }

    .titulo-mapa h1 {
      font-size: 2.5rem;
      background: linear-gradient(90deg, #7f00ff, #d099ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
      text-shadow: 0 0 15px rgba(163, 75, 255, 0.7);
      display: inline-block;
    }

    .titulo-mapa .icone-magico {
      margin-right: 10px;
      animation: pulseIcon 2s infinite ease-in-out;
      display: inline-block;
    }

    .titulo-mapa p {
      font-size: 1.1rem;
      color: #ccc;
      max-width: 700px;
      margin: 0 auto;
      line-height: 1.6;
      text-shadow: 0 0 8px rgba(180, 140, 255, 0.3);
      animation: fadeIn 2s ease-in;
    }

    /* Botão de seta mágica para o lado esquerdo */
    .botao-link {
      position: absolute;
      top: 45px;
      left: 20px;
      font-size: 2rem;
      color: #d099ff;
      text-decoration: none;
      cursor: pointer;
      user-select: none;
      filter: drop-shadow(0 0 8px #c285ff);
      animation: pulseMagic 2s infinite ease-in-out;
      transition: color 0.3s ease, transform 0.3s ease;
      z-index: 20;
    }

    .botao-link:hover {
      color: #7f00ff;
      transform: scale(1.4) rotate(-10deg);
      filter: drop-shadow(0 0 12px #d099ff);
    }

    @keyframes pulseMagic {
      0%, 100% {
        filter: drop-shadow(0 0 8px #c285ff);
        text-shadow:
          0 0 5px #d099ff,
          0 0 10px #7f00ff,
          0 0 15px #c285ff;
      }
      50% {
        filter: drop-shadow(0 0 14px #d099ff);
        text-shadow:
          0 0 8px #d099ff,
          0 0 15px #a34bff,
          0 0 25px #d099ff;
      }
    }

    /* Animações */
    @keyframes pulseIcon {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.2);
      }
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(25px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    #tsparticles {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: 0;
      pointer-events: none;
      background: transparent;
    }
  </style>
</head>
<body>

  <div id="tsparticles"></div>

  <div class="titulo-mapa">
    <a href="velkaria.php" target="_blank" class="botao-link" title="Voltar para página">
      ⬅️
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
  <script>
    tsParticles.load("tsparticles", {
      fpsLimit: 60,
      particles: {
        number: {
          value: 80,
          density: {
            enable: true,
            area: 900,
          }
        },
        color: {
          value: ["#7f00ff", "#a64dff", "#9a33ff", "#c285ff", "#d099ff"]
        },
        shape: {
          type: "circle"
        },
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
          outModes: {
            default: "out"
          },
          attract: {
            enable: false
          }
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
          onHover: {
            enable: true,
            mode: "grab"
          },
          onClick: {
            enable: false
          },
          resize: true
        },
        modes: {
          grab: {
            distance: 160,
            links: {
              opacity: 0.5
            }
          }
        }
      },
      detectRetina: true,
      background: {
        color: "transparent"
      }
    });
  </script>
</body>
</html>