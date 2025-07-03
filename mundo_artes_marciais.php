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
  <title>Mundo Artes Marciais</title>

  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="mundo_artes_marciais.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@700&display-swap" />

</head>
<body>
<?php include 'includes/navbar.php'; ?>

  
  <!-- HERO -->
  <section class="hero-artes-marciais">

    <img src="img/lua.png" class="fundo-texto5">

    <div class="conteudo-hero">
      <h1>Mundo <br>Artes Marciais</h1>
      <p>Explore um universo sombrio, onde Espadachins e Lutadores Corpo a Corpo duelam por glória, sangue e honra. Escolha seu caminho.</p>
    </div>
    <div class="imagem-hero">
      <img src="img/artes_marciais_mundo2.png" alt="Espadachim e Corpo a Corpo" />
    </div>
  </section>

  <!-- CLASSES -->

  <section class="cards-classes">
    <div class="card-classe espadachim">
      <div class="simbolo"><img src="img/espadachim2.png"></div>
      <h2>Espadachim</h2>
      <p>O Espadachim desfere ataques ágeis com maestria, 
        mas precisa evitar confrontos diretos prolongados devido à sua baixa resistência.
      </p>
        <button 
          class="btn-detalhes"
          data-titulo="Evoluções"
          data-descricao="Especialista em velocidade e precisão, o Espadachim evolui para formas letais como o Executor Carmesim,
           o Dançarino das Sombras ou a Lâmina Fantasma, dominando o campo com cortes rápidos e ilusões mortais."
          data-classe="Espadachim">
          Ver Detalhes
        </button>

    </div>

    <div class="card-classe corpo-a-corpo">
      <div class="simbolo"><img src="img/corpo-a-corpo.png"></div>
      <h2>Corpo a Corpo</h2>
      <p>O Lutador Corpo a Corpo domina o campo com sua força bruta e resistência,
         mas sofre para alcançar inimigos rápidos ou lidar com ataques à distância.
      </p>
        <button 
          class="btn-detalhes"
          data-titulo="Evoluções"
          data-descricao="Dominando a força bruta e a resistência, o Corpo a Corpo avança como Titã Enfurecido,
           Demolidor Rúnico ou Punho Abissal, esmagando inimigos com puro impacto e fúria acumulada."
          data-classe="Corpo a Corpo">
          Ver Detalhes
        </button>
    </div>
      
      <!-- SOBRE O MUNDO -->
    <div class="sobre-mundo">
        <img src="img/sangue.png" class="fundo-texto6">
        <h2>A Guerra entre Lâmina e Punhos</h2>
        <p>
          Em um continente onde o sol raramente toca o solo, o sangue fala mais alto que palavras. O mundo das Artes Marciais está dividido entre duas forças brutais: os Espadachins — frios, disciplinados e mestres da velocidade — e os Lutadores Corpo a Corpo — impulsivos, implacáveis e movidos pela força bruta.
        </p>
        <p>
          A rivalidade entre eles se estende por eras. Cada confronto é mais que um duelo: é uma luta por honra, domínio e pela sobrevivência do seu estilo. Escolha seu lado... ou morra entre as lâminas e os ossos esmagados.
        </p>
    </div>
  </section>

  <section class="mapa-mundo">
    <img src="img/sangue.png" class="fundo-texto7">

    <h2>Mapa do Conflito</h2>
  
    <p>O mundo das Artes Marciais é dividido por ódio, sangue e tradição. Dois territórios, duas filosofias... um só objetivo: <span class="destaque">dominar o campo de batalha.</span></p>

    <!-- Mapa Principal -->
    <img src="img/mapa_a_m.png" alt="Mapa Principal do Mundo" class="mapa-principal">

    <h3>Territórios Rivais</h3>
    <p><span class="destaque">Terra dos Espadachins:</span> Florestas demoníacas e a imponente Fortaleza das Lâminas.</p>
    <img src="img/floresta_laminas.png" alt="Fortaleza das Lâminas" class="local-img">

    <p><span class="destaque">Terra dos Punhos:</span> Pântanos sangrentos e o temido Dojo das Sombras.</p>
    <img src="img/pantano_dojo.png" alt="Dojo das Sombras" class="local-img">

    <h3>Eventos e Conquistas</h3>
    <p>Missões, PvP territorial e eventos semanais decidirão qual facção controla cada parte do mapa. Benefícios de domínio incluem <span class="destaque">buffs de ataque, defesa e loot.</span></p>
  </section>



  <!-- MISSÕES -->
  <section class="missoes-section">

    <h2>Missões Disponíveis</h2>
    <div class="missoes-grid">

      <div class="missao-card">
        <h3>Sangue na Neve</h3>
        <p>Elimine os ninjas infernais na floresta demoníaca.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Sangue na Neve"
          data-descricao="Elimine os ninjas sombrios na floresta demoníaca. Recompensas de XP."
          data-classe="Espadachim">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Desafio do Punho Mortal</h3>
        <p>Derrote os campeões do dojo sombrio.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Desafio do Punho Mortal"
          data-descricao="Derrote os campeões do dojo do sombrio. Ganhe respeito e itens raros."
          data-classe="Corpo a Corpo">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>Rivalidade Eterna</h3>
        <p>Missão cooperativa com opção de traição. Escolha com sabedoria.</p>
        <button 
          class="btn-detalhes"
          data-titulo="Rivalidade Eterna"
          data-descricao="Missão cooperativa entre classes. Traição resulta em dupla recompensa ou morte."
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

      <div class="missao-card">
        <h3>PvP Cooperativo</h3>
        <p>Missão PvP, ganhe de rivais e roube tudo deles</p>
        <button 
          class="btn-detalhes"
          data-titulo="PvP Cooperativo"
          data-descricao="Missão PvP contra classe rival. lute e ganhe XP, moedas e bônus de dano por kill"
          data-classe="Todas">
          Ver Detalhes
        </button>
      </div>

    </div>
  </section>

  <!-- DEMO -->
  <section class="demo-jogo">
  <div class="conteudo-demo">
    <h2>Teste a Demo 2D do Mundo Artes Marciais</h2>
    <p>Entre nesse universo sombrio e teste seu destino</p>
    <a href="jogo_beta/game-beta-tester/" class="btn-jogar" target="_blank">Jogar Agora</a>
  </div>
  </section>

  <!-- MODAL -->
  <div id="modal-missao" class="modal-fundo">
    <div class="modal-conteudo">
      <button id="fechar-modal" class="modal-close" aria-label="Fechar">&times;</button>
      <h2 id="modal-titulo">Título da Missão</h2>
      <p id="modal-descricao">Descrição da missão.</p>
      <p id="modal-classe" class="classe-info">Classe permitida</p>
    </div>
  </div>



  <!-- RODAPÉ -->
  <footer>
    <p>&copy; 2025 Virtual Town. Todos os direitos reservados.</p>
  </footer>

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
