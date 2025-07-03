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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mundo dos Dinossauros</title>
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="dino.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />


</head>
<body>
<div id="particles-js" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 0; pointer-events: none;"></div>

<?php include 'includes/navbar.php'; ?>

  
  <!-- HERO -->
  <section class="hero-artes-marciais">
  <img src="img/capa123456.png" class="fundo-texto6" alt="Capa Mundo dos Dinossauros">
  <div class="conteudo-hero">
    <h1>Mundo dos Dinossauros</h1>
    <p class="subtitulo">EXPLORAÇÃO SELVAGEM<br>CAÇADA PRÉ-HISTÓRICA<br>SEGREDOS DO JURÁSSICO</p>
    <a href="#personagens" class="botao-hero">ESCOLHA SEU PERSONAGEM!</a>

  </div>
</section>

  <!-- CLASSES -->

  <h2 id="personagens" style="text-align: center;">Escolha seu personagem:</h2>
  <section class="cards-classes">
    <div class="card-classe espadachim">
      <div class="simbolo"><img src="img/capadino11.png"></div>
      <h2>Alyra<br><span>Rastreadora Silenciosa</span></h2>
      <p>
      Mestre em seguir rastros invisíveis, ela caminha na selva sem ser vista.
                          Sua besta dispara flechas tranquilizantes, capturando em vez de matar.
                          Entre sombras e sussurros.
      </p>
        <button 
          class="btn-detalhes"
          data-titulo="Mais detalhes"
          data-descricao="Alyra é uma caçadora ágil e furtiva, especializada em rastrear dinossauros pelas pegadas, marcas de garras e sons na floresta. 
          De pele escura e olhos atentos como os de uma águia, ela veste roupas de couro camufladas em tons de verde e terra, adaptadas para o clima úmido da selva pré-histórica. 
          Ela carrega uma besta tecnológica com flechas tranquilizantes, preferindo capturar do que matar."
          data-classe="Caçadora">
          Ver mais
        </button>

        

    </div>

    <div class="card-classe">
      <div class="simbolo"><img src="img/cacador123.png"></div>
      <h2>Darak<br><span>Comandante de Fronteira</span></h2>
      <p>Cicatrizes que carregam batalhas sangrentas.
        Armadura de escamas, lança elétrica — terror dos predadores.
          Na selva jurássica, ele é a última barreira entre ordem e caos.
        </p>

        <button 
          class="btn-detalhes"
          data-titulo="Mais detalhes"
          data-descricao="Darak é um comandante de elite das zonas fronteiriças, marcado por cicatrizes de batalhas contra raptores e carnívoros gigantes.
          Veste uma armadura reforçada com escamas de dinossauro e empunha uma lança elétrica de alta voltagem.
          Lidera expedições de contenção nas selvas jurássicas, protegendo colônias humanas de ameaças pré-históricas.
          Frio e determinado, é respeitado como o escudo entre a civilização e o caos das feras."
          data-classe="Militar">
        Ver mais
        </button>
    </div>

  <div class="card-classe">
    <div class="simbolo"><img src="img/pers.png"></div>
      <h2>Kaela Orion<br><span>Domador do Futuro</span></h2>
      <p> 
      Tecnocaçadora ágil com exoesqueleto e visor neural.
            Controla dinossauros com chips sinápticos e armas de plasma.
          Busca segredos temporais para encontrar sua irmã perdida.
      </p>
        <button 
          class="btn-detalhes"
          data-titulo="Mais detalhes"
          data-descricao="É uma tecnocaçadora do futuro, com exoesqueleto avançado e visor neural de rastreamento.
          Ágil e estratégica, domina dinossauros usando chips sinápticos e armas de plasma adaptáveis.
          Explora florestas hostis e ruínas jurássicas em busca de criaturas e segredos temporais.
          Sua verdadeira missão: reencontrar a irmã desaparecida em uma fenda no tempo."
          data-classe="Domadora">
          Ver mais
        </button>
    </div>

  </div>
    
      
  </section>

  <section class="mapa-mundo">
  
    <h2>Mapa do Mundo dos Dinossosauros</h2>
  
    <p>Neste mundo pré-histórico, criaturas de todos os tamanhos e formas percorrem vastas paisagens. Gigantes herbívoros, como os imponentes braquiossauros, esticam seus longos pescoços para alcançar as copas das árvores mais altas. Ágeis e inteligentes, os velociraptores caçam em bandos, combinando velocidade e estratégia para dominar suas presas. Um universo repleto de vida e desafios, onde cada espécie desempenha seu papel na antiga cadeia alimentar.

</p>

    <!-- Mapa Principal -->
    <img src="img/mapadino.png" alt="Mapa Principal do Mundo" class="mapa-principal"><br><br>

    <h3>Espécies para encontrar: </h3><br>
    <p><span class="destaque">Tiranossauro Rex (T. rex):</span>  Grande predador carnívoro com mandíbulas poderosas e visão aguçada.</p>
    <img src="img/trex1.png" alt="Fortaleza das Lâminas" class="local-img"><br><br><br>

    <p><span class="destaque">Braquiossauro</span> Herbívoro gigante com pescoço longo que alcança as copas das árvores.</p>
    <img src="img/braqui.png" alt="Dojo das Sombras" class="local-img"><br><br><br>

    <p><span class="destaque">Velociraptor</span> Pequeno e ágil carnívoro com garras afiadas e provável cobertura de penas.</p>
    <img src="img/blue.png" alt="Dojo das Sombras" class="local-img"><br><br><br>

    <p><span class="destaque">Triceratops</span> Herbívoro com três chifres e escudo ósseo para defesa contra predadores.</p>
    <img src="img/rino.png" alt="Dojo das Sombras" class="local-img"><br>

  </section>

  <!-- MISSÕES -->
  <section class="missoes-section">
    <h2>Missões Disponíveis</h2>
    <div class="missoes-grid">

      <div class="missao-card">
        <h3>Caça e Sobrevivência</h3>
        <p>Caçar determinados dinossauros para conseguir recursos ou proteger uma área.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Caça e Sobrevivência"
          data-descricao="Elimine os dinossauros monstruosos na floresta. Recompensas de XP."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Exploração e Descoberta</h3>
        <p>Explorar regiões desconhecidas para mapear o território e coletar amostras de plantas e fósseis.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Exploração e Descoberta"
          data-descricao="Explorar regiões do mapa, encontrar territórios e coletar plantas medicinais."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Resgate e Proteção</h3>
        <p>Resgatar filhotes de dinossauro perdidos e levá-los de volta ao ninho com segurança.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Resgate e Proteção"
          data-descricao="Resgatar filhotes, salva-los."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Construção e Defesa</h3>
        <p>Construir e fortificar um acampamento ou vila para sobreviver ao ambiente hostil.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Construção e Defesa"
          data-descricao="Manter um acampamento para sobrevivência."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Corrida e Fuga</h3>
        <p>Fugir de uma erupção vulcânica ou desastre natural enquanto evita dinossauros agressivos.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Corrida e Fuga"
          data-descricao="Fugir de uma erupção vulcânica ou desastre natural enquanto evita dinossauros agressivos."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Coleta de Recursos</h3>
        <p>Coletar alimentos, água e materiais para manter o grupo vivo.</p>
        <button
          class="btn-detalhes"
          data-titulo="Coleta de Recursos"
          data-descricao="Coletar alimentos, água e materiais para manter o grupo vivo."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>
    </div>
  </section>

  <!-- DEMO -->
  <section class="demo-jogo">
  <div class="conteudo-demo">
    <h2>Teste a Demo 2D do Mundo dos Dinossauros</h2>
    <p>Entre nesse universo selvagem e teste suas habilidades de sobrevivência</p>
    <a href="jogo_dino/index.php" class="btn-jogar" target="_blank">Jogar Agora</a>
  </div>
  </section>


  <!-- RODAPÉ -->
  <footer>
    <p>&copy; 2025 Virtual Town. Todos os direitos reservados.</p>
  </footer>


  
  <!-- MODAL -->
  <div id="modal-missao" class="modal-fundo">
    <div class="modal-conteudo">
      <button id="fechar-modal" class="modal-close" aria-label="Fechar">&times;</button>
      <h2 id="modal-titulo">Título da Missão</h2>
      <p id="modal-descricao">Descrição da missão.</p>
      <p id="modal-classe" class="classe-info">Classe permitida</p>
    </div>
  </div>


  <script>
    const botoes = document.querySelectorAll('.btn-detalhes');
    const modal = document.getElementById('modal-missao');
    const titulo = document.getElementById('modal-titulo');
    const descricao = document.getElementById('modal-descricao');
    const classe = document.getElementById('modal-classe');
    const fechar = document.getElementById('fechar-modal');

    botoes.forEach(btn => {
      btn.addEventListener('click', () => {
        titulo.textContent = btn.dataset.titulo;
        descricao.textContent = btn.dataset.descricao;
        classe.textContent = 'Classe: ' + btn.dataset.classe;
        modal.classList.add('show');
      });
    });

    fechar.addEventListener('click', () => {
      modal.classList.remove('show');
    });

    window.addEventListener('click', e => {
      if (e.target === modal) {
        modal.classList.remove('show');
      }
    });

    

  </script>


<script src="https://cdn.jsdelivr.net/npm/tsparticles@2.10.1/tsparticles.bundle.min.js"></script>
<script> tsParticles.load("particles-js", {
  background: {
    color: {
      value: "#000000" // Fundo escuro para destacar as folhas
    }
  },
  particles: {
    number: {
      value: 80,
      density: {
        enable: true,
        area: 800
      }
    },
    color: {
      value: ["#0a3d1e", "#1b5e20", "#2e7d32"] // Tons de verde escuro
    },
    shape: {
      type: "circle"
    },
    opacity: {
      value: 0.8,
      random: true
    },
    size: {
      value: 4,
      random: true
    },
    move: {
      enable: true,
      speed: 0.6,
      direction: "none",
      random: true,
      straight: false,
      outModes: "out"
    }
  },
  interactivity: {
    events: {
      onHover: {
        enable: true,
        mode: "repulse"
      },
      resize: true
    },
    modes: {
      repulse: {
        distance: 50,
        duration: 0.4
      }
    }
  },
  detectRetina: true
});

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